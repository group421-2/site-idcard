<?php

/**
 * Класс роутинга, перенаправление страниц, подобие ЧПУ
 * @author PeoneEr
 */
class route {

    //TODO: переписать класс, он должен перенаправлять только запросы, которые обрабатываются после route.config.php
    private $_uri = array();
    private $_params = array();
    private $_class = null;
    private $_controller = null;

    public function __construct($url) {
        $this->_uri = explode("/", $url);
        require_once "views/header.php";
        for ($i = 3; $i < count($this->_uri); $i++)
            $this->_params[] = $this->_uri[$i];

        if ($this->_uri[1] == "") {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/index/controller/index.php';
            $_controller = new Index_Controller();
            require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/index/model/index.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/index/index.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/footer.php';
        }
        if ($this->_uri[1] != "" && $this->_uri[2] == "") {
            $class = $this->_uri[1];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/index.php')) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/index.php';
            } else {
                error::getError("404 <br />This page does no found");
                return;
            }
            $_controller = $class . "_Controller";
            $_controller = new $_controller($this->_params);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $class . '/index.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/footer.php';
        }

        if ($this->_uri[1] != "" && $this->_uri[2] != "") {
            $class = $this->_uri[1];
            $file = $this->_uri[2];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/' . $file . ".php")) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/' . $file . ".php";
            } else {
                error::getError("404 <br />This page does no found");
                return;
            }
            $_controller = $class . "_" . $file . "_Controller";
            $_controller = new $_controller($this->_params);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $class . '/' . $file . '.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/footer.php';
        }
    }

}

?>
