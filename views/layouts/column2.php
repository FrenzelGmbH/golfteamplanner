<?php $this->beginContent('@app/views/layouts/'.\Yii::$app->getModule("golfteamplanner")->mainLayout.'.php'); ?>
<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">          
      <?= $this->blocks['sidebar']; ?>
  </div>      
</nav>

<div id="page-wrapper">
    <?= $content; ?>
</div>
<!-- /#page-wrapper -->

<?php $this->endContent(); ?>
