<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/27
 * Time: 下午4:47
 */
require_once __DIR__ . "/vendor/autoload.php";
use shawn\beehive\modules\AuditModule;

// 加载应用配置
$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

$audit = new AuditModule();
echo $audit->findByGoodsId();
