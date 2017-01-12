<?php
/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
use yii\grid\GridView;

?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1>Mobile &amp; Carriers</h1>
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