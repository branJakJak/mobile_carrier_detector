<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MobileCarrier */

$this->title = 'Create Mobile Carrier';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Carriers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-carrier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
