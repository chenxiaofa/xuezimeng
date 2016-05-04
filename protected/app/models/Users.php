<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "wp_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $create_time
 * @property integer $last_login_time
 * @property string auth_key
 */
class Users extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'last_login_time'], 'integer'],
            [['username'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 64],
            [['password', 'salt'], 'string', 'max' => 32],
            [['auth_key'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'salt' => 'Salt',
            'create_time' => 'Create Time',
            'last_login_time' => 'Last Login Time',
        ];
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //not support
        return null;
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * 根据规则设置密码
     * @param $password
     */
    public function setPassword($password)
    {
        $this->salt = self::generateSalt();
        $this->password = self::encryptPassword($this->salt,$password);
    }

    /**
     * 生成随机salt
     * @return string
     */
    public static function generateSalt()
    {
        return md5(time().rand(0,9999));
    }

    /**
     * 加密密码
     * @param $salt
     * @param $password
     * @return string
     */
    public static function encryptPassword($salt,$password)
    {
        return md5($salt.$password.$salt);
    }

    /**
     * Init Create time
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if ($insert === true)
        {
            $this->auth_key = self::encryptPassword($this->salt,time().rand(0,9999));
            $this->create_time = time();
        }
        return parent::beforeSave($insert);
    }

    /**
     * @param $password
     * @return bool
     */
    public function checkPassword($password)
    {
        return $this->password === self::encryptPassword($this->salt,$password);
    }
}
