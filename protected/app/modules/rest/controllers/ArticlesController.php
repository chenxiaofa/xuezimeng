<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23
 * Time: 21:16
 */

namespace app\modules\rest\controllers;


use app\rest\ActiveController;

class ArticlesController extends ActiveController
{
    public $modelClass = '\app\models\Articles';

    /**
     * @param \yii\db\ActiveQuery $query
     * @return \yii\db\ ActiveQuery
     */
    public function addCondition($query)
    {
        $r = \Yii::$app->request;
        $query->orderBy('id asc');
        if (($type = $r->get('type',false)) !== false)
        {
            $query->andWhere('type = :type',[':type'=>$type]);
        }
        return $query;
    }

}