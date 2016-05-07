<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exam_questions}}".
 *
 * @property integer $id
 * @property string $question
 * @property integer $type
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 * @property integer $order
 * @property string $placeholder
 */
class ExamQuestions extends \yii\db\ActiveRecord
{
    const QUESTION_TYPE_SINGLE_SELECT = 0;
    const QUESTION_TYPE_MULTIPLE_SELECT = 1;
    const QUESTION_TYPE_FILL = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%exam_questions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question'], 'string'],
            [['type', 'create_time', 'update_time', 'status', 'order'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '问题ID',
            'question' => '问题内容',
            'type' => '问题类型：0.单选，1.多选，3.填空',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'status' => '是否启用',
            'order' => 'Order',
        ];
    }

    public static function findById($id)
    {
        static $cache = [];
        if (!array_key_exists($id,$cache))
        {
            $cache[$id] = static::findOne(['id'=>$id]);
        }
        return $cache[$id];
    }

}
