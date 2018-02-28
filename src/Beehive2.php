<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/28
 * Time: 下午5:47
 */

class Beehive2 extends \yii\base\Component
{
    public $audit;

    public function __construct()
    {
        $this->audit = new \shawn\beehive\modules\AuditModule();
    }
}
