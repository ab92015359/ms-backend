<?php
namespace backend\utils;

use Yii;

class LogUtil
{

    public static function info($data, $target = "myfm")
    {
        Yii::info($data, $target);
    }

    public static function warn($data, $target = "myfm")
    {
        Yii::warning($data, $target);
    }

    public static function error($data, $target = "myfm")
    {
        Yii::error($data, $target);
    }

    public static function debug($data, $target = "myfm")
    {
        Yii::error($data, $target);
    }
}
