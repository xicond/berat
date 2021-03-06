<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Berat */

$this->title = $model->tanggal;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berat-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->tanggal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->tanggal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
		'attribute' => 'tanggal',
		'format' => ['date', 'php:Y-m-d'],
	    ],
            'max',
            'min',
	    [
		'label' => 'Perbedeaan',
		'value' => $model->max - $model->min,
	    ],
        ],
    ]) ?>

</div>
