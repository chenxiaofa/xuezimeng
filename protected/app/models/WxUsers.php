<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wx_users}}".
 *
 * @property integer $id
 * @property string $nickname
 * @property integer $sex
 * @property string $language 
 * @property string $city
 * @property string $province
 * @property integer $subscribe
 * @property string $openid
 * @property string $headimgurl
 * @property integer $subscribe_time
 * @property string $unionid
 * @property string $remark
 * @property integer $groupid
 * @property integer $create_time
 * @property integer $update_time
 */
class WxUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['nickname', 'sex'], 'required'],
//            [['sex', 'groupid', 'create_time', 'update_time'], 'integer'],
//            [['remark'], 'string'],
//            [['nickname', 'headimgurl'], 'string', 'max' => 128],
//            [['language', 'city', 'province'], 'string', 'max' => 16],
//            [['openid', 'unionid'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '微信用户ID',
            'nickname' => '微信昵称',
            'sex' => '微信性别',
            'language' => '微信语言',
            'city' => '城市',
            'province' => '省份',
            'subscribe' => '订阅',
            'openid' => 'openid',
            'headimgurl' => '头像URL',
            'subscribe_time' => '关注时间',
            'unionid' => '联合ID',
            'remark' => '备注',
            'groupid' => '分组ID',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }

    /**
     * 从微信返回用户信息中创建用户
     * @param array $info
     * @return WxUsers
     */
    public static function createFromWxUserInfo($info)
    {
        $model = new static();
        $model->setAttributes($info,false);
        $model->create_time = $model->update_time = time();
        return $model;
    }
}
