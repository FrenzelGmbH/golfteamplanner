<?php

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */

?>

<?php yii\widgets\Block::begin(array('id'=>'sidebar')); ?>

    <?= $this->render('/default/sidemenu', []) ?>

<?php yii\widgets\Block::end(); ?>

<div class="workbench">
    <h1 class="page-header"><?= $this->context->module->id ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "" module.
    </p>
    
    <h3>Neueste Änderungen</h3>
    <iframe 
        src="http://tylerlh.github.com/github-latest-commits-widget/?username=frenzelgmbh&repo=golfteamplanner&limit=10"
        allowtransparency="true" 
        frameborder="0" 
        scrolling="no" 
        width="100%" 
        height="300px">
    </iframe>

</div>
