<?php
  
    //Front Controller

    //Общие настройки
    error_reporting(E_ALL);

    //Подключение файлов системы
    require_once 'components/Router.php';
    //Подключение базы данных и RedBeanPHP
    include_once 'config/libs/db.php';
    //var_dump(dirname(__FILE__));
    $a = new Router();
    $a->run();
?>