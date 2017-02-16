<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'test1');
define('DB_PASS', 'test1');
define('DB_HOST', 'localhost');
define('DB_NAME', 'test1');