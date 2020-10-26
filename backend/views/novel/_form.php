<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Author;
use app\models\Category;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Novel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="novel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'feature_image')->textInput(['maxlength' => true]) ?>
    <?= 
    $form->field($model, 'author_id')
    ->dropDownList(
           ArrayHelper::map(Author::find()->asArray()->all(), 'id', 'name')
           )
    ?>
        <?= 
    $form->field($model, 'category_id')
    ->dropDownList(
           ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name')
           )
    ?>

    <?= $form->field($model, 'view')->textInput() ?>

    <?= 
    $form->field($model, 'rating')
    ->dropDownList(
        array(1 =>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5'),
        ['prompt'=>'1']    // options
    );
    ?>

    <?= 
    $form->field($model, 'type')
    ->dropDownList(
        array(0 =>'Chữ', 1=>'Audio', 2=>'Video'),
        ['prompt'=>'Chữ']    // options
    );
    ?>

    <?= 
    $form->field($model, 'new')
    ->dropDownList(
        array(0 =>'Không', 1=>'Mới'),
        ['prompt'=>'Chọn']    // options
    );
    ?>
    <?= 
    $form->field($model, 'recommend')
    ->dropDownList(
        array(0 =>'Không', 1=>'Recommend'),
        ['prompt'=>'Chọn']    // options
    );
    ?>
        <?= 
    $form->field($model, 'feature')
    ->dropDownList(
        array(0 =>'Không', 1=>'Feature'),
        ['prompt'=>'Chọn']    // options
    );
    ?>
    <?= 
    $form->field($model, 'status')
    ->dropDownList(
        array(0 =>'Chưa hoàn thành', 1=>'Hoàn thành', 2=>'Tạm dừng'),
        ['prompt'=>'Chưa hoàn thành']    // options
    );
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
