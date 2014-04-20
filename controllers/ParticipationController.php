<?php

namespace frenzelgmbh\golfteamplanner\controllers;

use Yii;
use frenzelgmbh\golfteamplanner\models\Participation;
use frenzelgmbh\golfteamplanner\models\ParticipationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipationController implements the CRUD actions for Participation model.
 */
class ParticipationController extends Controller
{
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
     * Lists all Participation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = \Yii::$app->getModule("golfteamplanner")->mainLayout;

        $searchModel = new ParticipationSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Participation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = \Yii::$app->getModule("golfteamplanner")->mainLayout;

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Participation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = \Yii::$app->getModule("golfteamplanner")->mainLayout;

        $model = new Participation;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Participation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = \Yii::$app->getModule("golfteamplanner")->mainLayout;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Participation model.
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
     * Finds the Participation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Participation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Participation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
