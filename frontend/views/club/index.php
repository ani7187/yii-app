<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Clubs';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="mb-3"><?= Html::encode($this->title) ?></h1>

<div class="mb-3">
    <?= Html::a('Create Club', ['create'], ['class' => 'btn btn-success']) ?>
</div>

<?php Pjax::begin(['id' => 'club-grid']); ?>

<?= $this->render('_search', ['searchModel' => $searchModel]) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => ['class' => 'table table-striped table-bordered'],
    'pager' => [
        'options' => ['class' => 'pagination justify-content-end'],
        'linkOptions' => ['class' => 'page-link'],
        'activePageCssClass' => 'active',
        'disabledPageCssClass' => 'disabled',
        'prevPageCssClass' => 'page-item',
        'nextPageCssClass' => 'page-item',
        'firstPageCssClass' => 'page-item',
        'lastPageCssClass' => 'page-item',
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'address',
        [
            'attribute' => 'created_at',
            'format' => ['datetime', 'php:Y-m-d H:i:s'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'visible' => !$searchModel->archived,
        ],
    ],
]);
?>

<?php Pjax::end(); ?>
