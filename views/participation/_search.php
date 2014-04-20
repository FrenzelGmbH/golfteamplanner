<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\ParticipationSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="participation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'teamevent_id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'time_deleted') ?>

    <?php // echo $form->field($model, 'time_create') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
