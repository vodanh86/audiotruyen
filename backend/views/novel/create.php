<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Novel */

$this->title = 'Create Novel';
$this->params['breadcrumbs'][] = ['label' => 'Novels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
