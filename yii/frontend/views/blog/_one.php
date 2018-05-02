<?php
/* @var $model common\models\Blog */
?>

<div class="col-lg-12">
    <h2><?= $model->title ?></h2>
    <p><?= $model->text ?></p>
    <?= \yii\bootstrap\Html::a('подробнее', ['blog/one', 'url' => $model->url], ['class' => 'btn btn-success']) ?>
</div>
