<?php

namespace app\modules\api;

use app\models\AccessLog;

class Module extends \app\components\Module
{
    public $controllerNamespace = 'app\modules\api\controllers';

    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
