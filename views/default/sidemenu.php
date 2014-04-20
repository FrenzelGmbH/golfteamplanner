<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\widgets\SideNav;

/**
 * @var yii\web\View $this
 */

?>

<?php 

    $sideMenu = array();
    $sideMenu[] = array('icon'=>'home','label'=>Yii::t('golfteamplanner','Home'),'url'=>Url::to(array('/golfteamplanner/default/index')));

    $sideMenu[] = array('icon'=>'user','label'=>Yii::t('golfteamplanner','Manage Players'),'url'=>Url::to(array('/user/admin')));

    $subaMenu[] = array('icon'=>'list','label'=>Yii::t('golfteamplanner','Handycap Overview'),'url'=>Url::to(array('/golfteamplanner/handycap/index')));
    $subaMenu[] = array('icon'=>'plus','label'=>Yii::t('golfteamplanner','New Handycap'),'url'=>Url::to(array('/golfteamplanner/handycap/create')));
    $sideMenu[] = array('icon'=>'dashboard','label'=>Yii::t('golfteamplanner','Handycaps'),'url'=>'#','items'=>$subaMenu);

    $subMenu[] = array('icon'=>'list','label'=>Yii::t('golfteamplanner','Team-Event Overview'),'url'=>Url::to(array('/golfteamplanner/teamevent/index')));
    $subMenu[] = array('icon'=>'plus','label'=>Yii::t('golfteamplanner','New Team-Event'),'url'=>Url::to(array('/golfteamplanner/teamevent/create')));
    $sideMenu[] = array('icon'=>'dashboard','label'=>Yii::t('golfteamplanner','Events'),'url'=>'#','items'=>$subMenu);
    
    echo SideNav::widget([
      'type' => SideNav::TYPE_DEFAULT,
      'heading' => 'Golfteamplanner',
      'items' => $sideMenu
    ]);

  ?>