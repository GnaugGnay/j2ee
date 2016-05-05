<?php
/**
 * 对外API总入口文件
 * User: a-yi
 * Date: 2015/7/18
 */
$_GET['ct'] = 'api';
define('WEB_ROOT', dirname(dirname(__FILE__)));
include '../main/index.php';