<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Visitors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
//    $employeesNameList = \common\models\Employees::getName();
////    ecommerce\common\helpers\ArrayHelper::merge(['0'=>'总店'];
//    $employeesNameList = \yii\helpers\ArrayHelper::merge(['' => '请选择'], $employeesNameList);
//    echo $form->field($model, 'employee_id')->widget(Select2::classname(), [
//        'data' => $employeesNameList,
//        'options' => ['placeholder' => '请选择来访接待人'],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//
//    ]);

    $url = \yii\helpers\Url::to(['employees-list']);

    $employeeName = empty($model->city) ? '' : \common\models\Employees::findOne($model->employee_id)->name;

    echo $form->field($model, 'employee_id')->widget(Select2::classname(), [
        'initValueText' => $employeeName, // set the initial display text
        'options' => ['placeholder' => '查找 ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 2,
            'language' => [
                'errorLoading' => new JsExpression("function () { return '查找中...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(city) { return city.text; }'),
            'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        ],

    ]);
    ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num')->textInput(['value'=>1]) ?>

    <?= $form->field($model, 'type')->dropDownList(\common\models\Visitors::getTypeList(),['class'=>'form-control select2','widthclass'=>'c-md-2']) ?>

    <?php /*?>
    <?= $form->field($model, 'location_id')->hiddenInput(['value' => 1]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php */?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textInput(['maxlength' => true])->label('备注') ?>

    <?php /*?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'is_send_email')->textInput() ?>

    <?= $form->field($model, 'is_send_mobile')->textInput() ?>
    <?php */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '确定' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
