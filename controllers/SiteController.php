<?php

namespace app\controllers;

use app\models\MobileDataRemoteUploadEventHandler;
use app\models\UploadMobileNumbersForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','contact','logout'],
                'rules' => [
                    [
                        'actions' => ['index','contact','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $uploadFormModel = new UploadMobileNumbersForm();
        if($uploadFormModel->load(Yii::$app->request->post()) ){
            $uploadFormModel->rawFile = UploadedFile::getInstance($uploadFormModel, 'rawFile');
            $outputfile = $uploadFormModel->save();
            $uploadFormModel->on(UploadMobileNumbersForm::NEW_MOBILE_UPLOAD, [new MobileDataRemoteUploadEventHandler(), 'handle'], $outputfile);
            $uploadFormModel->trigger(UploadMobileNumbersForm::NEW_MOBILE_UPLOAD);
            $groupname = $uploadFormModel->rawFile->name;
            $groupname = explode('.', $groupname);
            $groupname = $groupname[0];
            $groupname = preg_replace("/[^A-Za-z0-9]/", "", $groupname);
            return $this->redirect(["/group/view/",'groupName'=>$groupname]);
        }
        return $this->render('index',compact('uploadFormModel'));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
