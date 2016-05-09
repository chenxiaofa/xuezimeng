<?php
namespace app\modules\web\controllers;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/9
 * Time: 21:38
 */
class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}