<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\web\JsExpression;

use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\golfteamplanner\models\Handycap $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="handycap-form">

    <?php $form = ActiveForm::begin(); ?>

<?php
$dataExp = <<< SCRIPT
  function (term, page) {
    return {
      search: term, // search term
    };
  }
SCRIPT;

$dataResults = <<< SCRIPT
  function (data, page) {
    return {
      results: data.results
    };
  }
SCRIPT;

$url = Url::to(['/golfteamplanner/default/jsonuserlist']);

$fInitSelection = <<< SCRIPT
  function (element, callback) {
    var id=$(element).val();
    if (id!=="") {
      $.ajax("$url&id="+id, {
        dataType: "json"
      }).done(function(data) { callback(data.results); });
    }
  }
SCRIPT;
?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(),[
          'options' => ['placeholder' => \Yii::t('golfteamplanner','Select player ...')],
          'pluginOptions'=>[
            'minimumInputLength' => 3,
            'ajax' => [
              'url' => $url,
              'dataType' => 'json',
              'data' => new JsExpression($dataExp),
              'results' => new JsExpression($dataResults),
            ],
            'initSelection' => new JsExpression($fInitSelection)
          ]
    ]); ?>

    <?= $form->field($model, 'time_deleted')->textInput() ?>

    <?= $form->field($model, 'time_create')->textInput() ?>

    <?= $form->field($model, 'hcp')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
