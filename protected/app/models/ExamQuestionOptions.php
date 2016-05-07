<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_exam_question_options".
 *
 * @property integer $id
 * @property integer $eqid
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $order
 */
class ExamQuestionOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_exam_question_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eqid', 'status', 'create_time', 'update_time', 'order'], 'integer'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '选项ID',
            'eqid' => '问题ID',
            'content' => '选项内容',
            'status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
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
