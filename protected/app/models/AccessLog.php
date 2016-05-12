<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%access_log}}".
 *
 * @property integer $id
 * @property integer $method
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property string $from
 * @property resource $request
 * @property integer $access_time
 */
class AccessLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%access_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['method', 'access_time'], 'integer'],
            [['module', 'controller', 'action', 'from', 'access_time'], 'required'],
            [['request'], 'string'],
            [['module'], 'string', 'max' => 32],
            [['controller', 'action'], 'string', 'max' => 64],
            [['from'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'method' => 'Method',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
            'from' => 'From',
            'request' => 'Request',
            'access_time' => 'Access Time',
        ];
    }
}
