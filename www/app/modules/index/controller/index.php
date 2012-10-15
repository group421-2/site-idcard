<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("model.index");
new import("resize");

class Index_Controller extends Index_Model {

    public $_quotes;

    public function __construct() {
        $this->execute();
    }

    private function execute() {
//        $resize = new imageResize();
//        $resize->resize($_SERVER['DOCUMENT_ROOT'] . "/files/photos/1_1.jpg", $_SERVER['DOCUMENT_ROOT'] . "/files/photos/1.jpg", 973, 700, 100);
//        $resize->resize($_SERVER['DOCUMENT_ROOT'] . "/files/photos/2_1.jpg", $_SERVER['DOCUMENT_ROOT'] . "/files/photos/2.jpg", 973, 700, 100);
//        $resize->resize($_SERVER['DOCUMENT_ROOT'] . "/files/photos/3_1.jpg", $_SERVER['DOCUMENT_ROOT'] . "/files/photos/3.jpg", 973, 700, 100);
//        $resize->resize($_SERVER['DOCUMENT_ROOT'] . "/files/photos/4_1.jpg", $_SERVER['DOCUMENT_ROOT'] . "/files/photos/4.jpg", 973, 700, 100);
//        $resize->resize($_SERVER['DOCUMENT_ROOT'] . "/files/photos/5_1.jpg", $_SERVER['DOCUMENT_ROOT'] . "/files/photos/5.jpg", 973, 700, 100);
//        $resize->resize($_SERVER['DOCUMENT_ROOT'] . "/files/photos/6_1.jpg", $_SERVER['DOCUMENT_ROOT'] . "/files/photos/6.jpg", 973, 700, 100);
    }

}

?>