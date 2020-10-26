<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NovelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Novels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Novel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'description',
            //'image',
            [
                'label'=>'Author',
                'format'=>'raw',
                'value'=>function($data) use($author)
                {
                    return $author[$data->author_id]->name;
                }
            ],
            [
                'label'=>'Category',
                'format'=>'raw',
                'value'=>function($data) use($category)
                {
                    return $category[$data->category_id]->name;
                }
            ],
            //'view',
            //'rating',
            'type',
            'new',
            'recommend',
            'feature',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
