<?php

use app\models\Region;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->dropDownList(
        ArrayHelper::map(Region::find()->where(['type' => 1])->all(), 'id', 'name'),
        [
            'id' => 'region-id',
            'prompt' => [
                'text' => 'Виберіть регіон',
                'options'=> ['disabled' => true, 'selected' => true],
            ]
        ]
    ) ?>

    <?= $form->field($model, 'city_id')->label('Місто')->widget(DepDrop::classname(), [
        'options' => ['id' => 'city-id'],
        'data' => ArrayHelper::map(Region::getCityList($model->city->parent_id), 'id', 'name'),
        'pluginOptions' => [
            'depends' => ['region-id'],
            'placeholder' => 'Виберіть місто',
            'loadingText' => 'Завантаження міст',
            'url' => Url::to(['users/get-cities']),
        ]
    ]); ?>

    <?= $form->field($model, 'street_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_number')->textInput() ?>

    <?= $form->field($model, 'apartment_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



