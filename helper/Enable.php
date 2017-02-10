<?php 
namespace app\helper;

class Enable
{
    public static function getOptions()
    {
        return [
            0 => 'Disable',
            1 => 'Enable',
        ];
    }

    public static function getLabel($val)
    {
        $data = static::getOptions();
        return isset($data[$val]) ? $data[$val] : '---';
    }
}