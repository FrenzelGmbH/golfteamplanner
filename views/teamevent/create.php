<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\golfteamplanner\golfteamplanner\models\Teamevent $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Teamevent',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teamevents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamevent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
