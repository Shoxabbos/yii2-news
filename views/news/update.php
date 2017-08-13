<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\news\News */

$this->title = 'Update News: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="news-update">
    <h3 class="box-title"> <?=$this->title?> </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
