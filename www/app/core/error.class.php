<?php

/**
 * TODO: реализовать класс
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/import.class.php';
new import("write");
new import("config");

class error extends Config {

    private $_errorMessage = null;

    public function __construct() {
        
    }

    /**
      * getter & setter
      */
    public static function getError($error) {
        $this->_errorMessage = $error;
        return $this;
    }
    /**
      * Страница не найдена
      *
      */
    public function pageNotFound() {
        require_once $_SERVER['DOCUMENT_ROOT']."/views/error.php";
    }
    
    /**
      * Запись ошибки
      * 
      * @var string $errorString
      */
    public function writeError() {
        $write = new write();
        $write->fileWrite($this->_errorMessage);
    }



}

?>
