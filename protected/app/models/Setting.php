<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property string $key
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{
    const SETTING_CACHE_KEY = 'SETTING_CACHE';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['value'], 'string'],
            [['key'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => 'Key',
            'value' => 'Value',
        ];
    }

    /**
     * 获取网站配置
     * @returns array
     */
    public static function getSetting()
    {
        $cache = \Yii::$app->cache->get(self::SETTING_CACHE_KEY);
        if ($cache === false)
        {
            $cache = [];
            /** @var self $model */
            foreach(Setting::find()->all() as $model)
            {
                $cache[$model->key] = $model->value;
            }
            \Yii::$app->cache->set(self::SETTING_CACHE_KEY,$cache,3600);
        }
        return $cache;
    }
}
