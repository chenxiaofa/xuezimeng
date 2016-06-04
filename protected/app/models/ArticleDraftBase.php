<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_draft}}".
 *
 * @property integer $id
 * @property integer $aid
 * @property string $content
 * @property integer $create_time
 */
class ArticleDraftBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_draft}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'create_time'], 'integer'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => 'Aid',
            'content' => 'Content',
            'create_time' => 'Create Time',
        ];
    }
}
