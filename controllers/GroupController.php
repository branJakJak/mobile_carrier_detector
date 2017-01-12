<?php

namespace app\controllers;

use app\models\MobileCarrier;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;

class GroupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider();
        $dataProvider->allModels = \Yii::$app->db->createCommand("select distinct mobile_carrier.group from mobile_carrier")->queryAll();
        return $this->render('index',compact('dataProvider'));
    }

    public function actionView($groupName)
    {
        $query = MobileCarrier::find()->where(['group' => $groupName]);
        $dataProvider = new ActiveDataProvider();
        $dataProvider->query = $query;
        if (!$query->exists()) {
            \Yii::$app->session->setFlash('warning', "We are currently uploading the data. Please wait.");
        }        
        return $this->render('view', compact('dataProvider','groupName'));

    }
    public function actionDownload($groupName)
    {
        $query = MobileCarrier::find()->where(['group' => $groupName]);
        if ($query->exists()) {
            $allData = \Yii::$app->db->createCommand("select mobile,carrier from mobile_carrier")->queryAll();
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename='.$groupName.'_'.date("Y-m-d").'.csv');
            header('Pragma: no-cache');
           echo sprintf("%s,%s","Mobile","Carrier") . PHP_EOL;            
            foreach ($allData as $key => $value) {
                echo sprintf("%s,%s",$value['mobile'],$value['carrier']) . PHP_EOL;
            }
        }
        else{
            throw new NotFoundHttpException("Cant find that group in the database");
        }        
    }

}
