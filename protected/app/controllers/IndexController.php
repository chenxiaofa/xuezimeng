<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/5
 * Time: 0:47
 */

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->redirect('/m');
    }
    public function actionMaintenance()
    {
        return '正在维护!'.date('Y-m-d H:i:s');
    }
}