<?php

namespace app\modules\web;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\web\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here 
    }

    public function afterAction($action, $result)
    {
        $result = str_replace('{__STATIC__}','/static',$result);
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }
}
