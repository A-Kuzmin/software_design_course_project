<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * TaskForm is the model behind the login form.
 *
 * @property Task|null $_task This property is read-only.
 *
 */
class TaskForm extends Model
{
    public $id;
    public $project_id;
    public $title;
    public $description;
    public $status;
    protected $_created_at;
    protected $_updated_at;
    protected $_task = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
        ];
    }

    public function setId($id)
    {
        $this->_task = false;
        $this->id = $id;
        $task = $this->getTask();
        $this->setAttributes($task->toArray());
    }

    public function setProjectId($id)
    {
        $this->project_id = $id;
    }

    /**
     * Finds task by [[id]]
     *
     * @return Task|null
     */
    public function getTask()
    {
        if ($this->_task === false) {
            if ($this->id) {
                $this->_task = Task::findById($this->id);
            } else {
                $this->_task = new Task();
            }
        }

        return $this->_task;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function save()
    {
        if ($this->validate()) {
            $task = $this->getTask();
            $task->title = $this->title;
            $task->description = $this->description;
            $task->project_id = $this->project_id;
            return $task->save();
        }
        return false;
    }
}
