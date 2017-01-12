<?php
/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
use yii\grid\GridView;
use yii\helpers\Html;

?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php if (Yii::$app->session->hasFlash('warning')): ?>
		<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?= Yii::$app->session->getFlash('warning') ?>
					</div>			
	<?php endif ?>
		<h1>
			Mobile &amp; Carriers
			<?= Html::a("Download", '/group/download/'.$groupName, ['class' => 'btn btn-primary']); ?>
		</h1>
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			// 'columns' => [
			// 	['class' => 'yii\grid\SerialColumn'],
			// 	[
		 //            'attribute' => 'title',
		 //            'filter'    => ArrayHelper::map($array, 'id', 'title'),
		 //            'format'    => 'raw',
		 //            'value'     => function ($model, $key, $index, $column) {
		 //                return $model->value;
		 //            }
		 //        ],
			// ]
		]);?>
	</div>
</div>