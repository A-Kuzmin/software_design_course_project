<?php 
namespace app\helper;

class Project
{
    public static function getAllProjects()
    {
       return \app\models\Project::find()->all();
    }
    
    public static function getOptions()
    {
        $options = [];
        foreach (static::getAllProjects() as $project) {
            $options[$project->id] = $project->id . ": " . $project->title;
        }

        return $options;
    }
}