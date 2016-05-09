<?php

namespace app\modules\mobile;

use app\managers\WeixinManager;
use app\models\WxApp;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\mobile\controllers';

    /** @var WeixinManager */
    public $wxMgr = null;

    public function init()
    {
        parent::init();
        
        //$this->wxMgr = WeixinManager::getInstance(['wxAppModel'=>WxApp::findOne(['id'=>3])]);
        // custom initialization code goes here 
    }
}
