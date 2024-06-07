<?php

namespace app\controllers;
use app\models\Mylogs;
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




    public function actionIssue()
    {
        $model = new Mylogs(); 
        
        if ($model->load($this->request->post())) 
        { 
            if ($model->validate()) 
            { 
                // form inputs are valid, do something here return;
                $model -> save(); 
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

}
