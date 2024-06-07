<?php

namespace app\controllers;

use app\models\Myassets;
use app\models\IssueAssetViewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IssueAssetViewController implements the CRUD actions for Myassets model.
 */
class IssueAssetViewController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Myassets models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IssueAssetViewSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Myassets model.
     * @param string $serialno Serialno
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($serialno)
    {
        return $this->render('view', [
            'model' => $this->findModel($serialno),
        ]);
    }

    /**
     * Creates a new Myassets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Myassets();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'serialno' => $model->serialno]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Myassets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $serialno Serialno
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($serialno)
    {
        $model = $this->findModel($serialno);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'serialno' => $model->serialno]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Myassets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $serialno Serialno
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($serialno)
    {
        $this->findModel($serialno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Myassets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $serialno Serialno
     * @return Myassets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($serialno)
    {
        if (($model = Myassets::findOne(['serialno' => $serialno])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
