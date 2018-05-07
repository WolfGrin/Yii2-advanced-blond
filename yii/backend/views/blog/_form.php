<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'formatting' => ['p', 'blockquote', 'h1', 'h2'],
            'plugins' => [
                'clips',
                'fullscreen',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(common\models\Blog::getStatusList()) ?>

    <?= $form->field($model, 'sort')->textInput()->label("Сортировка") ?>



    <?php // Normal select with ActiveForm & model ?>
    <?php $test = \yii\helpers\ArrayHelper::map(\common\models\Tag::find()->all(), 'id', 'name'); ?>
    <?= $form->field($model, 'newtags')->widget(Select2::classname(), [
            'data' =>  \yii\helpers\ArrayHelper::map(\common\models\Tag::find()->all(), 'name', 'name'), // правильней получить данные в модели и передать сюда в $data
            'language' => 'ru',
            'options' => ['placeholder' => 'Выбрать tag...',  'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'maximumInputLenth' => 10,
            ],
        ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
