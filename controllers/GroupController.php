<?php

namespace app\controllers;

use app\models\MobileCarrier;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class GroupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($groupName)
    {
        $query = MobileCarrier::find()->where(['group' => $groupName]);
        if ($query->exists()) {
            $dataProvider = new ActiveDataProvider();
            $dataProvider->query = $query;
            return $this->render('view', compact('dataProvider'));
        }
        else{
            throw new NotFoundHttpException("Cant find that group in the database");
        }
    }

}
