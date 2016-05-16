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

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionCourses()
    {
        return $this->render('courses');
    }
    public function actionContact()
    {
        return $this->render('contact');
    }
    public function actionPrice()
    {
        return $this->render('price');
    }
    public function actionPreferential()
    {
        return $this->render('preferential');
    }
}