<?php

use zxbodya\yii2\tinymce\TinyMce;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shoxabbos\news\models\News */
/* @var $form yii\widgets\ActiveForm */

\shoxabbos\news\NewsAsset::register($this);
$this->registerJs("tinymce.init({ selector:'textarea' });");
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 10])?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'photo')->fileInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'views')->textInput() ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
