<?php
namespace frontend\controllers;

use frontend\models\User;
use yii\web\Controller;

/**
 * Site controller
 */
class UserController extends Controller
{
    public function actionIndex() {
        $list = User::find()->all();
        return $this->render('index', [
            'list' => $list
        ]);
    }

    public function actionAdd() {
        return $this->render('add');
    }

    public function actionAddsave() {
        $data = \Yii::$app->request->post();
        $user = new User();
        foreach ($data as $k=>$v) {
            $user->$k = $v;
        }
        $user->create_time = time();
        $user->update_time = time();
        if ($user->save()) {
            $this->redirect(['index']);
        } else {
            echo '添加失败';
        }
    }

    public function actionEdit() {
        $id = \Yii::$app->request->get('id');
        $info = empty($id) ? null : User::find()->where(['id' => $id])->one();
        if ($info) {
            return $this->render('edit', [
                'list' => $info
            ]);
        } else {
            echo '要修改的数据不存在';
        }
    }

    public function actionEditSave() {

    }

    public function actionDelete() {
        $id = \Yii::$app->request->get('id');
        $info = empty($id) ? null : User::find()->where(['id' => $id])->one();
        if ($info) {
            if ($info->delete()) {
                $this->redirect(['index']);
            } else {
                echo '删除失败';
            }
        } else {
            echo '要删除的数据不存在';
        }
    }
}