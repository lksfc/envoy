<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $columns = [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'employee_id',
                'value'=> function($model){return $model->employee->name;},
            ],
            [
                'attribute'=>'location_id',
                'value'=> function($model){return \common\models\Visitors::getLocationList($model->location_id);},
            ],
            [
                'attribute'=>'user_name',
                'label'=>'访客姓名',
            ],
            [
                'attribute'=>'id_card',
                'width'=>'5%',
            ],
             'company',
             'num',
            [
                'attribute'=>'type',
                'value'=> function($model){return \common\models\Visitors::getTypeList($model->type);},
            ],
            // 'email:email',
             'telephone',
             'info',
            [
                'attribute'=>'created_at',
                'label'=>'来访时间',
            ],
            // 'updated_at',
//             'is_send_email:email',
            // 'is_send_mobile',

            [
                'class' => yii\grid\ActionColumn::className(),
                'header' => '操作',
                'template' => '{view}{delete}',
            ]
        ];


    echo GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider'=>$dataProvider,
        'filterModel'=> '',
        'columns'=>$columns,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar'=> [
            ['content'=>
//                 Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['type'=>'button', 'title'=>Yii::t('yii', 'create'), 'class'=>'btn btn-success']) .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('yii', 'Reset Grid')])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export'=>[
            'fontAwesome'=>true
        ],
        // parameters from the demo form
        'bordered'=>'',//$bordered,
        'striped'=>'',//$striped,
        'condensed'=>'',//$condensed,
        'responsive'=>'',//$responsive,
        'hover'=>true,//$hover,
        'showPageSummary'=>'',//$pageSummary,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'',//$heading,
        ],
        'persistResize'=>false,
        'exportConfig'=>'',//$exportConfig,
    ]);

    ?>
</div>
