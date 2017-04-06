<?php

namespace backend\controllers;

use Yii;
use backend\models\Ventas;
use backend\models\VentasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VentasController implements the CRUD actions for Ventas model.
 */
class VentasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ventas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VentasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ventas model.
     * @param integer $id_p
     * @param integer $id_c
     * @param integer $id_u
     * @return mixed
     */
    public function actionView($id_p, $id_c, $id_u)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_p, $id_c, $id_u),
        ]);
    }

    /**
     * Creates a new Ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ventas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_p' => $model->id_p, 'id_c' => $model->id_c, 'id_u' => $model->id_u]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ventas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_p
     * @param integer $id_c
     * @param integer $id_u
     * @return mixed
     */
    public function actionUpdate($id_p, $id_c, $id_u)
    {
        $model = $this->findModel($id_p, $id_c, $id_u);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_p' => $model->id_p, 'id_c' => $model->id_c, 'id_u' => $model->id_u]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ventas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_p
     * @param integer $id_c
     * @param integer $id_u
     * @return mixed
     */
    public function actionDelete($id_p, $id_c, $id_u)
    {
        $this->findModel($id_p, $id_c, $id_u)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ventas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_p
     * @param integer $id_c
     * @param integer $id_u
     * @return Ventas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_p, $id_c, $id_u)
    {
        if (($model = Ventas::findOne(['id_p' => $id_p, 'id_c' => $id_c, 'id_u' => $id_u])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
