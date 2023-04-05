<?php

use app\models\Region;
use app\models\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Користувачі';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'full_name',
            'login',
            'phone_number',
            [
                'label' => 'Домашня адреса',
                'attribute' => 'address',
                'value' =>  function ($model) {
                    return $model->address;
                },
            ],
//            'city',
//            'street_name',
//            'house_number',
//            'apartment_number',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                    return Url::toRoute(['update', 'id' => $model->id]);
                 }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ]
        ],
    ]); ?>


</div>
