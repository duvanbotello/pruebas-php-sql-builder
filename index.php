<?php

require_once dirname(__FILE__) . '/vendor/autoload.php';
require dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/controllers/index.php';


if (isset($_GET['function']) && !empty($_GET['function'])) {
    $funcion = $_GET['function'];
    switch ($funcion) {
        case 'getItemTables':
            SqlBuilderController::getItemsTables($_GET['table_name']);
            break;
    }
} else {
    $builder = new SqlBuilder();
    $getTables = SqlBuilderController::getTables();

    $smarty->assign('builder', $builder);
    $smarty->assign('getTables', $getTables);
    $smarty->display('index.tpl');

}

