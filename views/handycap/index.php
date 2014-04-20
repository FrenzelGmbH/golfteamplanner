<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frenzelgmbh\golfteamplanner\models\HandycapSearch $searchModel
 */

$this->title = Yii::t('golfteamplanner', 'Manage Handycaps');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php yii\widgets\Block::begin(array('id'=>'sidebar')); ?>

    <?= $this->render('/default/sidemenu', []) ?>

<?php yii\widgets\Block::end(); ?>

<div class="workbench">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'user_id',
                'value'=>function ($model, $index, $widget) { 
                    return Html::a($model->user->username,  
                        '#', 
                        [
                            'title'=>'View author detail', 
                            'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
                        ]);
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter'=>\app\modules\app\components\User::pdUsers(), 
                'filterWidgetOptions'=>[
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'All Players'],
                'format'=>'raw'
            ],
            'hcp',
            'status',
            //'time_deleted:datetime',
            'time_create:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> HCP Overview</h3>',
            'type'=>'info',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
    ]); ?>

</div>
