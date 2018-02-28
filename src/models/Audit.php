<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/27
 * Time: 下午5:14
 */

namespace shawn\beehive\models;

use shawn\beehive\table\Audit as Table;

class Audit extends Table
{
    public function rules()
    {
        return array_merge(parent::rules(), [

        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
        ]);
    }

    public static function findByGoodsId($goodsId, $expand = '', $sort = '')
    {
        $params = ['goodsId' => $goodsId];
        return parent::findData($params, $expand, $sort);
    }

    public static function count()
    {
        return self::find()->count();
    }
}
