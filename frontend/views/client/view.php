<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'View Client';
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="club-view">
    <div class="card">
        <div class="card-header">
            <h1><?= Html::encode($model->full_name) ?></h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Full name:</strong> <?= Html::encode($model->full_name) ?></p>
                    <p><strong>Gender:</strong> <?= Html::encode($model->gender) ?></p>
                    <p><strong>Birth date:</strong> <?= Html::encode($model->birth_date) ?></p>
                    <p><strong>Clubs:</strong> <?= Html::encode(implode(', ', ArrayHelper::getColumn($model->clubs, 'name'))) ?></p>
                    <p><strong>Created At:</strong> <?= Yii::$app->formatter->asDatetime($model->created_at) ?></p>
                    <p><strong>Created By:</strong> <?= Html::encode($model->createdBy->username) ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
