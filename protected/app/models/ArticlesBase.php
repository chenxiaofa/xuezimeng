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
 * @property string $image_url
 * @property string $summarization
 * @property string $alias
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
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['type', 'status', 'create_time', 'update_time', 'creator'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['image_url'], 'string', 'max' => 128],
            [['summarization'], 'string', 'max' => 2048],
            [['alias'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'title' => '文章标题',
            'content' => '文章内容',
            'type' => '文章类型:1.首页模块,2.课程介绍,3.学子梦动态',
            'status' => '状态:0.不显示,1.显示',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'creator' => '创建者',
            'image_url' => '标题配图',
            'summarization' => '摘要',
            'alias' => 'url别名',
        ];
    }
}
