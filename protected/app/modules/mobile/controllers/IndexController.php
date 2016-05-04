<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 0:45
 */

namespace app\modules\mobile\controllers;


use yii\web\Controller;

class IndexController extends Controller
{
    public $layout = 'bootstrap3';
    public function actionIndex()
    {
        return $this->render('about');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}