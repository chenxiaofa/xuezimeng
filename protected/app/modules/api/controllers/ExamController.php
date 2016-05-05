<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/3
 * Time: 22:01
 */

namespace app\modules\api\controllers;


use app\models\ExamFillable;
use app\models\ExamSession;
use app\modules\api\validators\ExamSaveValidator;

class ExamController extends ApiController
{
    public function actionSave()
    {
        $vExamSave = ExamSaveValidator::createFromBodyParams();
        if ($vExamSave->validate() == false)
        {
            $vExamSave->T();
        }
        $model = new ExamSession();
        $model->setAttributes($vExamSave->getAttributes(),false);
        $model->save();

        if (!empty($vExamSave->fillable))
        {
            foreach($vExamSave->fillable as $eqid=>$content)
            {
                $efModel = new ExamFillable();
                $efModel->esid = $model->id;
                $efModel->eqid = $eqid;
                $efModel->content = $content;
                $efModel->save();
            }
        }


        return $model;
    }
}