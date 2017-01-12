<?php

namespace app\controllers;

use app\components\RemoteCarrierFinder;
use app\models\MobileCarrier;
use yii\helpers\Json;
use yii\web\Response;

class ApiController extends \yii\web\Controller
{
    public function actionCreate($groupName,$mobileNumber)
    {
        /**
         * @var $carrierFinder RemoteCarrierFinder
         */
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $message = [
            'success' => true,
            'message' => 'Unknown error'
        ];
        if($mobileNumber[0] != 0){
            //append zero
            $mobileNumber = '0' . $mobileNumber;
        }
        $carrierFinder = \Yii::$app->carrierFinder;
        $foundResult = $carrierFinder->find($mobileNumber);
        $newMobileCarrier = new MobileCarrier();
        $newMobileCarrier->mobile = $foundResult['mobile'];
        $newMobileCarrier->carrier =$foundResult['carrier'];
        $newMobileCarrier->group = $groupName;
        if ($newMobileCarrier->save()) {
            $message = [
                'success' => true,
                'message' => $newMobileCarrier
            ];
        }else{
            $message = [
                'success' => true,
                'message' => $newMobileCarrier->getErrors()
            ];
        }
        return Json::encode($message);
    }

}
