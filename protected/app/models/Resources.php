<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%resources}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $url
 * @property integer $owner
 * @property integer $create_time
 *
 * @property Users $owner0
 */
class Resources extends \yii\db\ActiveRecord
{
    const RESOURCE_TYPE_IMAGE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%resources}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'owner', 'create_time'], 'integer'],
            [['name', 'url'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'url' => 'Url',
            'owner' => 'Owner',
            'create_time' => 'Create Time',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'type',
            'name',
            'url',
            'create_time'=>function($model){return date('Y-m-d H:i:s',$model->create_time);}
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(Users::className(), ['id' => 'owner']);
    }

    public static function getNewFileName($name)
    {
        $tmp = explode('.',$name);
        $tmp = end($tmp);
        $tmp = strtolower($tmp);
        return md5(time()).rand(11111,99999).'.'.$tmp;
    }

    public static function getSavePath($name)
    {
        $path = '/static/images/uploads/'.date('Y').'/'.date('m').'/'.date('d').'/';
        return $path;
    }

    public static function createNewResource($name,$file)
    {
        $path = self::getSavePath($name);
        $newFilename = self::getNewFileName($name);
        $savePath = \Yii::getAlias('@webroot').$path;
        if (!file_exists($savePath))
        {
            @mkdir($savePath,644,true);
        }
        @move_uploaded_file($file,$savePath.$newFilename);
        $model = new self();
        $model->create_time = time();
        $model->type = self::RESOURCE_TYPE_IMAGE;
        $model->name = $name;
        $model->url = $path.$newFilename;
        $model->owner = \Yii::$app->user->identity->id;
        $model->save();
        return $model;
    }
}
