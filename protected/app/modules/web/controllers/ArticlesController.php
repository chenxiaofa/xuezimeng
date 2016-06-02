<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 22:41
 */

namespace app\modules\web\controllers;


use app\models\Articles;

class ArticlesController extends \yii\web\Controller
{
    public function actionView($aid)
    {
        $model = Articles::findOne(['id'=>1]);
        return $this->render('view',['model'=>$model]);
    }
}