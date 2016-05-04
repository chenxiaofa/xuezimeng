<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wx_bind}}".
 *
 * @property integer $id
 * @property integer $waid
 * @property integer $wuid
 * @property string $openid 
 * @property integer $groupid
 * @property integer $subscribe
 * @property integer $create_time
 */
class WxBind extends \yii\db\ActiveRecord
{
    private $wxUser = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_bind}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['waid', 'wuid', 'openid'], 'required'],
//            [['waid', 'wuid', 'groupid', 'subscribe', 'create_time'], 'integer'],
//            [['openid'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户绑定微信账号关系ID',
            'waid' => '微信APPID',
            'wuid' => '微信用户ID',
            'openid' => '微信openid',
            'groupid' => '用户分组ID',
            'subscribe' => '是否订阅',
            'create_time' => '创建时间',
        ];
    }

    /**
     * 获取关联的用户信息
     * @return WxUsers|null
     */
    public function getWxUser()
    {
        if (is_null($this->wxUser))
        {
            $this->wxUser = WxUsers::findOne(['id'=>$this->wuid]);
        }
        return $this->wxUser;
    }

    /**
     * 设置WxUser
     * @param $wxUser
     */
    public function setWxUser($wxUser)
    {
        $this->wxUser = $wxUser;
    }

}
