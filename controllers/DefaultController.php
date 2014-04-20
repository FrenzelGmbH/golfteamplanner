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
                        'actions' => ['index','jsonuserlist'],
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

    /**
     * [actionJsonlist description]
     * @param  [type] $search Text for the lookuk
     * @return [type]         [description]
     */
    public function actionJsonuserlist($search = NULL,$id = NULL)
    {
        header('Content-type: application/json');
        $clean['more'] = false;

        $query = new Query;
        if(!is_Null($search))
        {
          $mainQuery = $query->select('id, username AS text')
            ->from('tbl_user')
            ->where('UPPER(username) LIKE "%'.strtoupper($search).'%"');

          $command = $mainQuery->createCommand();
          $rows = $command->queryAll();
          $clean['results'] = array_values($rows);
        }
        else
        {     
          if(!is_null($id))
          {
            $clean['results'] = ['id'=> $id,'text' => Contact::findOne($id)->contactName];
          }else
          {
            $clean['results'] = ['id'=> 0,'text' => 'None found'];
          }
        }
        echo Json::encode($clean);
        exit();
    }

}
