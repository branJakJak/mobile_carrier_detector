<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobileCarrier */

$this->title = 'Update Mobile Carrier: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mobile Carriers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobile-carrier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
