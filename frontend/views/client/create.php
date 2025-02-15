<?php

use frontend\models\Club\Club;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Client';
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="client-create">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter Full Name'])->label('Full name') ?>
        </div>
        <div class="col-md-6 mt-2">
            <?= $form->field($model, 'gender')->radioList(['male' => 'Male', 'female' => 'Female']) ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Select Date of Birth'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ],
            ])->label('Birth date') ?>
        </div>
        <div class="col-md-4 mt-2">
            <?= $form->field($model, 'clubs')->widget(Select2::class, [
                'data' => ArrayHelper::map(Club::find()->all(), 'id', 'name'),
                'options' => [
                    'placeholder' => 'Select a Club',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
