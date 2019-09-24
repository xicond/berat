<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Berat */

$this->title = Yii::t('app', 'Create Berat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
