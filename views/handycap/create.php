<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\Handycap $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Handycap',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Handycaps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="handycap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
