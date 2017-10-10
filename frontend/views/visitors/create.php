<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Visitors */

$this->title = '欢迎来访' . Yii::$app->params['companyName'];
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
