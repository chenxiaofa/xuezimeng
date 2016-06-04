<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_draft}}".
 *
 * @property integer $id
 * @property integer $aid
 * @property string $content
 * @property integer $create_time
 * @property string $title
 */
class ArticleDraft extends ArticleDraftBase
{
    public static function addDraft($aid,$title,$content)
    {
        $model =new self();
        $model->content = $content;
        $model->title = $title;
        $model->aid = $aid;
        $model->create_time = time();
        try{
            $model->save(false);
        }catch (\Exception $e){}
    }
}
