<?php

use app\models\Theme;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Themes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Theme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'text:ntext',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusText();
                },
            ],
            [
                'attribute' => 'date',
                'format' => ['date', 'php:d-m-y h:i:s']
            ],
            [
                'attribute' => 'admin',
                'format' => 'html' ,
                'value' => function ($data) {
                    switch ($data->status){
                        case 1: return Html::a('Approve' , 'approve/?id='.$data->id)
                            . " | " . Html::a('Reject' , 'reject/?id='.$data->id);
                        case 2: return Html::a('Reject' , 'reject/?id='.$data->id);
                        case 3: return Html::a('Approve' , 'approve/?id='.$data->id);
                    }
                },
            ],
            //'user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Theme $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
