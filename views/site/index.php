<?php

/** @var yii\web\View $this */

use app\models\Theme;
use http\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return \yii\helpers\Html::a($data->name, '/basic/theme/view?id='.$data->id);
                },
            ],
            'text:ntext',
            [
                'attribute' => 'answer',
                'value' => function ($data) {
                    return count($data->answers);
                },
            ],
            [
                'attribute' => 'date',
                'format' => ['date', 'php:d-m-y h:i:s']
            ],
            //'user_id',
        ],
    ]); ?>

    </div>
</div>
