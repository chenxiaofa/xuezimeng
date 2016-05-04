<?php
namespace app\weixin\handler;
use app\weixin\Request;
use yii\base\Exception;
use app\models\WxApp;
use app\models\WxUsers;
use app\models\WxBind;

/**


 * User: 陈晓发
 * Date: 2016/3/18
 * Time: 15:28
 */
class Handler
{
	protected static $handlerList = [
		'text'=>'\app\weixin\handler\TextHandler'
	];
	/** @var WxUsers  */
	protected $wxUser = null;
	/** @var WxBind */
	protected $wxBind = null;

	/** @var Request */
	protected $request = null;

	/** @var WxApp */
	protected $wxApp = null;

	/**
	 * 私有化构造函数，防止外部创建
	 * Handler constructor.
	 */
	private function __construct(){}

	/**
	 * 设置Request对象
	 * @param Request $req
	 */
	public function setRequest(Request $req)
	{
		$this->request = $req;
	}

	/**
	 * 设置WxApp对象
	 * @param WxApp $wxApp
	 */
	public function setWxApp(WxApp $wxApp)
	{
		$this->wxApp = $wxApp;
	}

	/**
	 * 设置WxUser对象
	 * @param WxUsers $wxUser
	 */
	public function setWxUser(WxUsers $wxUser)
	{
		$this->wxUser = $wxUser;
	}

	/**
	 * 初始化
	 */
	public function init()
	{

	}

	/**
	 * @param Request $req
	 * @return static
	 */
	public static function create()
	{
		return new static();
	}

	/**
	 * @param Request $wxRequest
	 * @return \app\weixin\Response
	 */
	public static function dispatch(Request $wxRequest,WxApp $wxApp,WxUsers $wxUser)
	{

		return self::getHandler($wxRequest,$wxApp,$wxUser)->handle();
	}



	/**
	 * @return \app\weixin\Response
	 */
	public function handle()
	{

	}



	/**
	 * @param Request $req
	 * @return Handler
	 */
	public static function getHandler(Request $req,WxApp $wxApp,WxUsers $wxUser)
	{
		$type = $req->getMsgType();
		\Yii::trace($type,WEIXIN_CATEGORY.'Message Type');
		$class = self::$handlerList['text'];
		if (array_key_exists($type,self::$handlerList))
		{
			$class = self::$handlerList[$type];
		}
		\Yii::trace($class,WEIXIN_CATEGORY.'Message Handler');
		try
		{
			/** @var $class self */
			$handler = $class::create();
		}
		catch(\Exception $e)
		{
			\Yii::warning('unknown message type',WEIXIN_CATEGORY.'Message Type');
			$handler = TextHandler::create();
		}

		$handler->setRequest($req);
		$handler->setWxApp($wxApp);
		$handler->setWxUser($wxUser);
		$handler->init();
		return $handler;
	}

}