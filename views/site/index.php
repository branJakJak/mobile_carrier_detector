<?php

/* @var $this yii\web\View */
/* @var $uploadFormModel \app\models\UploadMobileNumbersForm */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = \Yii::$app->params['site_title'].' - Upload';
?>
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Upload Mobile Numbers</h3>
                </div>
                <div class="panel-body">
                    <h4>Upload Mobile Numbers</h4>
                    <?php $form = ActiveForm::begin([
                    // 'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data','style'=>'padding: 30px;'],
                    ]); ?>
                    <?= $form->field($uploadFormModel, 'rawFile')->fileInput()->label("Mobile Number") ?>
                    <hr>
                    <div class="form-group">
                        <?= Html::submitButton('Upload', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        
    </div>


</div>
