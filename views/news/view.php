<?php

use shoxabbos\imagecrop\CropWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\news\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> <?=$this->title?> </h3>

        <div class="box-tools pull-right">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-link']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-link',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'content:ntext',
                [
                    'attribute' => 'photo',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img(Yii::getAlias('@web')."/".$model->photo, ['class' => 'view-image']);
                    }
                ],
                'views',
                'date',
            ],
        ]) ?>
    </div>
</div>

<style>
.view-image {
    max-width: 100%;
}
</style>