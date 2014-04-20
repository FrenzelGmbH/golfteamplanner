<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\SideNav;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frenzelgmbh\golfteamplanner\models\HandycapSearch $searchModel
 */

$this->title = Yii::t('app', 'Manage Handycaps');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php yii\widgets\Block::begin(array('id'=>'sidebar')); ?>

    <?php 

    $sideMenu = array();
    $sideMenu[] = array('icon'=>'home','label'=>Yii::t('app','Home'),'url'=>Url::to(array('/site/index')));
    $sideMenu[] = array('icon'=>'plus','label'=>Yii::t('app','New Teamevent'),'url'=>Url::to(array('/golfteamplanner/teamevent/create')));
    $sideMenu[] = array('icon'=>'arrow-right','label'=>Yii::t('app','Manage Players'),'url'=>Url::to(array('/categories/categories/index')));
    
    echo SideNav::widget([
      'type' => SideNav::TYPE_DEFAULT,
      'heading' => 'Golfteamplanner',
      'items' => $sideMenu
    ]);

  ?>

<?php yii\widgets\Block::end(); ?>

<div class="workbench">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'author_id',
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
