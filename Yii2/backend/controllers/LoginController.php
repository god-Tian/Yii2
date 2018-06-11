<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/8 0008
 * Time: 上午 9:50
 */

namespace backend\controllers;


use backend\models\User;
use yii\web\Controller;

class LoginController extends Controller
{
    protected $error;

    public function actionLogin() {
        $data = \Yii::$app->request->post();
        if ($this->isNull($data)) {
            $user = User::find()->where(['username' => $data['username']])->one();
            if ($user) {
                if ($this->validatePwd($user,$data)) {
                    $session = \Yii::$app->session;
                    $session->set('userInfo',$user);
                    $this->redirect('index.php?r=liuyanban/index');
                } else {
                    echo '密码错误';
                }
            } else {
                echo '用户名不存在';
            }
        } else {
            echo $this->error;
        }
    }

    public function isNull($data) {
        if (empty($data['username']) || empty($data['password'])) {
            $this->error = '用户名或密码为空';
            return false;
        } else {
            return true;
        }
    }

    public function validatePwd($user,$data) {
        return md5($data['password'].$user['salt']) == $user['password'];
    }

    public function actionIndex(){
        return $this->render('index');
    }
}