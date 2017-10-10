<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Visitors */

$this->title = '欢迎您 ' . $model->user_name . ' 来访 ' . Yii::$app->params['companyName'];
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitors-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'employee_id',
                'value'=> $model->employee->name,
            ],
            'user_name',
            'id_card',
            'company',
            'num',
            [
                'attribute'=>'type',
                'value'=> $model->getTypeList($model->type),
            ],
//            'email:email',
            'telephone',
//            [
//                'attribute'=>'二维码',
//                'format'=>'raw',
//
//                'value'=> "<img src='" .  \yii::$app->request->hostInfo . \yii\helpers\Url::to(['visitors/qrcode']) . "' />",
//            ],
            [
                'attribute'=>'info',
                'label' => '备注',
            ],
//            'created_at',
//            'updated_at',
//            'is_send_email:email',
//            'is_send_mobile',
        ],
    ]) ?>

</div>
<!--
<?= Html::button('打印', ['class' => 'btn btn-primary', 'onclick'=>'window.print()']) ?>
-->