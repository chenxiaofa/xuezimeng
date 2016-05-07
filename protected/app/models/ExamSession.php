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
     * @return array
     */
    public function fields()
    {
        $filterFunc = function($field)
        {
            return function($model)use($field)
            {
                if (!is_null($model->$field))
                    return $model->$field;
                return '';
            };
        };
        return [
            'id',
            'name'=>$filterFunc('name'),
            'school'=>$filterFunc('school'),
            'phone'=>$filterFunc('phone'),
            'qq'=>$filterFunc('qq'),
            'exam_time'=>function($model){return date('Y-m-d H:i:s',$model->exam_time);},
            'options'=>function($model)
            {
                $options = [];
                foreach(explode(',',$model->eqoid) as $eqoid)
                {
                    $eqoModel =  ExamQuestionOptions::findById($eqoid);
                    if (empty($eqoModel)) continue;
                    
                    $eqModel = ExamQuestions::findById($eqoModel->eqid);
                    
                    $options[$eqModel->question][] = $eqoModel->content;
                }

                return $options;
            }
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
