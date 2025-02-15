<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Create Club' : 'Update Club';
$this->params['breadcrumbs'][] = ['label' => 'Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="club-form">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 mt-2">
            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
        </div>

        <div class="form-group mt-3">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
