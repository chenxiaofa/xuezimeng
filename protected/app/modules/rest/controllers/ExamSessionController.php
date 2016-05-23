<?php
namespace app\modules\rest\controllers;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 22:29
 */
class ExamSessionController extends \app\rest\ActiveController
{
    public $modelClass = '\app\models\ExamSession';

    /**
     * @param \yii\db\ActiveQuery $query
     * @return \yii\db\ ActiveQuery
     */
    public function addCondition($query)
    {
        $r = \Yii::$app->request;
        $query->orderBy('id desc');
        if (($status = $r->get('status',false)) !== false)
        {
            $query->andWhere('status = :status',[':status'=>$status]);
        }
        return $query;
    }


}