<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $type
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $creator
 */
class ArticlesBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['type', 'status', 'create_time', 'update_time', 'creator'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['image_url'], 'string', 'max' => 128],
            [['introduction'], 'string', 'max' => 2048],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'title' => '标题',
            'content' => '内容',
            'type' => '1.站点模块,2.课程内容,3.动态',
            'status' => '状态,0.禁用,1.启用',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'creator' => '作者',
        ];
    }
}
