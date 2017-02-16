<?php
// включим отображение всех ошибок
error_reporting (E_ALL); 
// подключаем конфиг
include ('config.php');
require_once ('classes/connectDB.php');

// подключаем ядро сайта
include (SITE_PATH . 'core' . DS . 'core.php');

//echo SITE_PATH.  'core' . DS . 'core.php';
// Загружаем router
$router = new Router($registry);
// записываем данные в реестр
$registry->set ('router', $router);

// задаем путь до папки контроллеров.
$router->setPath (SITE_PATH . 'controllers');
// запускаем маршрутизатор
$router->start();
