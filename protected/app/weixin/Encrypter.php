<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/3/18
 * Time: 16:53
 */

namespace app\weixin;


class Encrypter
{
	public $aesKey = null;
	public $appId = null;
	public $token = null;
	public $msgSignature = null;
	public $nonce = null;
	public $timestamp = null;

	/**
	 * Encrypter constructor.
	 * @param $appId
	 * @param $token
	 * @param $aesKey
	 * @param $msgSignature
	 * @param $nonce
	 * @param $timestamp
	 */
	private function __construct($appId,$token, $aesKey ,$msgSignature,$nonce,$timestamp)
	{
		$this->aesKey = $aesKey;
		$this->appId = $appId;
		$this->token = $token;
		$this->msgSignature = $msgSignature;
		$this->nonce = $nonce;
		$this->timestamp = $timestamp;
	}

	/**
	 * 创建一个加密类
	 * @param $appId
	 * @param $token
	 * @param $encodingAESKey
	 * @return Encrypter|null
	 */
	public static function create($appId,$token,$encodingAESKey)
	{
		$ascKey = base64_decode($encodingAESKey.'=');
		if ($ascKey === false)
		{
			return null;
		}
		$request = \Yii::$app->request;
		return new self($appId,$token,$ascKey,$request->get('msg_signature',''),$request->get('nonce',''),$request->get('timestamp',time()));
	}

	/**
	 * 随机生成16位字符串
	 * @return string 生成的字符串
	 */
	private function getRandomStr()
	{
		$str = "";
		$str_pol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($str_pol) - 1;
		for ($i = 0; $i < 16; $i++) {
			$str .= $str_pol[mt_rand(0, $max)];
		}
		return $str;
	}

	/**
	 * 加密数据
	 * @param $text
	 * @return array
	 */
	public function encrypt($text)
	{
		try {
			//获得16位随机字符串，填充到明文之前
			$random = $this->getRandomStr();
			$text = $random . pack("N", strlen($text)) . $text . $this->appId;

			$module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
			$iv = substr($this->aesKey, 0, 16);
			//使用自定义的填充方式对明文进行补位填充
			$pkc_encoder = new PKCS7Encoder;
			$text = $pkc_encoder->encode($text);
			mcrypt_generic_init($module, $this->aesKey, $iv);
			//加密
			$encrypted = mcrypt_generic($module, $text);
			mcrypt_generic_deinit($module);
			mcrypt_module_close($module);

			//print(base64_encode($encrypted));
			//使用BASE64对加密后的字符串进行编码
			return base64_encode($encrypted);
		} catch (\Exception $e) {
			\Yii::error('Encrypt AES Error',WEIXIN_CATEGORY.'Encrypt');
			return false;
		}
	}

	/**
	 * 解密数据
	 * @param $encrypted
	 * @return string
	 */
	public function decrypt($encrypted)
	{
		$signature = $this->getSHA1($encrypted);

		if ($signature != $this->msgSignature) {
			\Yii::error($signature.' != '.$this->msgSignature,WEIXIN_CATEGORY.'Check Encrypt signature');
			return false;
		}


		try {
			//使用BASE64对需要解密的字符串进行解码
			$ciphertext_dec = base64_decode($encrypted);
			$module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
			$iv = substr($this->aesKey, 0, 16);
			mcrypt_generic_init($module, $this->aesKey, $iv);

			//解密
			$decrypted = mdecrypt_generic($module, $ciphertext_dec);
			mcrypt_generic_deinit($module);
			mcrypt_module_close($module);
		} catch (\Exception $e) {
			\Yii::error('Decrypt AES Error',WEIXIN_CATEGORY.'Decrypt');
			return false;
		}


		try {
			//去除补位字符
			$pkc_encoder = new PKCS7Encoder;
			$result = $pkc_encoder->decode($decrypted);
			//去除16位随机字符串,网络字节序和AppId
			if (strlen($result) < 16)
				return "";
			$content = substr($result, 16, strlen($result));
			$len_list = unpack("N", substr($content, 0, 4));
			$xml_len = $len_list[1];
			$xml_content = substr($content, 4, $xml_len);
			$from_appid = substr($content, $xml_len + 4);
		} catch (\Exception $e) {
			\Yii::error('Illegal Buffer',WEIXIN_CATEGORY.'Decrypt');
			return false;
		}
		if ($from_appid != $this->appId)
		{
			\Yii::error('Validate Appid Error',WEIXIN_CATEGORY.'Decrypt');
			return false;
		}
		return $xml_content;
	}


	/**
	 * 生成SHA1
	 * @param $encrypted
	 * @return string
	 */
	private function getSHA1($encrypted)
	{
		$array = array($encrypted, $this->token, $this->timestamp, $this->nonce);
		sort($array, SORT_STRING);
		$str = implode($array);
		return sha1($str);
	}


	public function decryptFromPost()
	{
		$xml = simplexml_load_string ( \Yii::$app->request->getRawBody() , 'SimpleXMLElement', LIBXML_NOCDATA );
		if (!$xml->Encrypt)
		{
			return false;
		}
		return $this->decrypt((string)$xml->Encrypt);
	}


	public function encryptToXml($xml)
	{
		$encrypted = $this->encrypt($xml);
		$signature = $this->getSHA1($encrypted);
		return $this->generateEncryptedXml($encrypted,$signature,$this->timestamp,$this->nonce);
	}

	/**
	 * 生成xml消息
	 * @param string $encrypt 加密后的消息密文
	 * @param string $signature 安全签名
	 * @param string $timestamp 时间戳
	 * @param string $nonce 随机字符串
	 * @return string
	 */
	public function generateEncryptedXml($encrypt, $signature, $timestamp, $nonce)
	{
		$format = <<<XML
<xml>
<Encrypt><![CDATA[%s]]></Encrypt>
<MsgSignature><![CDATA[%s]]></MsgSignature>
<TimeStamp>%s</TimeStamp>
<Nonce><![CDATA[%s]]></Nonce>
</xml>
XML;
		return sprintf($format, $encrypt, $signature, $timestamp, $nonce);
	}


}


/**
 * PKCS7Encoder class
 *
 * 提供基于PKCS7算法的加解密接口.
 */
class PKCS7Encoder
{
	public static $block_size = 32;

	/**
	 * 对需要加密的明文进行填充补位
	 * @param string $text 需要进行填充补位操作的明文
	 * @return string 补齐明文字符串
	 */
	function encode($text)
	{
		$text_length = strlen($text);
		//计算需要填充的位数
		$amount_to_pad = PKCS7Encoder::$block_size - ($text_length % PKCS7Encoder::$block_size);
		if ($amount_to_pad == 0) {
			$amount_to_pad = PKCS7Encoder::$block_size;
		}
		//获得补位所用的字符
		$pad_chr = chr($amount_to_pad);
		$tmp = "";
		for ($index = 0; $index < $amount_to_pad; $index++) {
			$tmp .= $pad_chr;
		}
		return $text . $tmp;
	}

	/**
	 * 对解密后的明文进行补位删除
	 * @param string $text decrypted解密后的明文
	 * @return string 删除填充补位后的明文
	 */
	function decode($text)
	{
		$pad = ord(substr($text, -1));
		if ($pad < 1 || $pad > 32) {
			$pad = 0;
		}
		return substr($text, 0, (strlen($text) - $pad));
	}



}