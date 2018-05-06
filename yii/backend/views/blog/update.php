<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = 'Update Blog: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="well">
        <?php //foreach($model->blogTags as $one): ?>
            <?= ''//$one->tag->name  ?>
        <?php //endforeach; ?>

        <?php foreach($model->tags as $one): ?>
            <?= $one->name  ?><br>
        <?php endforeach; ?>
    </div>

    <?php /*
    <pre><?php print_r($model->tags); // получаем объект через атрибут ?></pre>
    <pre><?php print_r($model->getTags()->asArray()->all()); // получаем массив через связь ?></pre>
    <pre><?php print_r(\yii\helpers\ArrayHelper::map($model->getTags()->asArray()->all(), 'id', 'name') ); // получаем массив через связь и нормализуем его ?></pre>
    */ ?>

</div>
