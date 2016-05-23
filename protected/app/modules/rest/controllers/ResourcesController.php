<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23
 * Time: 21:16
 */

namespace app\modules\rest\controllers;


use app\rest\ActiveController;

class ResourcesController extends ActiveController
{
    public $modelClass = '\app\models\Resources';

    /**
     * @param \yii\db\ActiveQuery $query
     * @return \yii\db\ ActiveQuery
     */
    public function addCondition($query)
    {
        $r = \Yii::$app->request;
        $query->orderBy('id desc');
        if (($type = $r->get('type',false)) !== false)
        {
            $query->andWhere('type = :type',[':type'=>$type]);
        }
        return $query;
    }

}