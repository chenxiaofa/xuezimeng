<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wx_menu}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $app_id
 * @property integer $type
 * @property string $name
 * @property string $param
 * @property integer $create_time
 * @property integer $status
 */
class WxMenu extends \yii\db\ActiveRecord
{
    const TYPE_LIST = 0;
    const TYPE_CLICK = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'app_id', 'type', 'create_time', 'status'], 'integer'],
            [['app_id', 'type'], 'required'],
            [['name'], 'string', 'max' => 40],
            [['param'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '菜单ID',
            'parent_id' => '父节点ID',
            'app_id' => 'appid',
            'type' => '按钮类型',
            'name' => '按钮名称',
            'param' => '按钮参数',
            'create_time' => '创建时间',
            'status' => '是否启用',
        ];
    }
}
