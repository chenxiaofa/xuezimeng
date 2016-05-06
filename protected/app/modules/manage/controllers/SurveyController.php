<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 21:33
 */

namespace app\modules\manage\controllers;


class SurveyController extends ApplicationController
{
    public function actionList()
    {
        return $this->render('list');
    }
}