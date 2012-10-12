<?php

/**
 * TODO: реализовать класс
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/import.class.php';
new import("write");

class error {

    private $_error = null;

    public function __construct() {
        //$this->getError($error);
    }

    public static function getError($error) {
        $this->_error = $error;
        
        
    }

}

?>