<?php

namespace backend\modules\goods\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\Response;

use backend\controllers\BaseController;
use backend\utils\LogUtil;
use backend\utils\ResponseUtil;

use backend\modules\goods\models\GoodsTag;

/**
 * Goods tag controller for the `goods` module
 */
class GoodsTagController extends BaseController
{
    public function behaviors()
    {
        return ArrayHelper::merge([
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get-goods-tags'  => ['get']
                ],
            ],
        ], parent::behaviors());
    }

    public function actionGetGoodsTags()
    {
        $goodsTags = GoodsTag::find()
            ->asArray()
            ->all();
        return ['result' => 'ok', 'data' => ['goodsTags' => $goodsTags]];
    }
}
