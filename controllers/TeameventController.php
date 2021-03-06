<?php

namespace frenzelgmbh\golfteamplanner\controllers;

use Yii;
use frenzelgmbh\golfteamplanner\models\Teamevent;
use frenzelgmbh\golfteamplanner\models\TeameventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeameventController implements the CRUD actions for Teamevent model.
 */
class TeameventController extends Controller
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

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Teamevent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeameventSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Teamevent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Teamevent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teamevent;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); //, 'id' => $model->id
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Teamevent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); //, 'id' => $model->id
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Teamevent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teamevent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teamevent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teamevent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
