<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/28
 * Time: 下午2:47
 */

namespace shawn\beehive\modules;

use shawn\beehive\models\Audit;
use yii\db\Exception;

class AuditModule
{
    public function findByGoodsId($goodsId, $expand = '', $sort = '')
    {
        try {
            $data = Audit::findByGoodsId($goodsId, $expand, $sort);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $data;
    }

    public function count()
    {
        try {
            $data = Audit::count();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $data;
    }
}
