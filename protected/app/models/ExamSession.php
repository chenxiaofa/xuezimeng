<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exam_session}}".
 *
 * @property integer $id
 * @property string $openid
 * @property string $name
 * @property string $phone
 * @property integer $sex
 * @property integer $age
 * @property integer $stage
 * @property integer $score
 * @property integer $exam_time
 * @property integer $waid
 * @property string $qq
 * @property string $eqoid
 * @property string $school
 * @property string $class
 */
class ExamSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%exam_session}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['exam_time','default','value'=>time()] 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键ID',
            'openid' => '微信OPENID',
            'name' => '姓名',
            'phone' => '电话',
            'sex' => '性别,1男,2女,0保密',
            'age' => '年龄',
            'stage' => '就读阶段:1小学,2初中,3高中',
            'score' => '得分',
            'exam_time' => '考试时间',
        ];
    }
}
