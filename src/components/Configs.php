<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/28
 * Time: 下午2:53
 */

namespace shawn\beehive\components;

use yii\di\Instance;
use yii\helpers\ArrayHelper;

class Configs extends \yii\base\Object
{
    private static $_intance;
    private static $_classes = [
        'db' => 'yii\db\Connection',
    ];
    public function init()
    {
        foreach (self::$_classes as $key => $class) {
            try {
                $this->{$key} = empty($this->{$key}) ? null : Instance::ensure($this->{$key}, $class);
            } catch (\Exception $exc) {
                $this->{$key} = null;
                \Yii::error($exc->getMessage());
            }
        }
    }

    public static function instance()
    {
        if (self::$_intance === null) {
            $type = ArrayHelper::getValue(\Yii::$app->params, 'beehive,configs', []);
            if (is_array($type) && !isset($type['class'])) {
                $type['class'] = static::className();
            }
            return self::$_intance = \Yii::createObject($type);
        }
        return self::$_intance;
    }

    public static function db()
    {
        return static::instance()->db;
    }
}
