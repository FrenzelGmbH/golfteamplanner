<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\Handycap $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="handycap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'time_deleted')->textInput() ?>

    <?= $form->field($model, 'time_create')->textInput() ?>

    <?= $form->field($model, 'hcp')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
