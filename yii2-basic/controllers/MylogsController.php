<?php

namespace app\controllers;
use app\models\Mylogs;
use app\models\IssueAsset;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class MylogsController extends \yii\web\Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['recall','repair','issue','dispose'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index','recall','repair','issue','dispose'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];

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

    public function actionUpdate($serialno)
    {
        $model = $this->findModel($serialno);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['issue', 'serialno' => $model->serialno]);
        }

        return $this->render('issue', [
            'model' => $model,
        ]);
    }




    public function actionIssue()
    {
        $model = new Mylogs(); 
        
        if ($model->load($this->request->post())) 
        { 
            if ($model->validate()) 
            { 
                // form inputs are valid, do something here return;
                $model -> save(); 
                return $this->redirect(['/issue-asset/index']);
            } 
        } 

        return $this->render('issue', [ 'model' => $model, ]);
    }

    public function actionRecall()
    {
        $model = new Mylogs(); 
        
        if ($model->load($this->request->post())) 
        { 
            if ($model->validate()) 
            { 
                // form inputs are valid, do something here return;
                $model -> save(); 
                return $this->redirect(['/asset-register/index']); 
            } 
        } 

        return $this->render('recall', [ 'model' => $model, ]);
    }

    public function actionDispose()
    {
        $model = new Mylogs(); 
        
        if ($model->load($this->request->post())) 
        { 
            if ($model->validate()) 
            { 
                // form inputs are valid, do something here return; 
                $model -> save(); 
                return $this->redirect(['/dispose/index']);
            } 
        } 

        return $this->render('dispose', [ 'model' => $model, ]);
    }

    public function actionRepair()
    {
        $model = new Mylogs(); 
        
        if ($model->load($this->request->post())) 
        { 
            if ($model->validate()) 
            { 
                // form inputs are valid, do something here return; 
            } 
        } 

        return $this->render('repair', [ 'model' => $model, ]);
    }

    protected function findModel($serialno)
    {
        if (($model = Mylogs::findOne(['serialno' => $serialno])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
