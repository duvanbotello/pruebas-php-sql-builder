<?php

define('ROOT_DIR', dirname(__FILE__));

$cof_database = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db' => 'recuperacion',
    'port' => 3306,
    'prefix' => 'my_',
    'charset' => 'utf8');

$db = new MysqliDb ($cof_database);

$smarty = new Smarty();
$smarty->setTemplateDir(ROOT_DIR . '/views/templates/');
$smarty->setCompileDir(ROOT_DIR . '/views/templates/compiles/');