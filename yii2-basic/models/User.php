<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property string $created_at
 */
//User extends  \yii\db\ActiveRecord implements \yii\web\IdentityInterface
class User extends  \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key', 'access_token'], 'required'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 55],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'created_at' => 'Created At',
        ];
    }

    public static function findIdentity($id)
    {
        return  self::findOne(['id'=>$id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' -> $token])->one();
    }

    public  static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this -> id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authkey)
    {
        return $this->auth_key === $authkey;
    }

    public function validatePassword($password)
    {
        // var_dump(Yii::$app->getSecurity()->validatePassword($password,$
        return  Yii::$app->getSecurity()->validatePassword($password,$this->password);
    }
}
