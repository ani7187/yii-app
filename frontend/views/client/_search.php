<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

?>
<div class="card shadow-sm p-3 mb-4">
    <?php

    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['client/index'],
        'options' => ['data-pjax' => true],
    ]); ?>

    <div class="row g-2 align-items-center">
        <div class="col-md-3">
            <?= $form->field($searchModel, 'full_name')->textInput(['placeholder' => 'Enter name'])->label('Full Name') ?>
        </div>

        <div class="col-md-4">
<!--            <label class="control-label">Select Date Range</label>-->
            <?= $form->field($searchModel, 'birth_date_range')->widget(DateRangePicker::classname(), [
                'convertFormat' => true,
                'pluginOptions' => [
                    'timePicker' => false,
                    'locale' => ['format' => 'Y-m-d'],
                ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($searchModel, 'gender')->radioList([
                'male' => 'Male',
                'female' => 'Female',
            ])->label('Gender') ?>
        </div>

        <div class="col-md-3 text-end">
            <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Reset', ['client/index'], ['class' => 'btn btn-outline-secondary', 'data-pjax' => 1]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
