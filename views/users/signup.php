<?php

/** @var yii\web\View $this */
///** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

//use yii\bootstrap\ActiveForm;
use app\models\Region;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


$this->title = 'Логін';
?>
<div class="site-login">
    <div class="">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Будь ласка, заповніть наступні поля для входу:</p>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
