<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="mb-3"><?= Html::encode($this->title) ?></h1>

<div class="mb-3">
    <?= Html::a('Create client', ['create'], ['class' => 'btn btn-success']) ?>
</div>

<?php Pjax::begin(['id' => 'client-grid']); ?>

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
        'full_name',
        'gender',
        [
            'attribute' => 'birth_date',
            'format' => ['date', 'php:Y-m-d'],
        ],
        [
            'attribute' => 'created_at',
            'format' => ['datetime', 'php:Y-m-d H:i:s'],
        ],
        [
            'label' => 'Available Clubs',
            'value' => function ($model) {
                return implode(', ', ArrayHelper::getColumn($model->clubs, 'name'));
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ],
]);
?>

<?php Pjax::end(); ?>
