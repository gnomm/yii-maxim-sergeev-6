<?php

namespace app\models;

use app\models\tables\Users;


class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];


//    public static function tableName()
//    {
//        return 'users';
//    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
//        var_dump(static::findOne($id));
        if ($user = Users::findOne($id)) {
            return new static([
                'id' => $user->id,
                'username' => $user->login,
                'password' => $user->password,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
//echo 'gaag';
//        var_dump($username);
//        var_dump(static::findOne(['login' => $username]));
//        var_dump(static::findOne(['username' => $username]));
        if ($user = Users::findOne(['login' => $username])) {
            return new static([
                'id' => $user->id,
                'username' => $user->login,
                'password' => $user->password,
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
//        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
//        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
//        echo 'test';
//        var_dump(\Yii::$app->security->validatePassword($password, $this->password));
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}


