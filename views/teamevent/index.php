<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frenzelgmbh\golfteamplanner\models\TeameventSearch $searchModel
 */

$this->title = Yii::t('app', 'Teamevents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamevent-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Teamevent',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'time_start',
            'time_end',
            'date_start',
            // 'date_end',
            // 'status',
            // 'time_deleted:datetime',
            // 'time_create:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
