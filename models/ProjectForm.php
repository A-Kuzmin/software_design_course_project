<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ProjectForm is the model behind the login form.
 *
 * @property Project|null $_project This property is read-only.
 *
 */
class ProjectForm extends Model
{
    public $id;
    public $title;
    public $description;
    public $status;
    protected $_created_at;
    protected $_updated_at;
    protected $_project = false;


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
        $this->_project = false;
        $this->id = $id;
        $project = $this->getProject();
        $this->setAttributes($project->toArray());
    }

    /**
     * Finds project by [[id]]
     *
     * @return Project|null
     */
    public function getProject()
    {
        if ($this->_project === false) {
            if ($this->id) {
                $this->_project = Project::findById($this->id);
            } else {
                $this->_project = new Project();
            }
        }

        return $this->_project;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function save()
    {
        if ($this->validate()) {
            $project = $this->getProject();
            $project->title = $this->title;
            $project->description = $this->description;
            return $project->save();
        }
        return false;
    }
}
