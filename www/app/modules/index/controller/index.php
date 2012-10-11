<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("model.index");
require_once '/app/core/view.class.php';

class Index_Controller extends Index_Model {

    public $_quotes;

    public function __construct() {
        $this->execute();
    }

    private function execute() {
        
    }

}

?>