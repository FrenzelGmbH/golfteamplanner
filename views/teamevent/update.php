<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\Teamevent $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Teamevent',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teamevents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?php yii\widgets\Block::begin(array('id'=>'sidebar')); ?>

    <?= $this->render('/default/sidemenu', []) ?>

<?php yii\widgets\Block::end(); ?>

<div class="workbench">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
