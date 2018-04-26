<?php
/* @var $this yii\web\View */
/* @var $blogs \common\models\Blog */

?>

<div class="body-content">

    <div class="row">
        <?php foreach($blogs as $one): ?>
            <div class="col-lg-12">
                <h2><?= $one->title ?></h2>
                <p><?= $one->text ?></p>
                <?= \yii\bootstrap\Html::a('подробнее', ['blog/one', 'url' => $one->url], ['class' => 'btn btn-success']) ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>
