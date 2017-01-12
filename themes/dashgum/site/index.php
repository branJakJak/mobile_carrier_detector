<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Yii::$app->params['site_title'].' - Upload Mobile Numbers';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Upload File</h1>

        <?php $form = ActiveForm::begin([
            // 'id' => 'login-form',
            // 'options' => ['class' => 'form-horizontal'],
            // 'fieldConfig' => [
            //     'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            //     'labelOptions' => ['class' => 'col-lg-1 control-label'],
            // ],
        ]); ?>

            <?= $form->field($model, 'username') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    s

    </div>
</div>
