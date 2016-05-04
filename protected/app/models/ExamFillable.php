<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exam_fillable}}".
 *
 * @property integer $id
 * @property integer $esid
 * @property integer $eqid
 * @property string $content
 */
class ExamFillable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%exam_fillable}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['esid', 'eqid'], 'integer'],  
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
            'esid' => 'exam_session 关联 id',
            'eqid' => 'exam_questions 关联ID',
            'content' => 'Content',
        ];
    }
}
