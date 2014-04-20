<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\Participation $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Participation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
