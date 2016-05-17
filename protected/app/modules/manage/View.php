<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/7
 * Time: 17:32
 */

namespace app\modules\manage;


use yii\helpers\Url;

class View extends \yii\web\View
{
    public $menu = [];
    public $header = '';
    public $title = '学子梦';

    protected function renderMenu()
    {
        $currRoute = '/'.\Yii::$app->controller->route;
        foreach($this->menu as &$m)
        {
            if (array_key_exists('url',$m) && $m['url'] == $currRoute)
            {
                $m['is_active'] = 1;
            }
            if (array_key_exists('sub_menu',$m))
            {
                foreach($m['sub_menu'] as &$sm)
                {
                    if ($sm['url'] == $currRoute)
                    {
                        $m['is_active'] = 1;
                        $sm['is_active'] = 1;
                    }
                }
            }
        }
    }



    public function getCurrentRouter()
    {
        return '/'.\Yii::$app->controller->route;
    }
}