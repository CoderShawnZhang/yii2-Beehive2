<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/27
 * Time: 下午5:00
 */

namespace shawn\beehive\table;

use yii\db\ActiveRecord;

class BeehiveAR extends ActiveRecord
{
    public static function findData($params, $expand = '', $sort = '')
    {
        $class = get_called_class();
        if (!empty($sort)) {
            $sort = self::getDefaultOrder(['sort' => $sort]);
            $dataModel = $class::find()->where($params)->orderBy($sort)->all();
        } else {
            $dataModel = $class::find()->where($params)->all();
        }

        $data = [];
        if ($dataModel) {
            foreach ($dataModel as $key => $value) {
                if ($expand) {
                    $data[] = $value->toArray([], explode(',', $expand));
                } else {
                    $data = $value->toArray();
                }
            }
        }
        return $data;
    }

    public static function getDefaultOrder($params)
    {
        if (isset($params['sort'])) {
            $defaultOrder = [];
            $sort = explode(',', $params['sort']);
            foreach ($sort as $key => $value) {
                if (substr($value, 0, 1) == '-') {
                    $defaultOrder[substr($value, 1)] = SORT_DESC;
                } else {
                    $defaultOrder[$value] = SORT_ASC;
                }
            }
        } else {
            $defaultOrder = ['updated' => SORT_DESC, 'created' => SORT_DESC];
        }
        return $defaultOrder;
    }

}
