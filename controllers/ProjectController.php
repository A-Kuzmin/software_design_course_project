<?php

namespace app\controllers;

use app\models\ProjectForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\Models\Project;

class ProjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','view', 'new', 'edit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays projects.
     *
     * @return string
     */
    public function actionIndex()
    {
        $collection = Project::find()->all();

        return $this->render('list', ['collection' => $collection]);
    }

    /**
     * project edit page.
     *
     * @return string
     */
    public function actionNew()
    {

        $model = new ProjectForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('projectFormSaved');

            return $this->refresh();
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * project edit page
     *
     * @return string
     */
    public function actionEdit()
    {
        $model = new ProjectForm();
        $model->setId(Yii::$app->request->getQueryParam('id'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('projectFormSaved');

            return $this->refresh();
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * project view
     *
     * @return string
     */
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        if (null == $project = Project::findById($id)) {
            $project = new Project();
        }

        return $this->render('view', [
            'project' => $project,
        ]);
    }

}
