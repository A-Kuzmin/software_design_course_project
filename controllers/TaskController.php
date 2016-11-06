<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\Models\Task;
use app\models\TaskForm;

class TaskController extends Controller
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
     * Displays tasks.
     *
     * @return string
     */
    public function actionIndex()
    {
        $collection = Task::find()->all();

        return $this->render('list', ['collection' => $collection]);
    }

    /**
     * Task edit page.
     *
     * @return string
     */
    public function actionNew()
    {

        $model = new TaskForm();

        $model->setProjectId(Yii::$app->request->getQueryParam('project_id'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('taskFormSaved');

            return $this->refresh();
        } elseif ($model->hasErrors()) {
            print_r($model->getErrors());
            print_r($model);
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * task edit page
     *
     * @return string
     */
    public function actionEdit()
    {
        $model = new TaskForm();
        $model->setProjectId(Yii::$app->request->getQueryParam('project_id'));
        $model->setId(Yii::$app->request->getQueryParam('id'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('taskFormSaved');

            return $this->refresh();
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * task view
     *
     * @return string
     */
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        if (null == $task = Task::findById($id)) {
            $task = new Task();
        }

        return $this->render('view', [
            'task' => $task,
        ]);
    }

}
