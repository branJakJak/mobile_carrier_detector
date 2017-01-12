<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\Html;
?>
<div class="row">
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">		
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Groups</h3>
			</div>
			<div class="panel-body">
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'columns' => [
						'group',
						[
							'encodeLabel'=>false,
							'value'=>function($model){
								return Html::a('<span class="glyphicon glyphicon-view" aria-hidden="true"></span> View', '/group/'.$model['group'], []);
							},
							'format'=>'html',
							'header'=>'',
						]
					]
				]);?>
			</div>
		</div>	
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">		
	</div>
</div>