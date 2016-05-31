<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $id
 * @property integer $aid
 * @property string $title
 * @property string $content
 * @property integer $type
 * @property integer $status
 * @property integer $create_time
 * @property integer $creator
 */
class Articles extends \yii\db\ActiveRecord
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
            [['aid', 'type', 'status', 'create_time', 'creator'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'aid' => '文章ID',
            'title' => '标题',
            'content' => '内容',
            'type' => '文章类型',
            'status' => '文章状态,0:草稿,1.发布',
            'create_time' => '创建时间',
            'creator' => '创建者',
        ];
    }
}
