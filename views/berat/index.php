<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Berat;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BeratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Berat');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Berat'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
		'attribute' => 'tanggal',
		'footer' => '<b>Rata-rata</b>',
		'format'=>['date', 'php:Y-m-d'],
	    ],
           
	    [
		'attribute' => 'max',
		'footer' => Berat::getAvg($dataProvider, 'max'),
	    ],

            [
		'attribute' => 'min',
		'footer' => Berat::getAvg($dataProvider, 'min'),
	    ],

     	    [
       		'label' => 'Perbedeaan',
       		'value' => function ($model) {
          	    return $model->max - $model->min;
       		},
		'footer' => Berat::getPerbedeaanAvg($dataProvider),
     	    ],

            ['class' => 'yii\grid\ActionColumn'],
        ],

	'showFooter' => true,
    ]); ?>

    <?php Pjax::end(); ?>

</div>
