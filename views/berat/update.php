<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Berat */

$this->title = Yii::t('app', 'Update Berat: {name}', [
    'name' => $model->tanggal,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tanggal, 'url' => ['view', 'id' => $model->tanggal]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="berat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
