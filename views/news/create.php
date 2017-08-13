<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model shoxabbos\news\models\News */

$this->title = 'Create News';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-create">
    <h3 class="box-title"> <?=$this->title?> </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
