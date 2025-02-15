<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="card shadow-sm p-3 mb-4">
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['club/index'],
        'options' => ['data-pjax' => true],
    ]); ?>

    <div class="row g-2 align-items-center">
        <div class="col-md-4">
            <?= $form->field($searchModel, 'name')->textInput(['placeholder' => 'Enter club name'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($searchModel, 'archived')->checkbox()->label(false) ?>
        </div>
        <div class="col-md-6 text-end">  <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Reset', ['club/index'], ['class' => 'btn btn-outline-secondary', 'data-pjax' => 1]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
