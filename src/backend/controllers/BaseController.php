<?php
namespace backend\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::afterAction($action, $result);
    }
}