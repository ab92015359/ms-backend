<?php
namespace backend\modules\goods\models;

use yii\db\ActiveRecord;

class GoodsTag extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%goods_tag}}';
    }
}