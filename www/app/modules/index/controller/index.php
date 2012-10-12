<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("model.index");

class Index_Controller extends Index_Model {

    public $_quotes;

    public function __construct() {
        $this->execute();
    }

    private function execute() {
//        echo 'Hello world!';
    }

}

?>