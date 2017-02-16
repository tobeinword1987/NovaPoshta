<?php
/**
 * Created by PhpStorm.
 * User: lyudmila
 * Date: 16.02.17
 * Time: 0:55
 */class Connect {
    private $settings = array();
    private static $instance = null;
    
    private function __construct() {
        self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
    protected function __clone() {
// ограничивает клонирование объекта
    }
    static public function getInstance() {
        if(is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
}