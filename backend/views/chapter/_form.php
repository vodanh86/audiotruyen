<?php

use yii\helpers\Html;
use app\models\Novel;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chapter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= 
    $form->field($model, 'novel_id')
    ->dropDownList(
           ArrayHelper::map(Novel::find()->asArray()->all(), 'id', 'name')
           )
    ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
