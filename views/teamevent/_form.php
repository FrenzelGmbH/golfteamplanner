<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;

use app\modules\workflow\models\Workflow;

/**
 * @TODO as the workflow is currently only available in the project, this needs to be singulized
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\Teamevent $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="teamevent-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model,'status')->dropDownList(Workflow::getStatusOptions()); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'date_start')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => Yii::t('golfteamplanner','Enter start date ...')],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]); 
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'time_start')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'date_end')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => Yii::t('golfteamplanner','Enter end date ...(optional)')],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]); 
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'time_end')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
