<?php 
namespace app\helper;

class YesNo
{
    public static function getOptions()
    {
        return [
            0 => 'No',
            1 => 'Yes',
        ];
    }
}