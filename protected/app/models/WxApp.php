<?php

namespace app\models;

use app\managers\WeixinManager;
use Yii;

/**
 * This is the model class for table "{{%m_wx_app}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $wx_app_id
 * @property string $wx_app_sec
 * @property string $wx_token
 * @property string $wx_encoding_aes_key
 * @property integer $wx_is_encrypted
 * @property string $wx_access_token
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $owner
 * @property integer $wx_access_token_expire
 */
class WxApp extends \yii\db\ActiveRecord
{
    const ENCRYPT_ON  = 1;
    const ENCRYPT_OFF = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_app}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'wx_is_encrypted', 'create_time', 'update_time'], 'integer'],
            [['wx_app_id', 'wx_app_sec', 'wx_token'], 'required'],
            [['name'], 'string', 'max' => 128],
            [['wx_app_id', 'wx_app_sec', 'wx_token', 'wx_encoding_aes_key'], 'string', 'max' => 64],
            ['wx_access_token','string','max'=>256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键ID,app_id',
            'name' => 'Name',
            'status' => 'Status',
            'wx_app_id' => '应用ID',
            'wx_app_sec' => '应用Sec',
            'wx_token' => '应用token',
            'wx_encoding_aes_key' => '加密密钥',
            'wx_is_encrypted' => '是否启用加密',
            'wx_access_token' => 'access_token',
            'create_time' => '应用创建时间',
            'update_time' => '应用更新时间',
        ];
    }


    public function updateAccessToken($accessToken,$expire)
    {
        $this->wx_access_token = $accessToken;
        $this->wx_access_token_expire = $expire + time();
        $this->save();
    }


    public function isEncrypted()
    {
        return $this->wx_is_encrypted == self::ENCRYPT_ON;
    }

}
