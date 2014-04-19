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
        return Yii::$app->getModule("user")->viewPath
            ? rtrim(Yii::$app->getModule("user")->viewPath, "/\\") . DIRECTORY_SEPARATOR . $this->id
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
                    [
                        'actions' => ['handycap'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['reset'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Display index
     */
    public function actionIndex() {

        // display debug page if YII_DEBUG is set
        if (defined('YII_DEBUG') and YII_DEBUG) {
            $actions = Yii::$app->getModule("user")->getActions();
            return $this->render('index', ["actions" => $actions]);
        }
        // redirect to login page if user is guest
        elseif (Yii::$app->user->isGuest) {
            return $this->redirect(["/user/login"]);
        }
        // redirect to account page if user is logged in
        else {
            return $this->redirect(["/user/account"]);
        }
    }

}
