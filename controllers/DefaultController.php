<?php

namespace frenzelgmbh\golfteamplanner\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;

/**
 * Default controller for User module
 */
class DefaultController extends Controller 
{
     /**
       * [init description]
       * @return [type] [description]
       */
      public function init()
      {
        parent::init();

        if (isset($_POST['_lang']))
        {
            Yii::$app->language = $_POST['_lang'];
            Yii::$app->session['_lang'] = Yii::$app->language;
        }
        else if (isset(Yii::$app->session['_lang']))
        {
            Yii::$app->language = Yii::$app->session['_lang'];
        } 
      }

    /**
     * Setting the default layout to 2 columns
     * @var string layout to be used within this controller
     */
    public $layout = 'column2';
    
    /**
     * Get view path based on module property
     * @return string
     */
    public function getViewPath() {
      return Yii::$app->getModule("golfteamplanner")->viewPath
        ? rtrim(Yii::$app->getModule("golfteamplanner")->viewPath, "/\\") . DIRECTORY_SEPARATOR . $this->id
        : parent::getViewPath();
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Display index
     */
    public function actionIndex() 
    {
      return $this->render('index',[]);
    }

}
