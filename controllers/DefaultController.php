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
class DefaultController extends Controller {

    /**
     * Get view path based on module property
     *
     * @return string
     */
    public function getViewPath() {
        return Yii::$app->get("golfteamplanner")->viewPath
            ? rtrim(Yii::$app->get("golfteamplanner")->viewPath, "/\\") . DIRECTORY_SEPARATOR . $this->id
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
