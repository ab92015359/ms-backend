<?php
namespace backend\utils;

use Yii;

/**
 * This is class file for class ResponseUtil
 * It contains all response methods
 *
 * @author Abel Li
 **/

class ResponseUtil
{
    public static function error($action, $errorCode, $errorMessage, $errorDetail, $target = "atb")
    {
        LogUtil::error([
            'action' => $action,
            'message' => $errorMessage,
            'data' => $errorDetail
        ], $target);
        return [
            'result' => 'fail',
            'data' => [
                'errorCode' => $errorCode,
                'message' => $errorMessage
            ]
        ];
    }
}
