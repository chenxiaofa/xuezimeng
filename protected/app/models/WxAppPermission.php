<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wx_app_permission}}".
 *
 * @property integer $uid
 * @property integer $app_id
 * @property integer $type
 * @property integer $create_time
 */
class WxAppPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_app_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'app_id', 'type'], 'required'],
            [['uid', 'app_id', 'type', 'create_time'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => '用户ID',
            'app_id' => 'APPID',
            'type' => '权限类型',
            'create_time' => '创建时间',
        ];
    }
}
