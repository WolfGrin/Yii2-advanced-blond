<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\controllers\BlogController */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',

            //'text:ntext',

            //'url:url',
            ['attribute' => 'url', 'format' => 'url', 'headerOptions' => ['class' => 'url-title']], //url, text, raw - html текст с тегами

            //['attribute' => 'status_id', 'filter' => ['off', 'on'], 'label' => 'link'],
            //['attribute' => 'status_id', 'filter' => ['off', 'on'], 'value' => function(){ return 123; }],
            [
                'attribute' => 'status_id',
//                'filter' => ['off', 'on'],
                'filter' => \common\models\Blog::getStatusList(),

//                'value' => function($model){
//                    if($model->status_id == 1)
//                        return 'on';
//                    else
//                        return 'off';
//                }

//                'value' => function($model){
//                    return $model->statusName;
//                }

                'value' => 'statusName'
            ],
            'sort',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {check}',
                'buttons' => [
//                    'update' => function ($url, $model, $key) {
//                        return Html::a('Update', $url);
//                    },
                    'check' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-check"></i>', $url);
                    },
                ],
                'visibleButtons' => [
                    'check' => function($model , $key, $index) {
                        return ($model->status_id == 0)? false : true;
                    }
                ],
            ],
            ['attribute' => 'tags', 'value' => 'tagsAsString'],
        ],
    ]); ?>


    <?php Pjax::end(); ?>
</div>
