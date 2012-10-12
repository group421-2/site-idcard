<?php

/**
 * Класс роутинга, перенаправление страниц, подобие ЧПУ
 * @author PeoneEr
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/import.class.php';
new import("error");
new import("constants");

class route {

    //TODO: переписать класс, он должен перенаправлять только запросы, которые обрабатываются после route.config.php
    /**
     *
     * @var array $uri - содержит массив роутинга
     */
    private $_uri = array();
    /**
     *
     * @var array $params - параметры, передаваемые классу
     */
    private $_params = array();
    /**
     *
     * @var class $class - ссылка на класс
     */
    private $_class = null;
    /**
     *
     * @var string $controller - имя контроллера, вызываемого из модуля
     */
    private $_controller = null;

    public function __construct($url) {
        $this->_uri = explode("/", $url);
        require_once "views/header.php";
        /* site.example.com/quotes/add/1/2/3/4/5/6/ */
        for ($i = 3; $i < count($this->_uri); $i++)
            $this->_params[] = $this->_uri[$i];
        /**
         * Если не заданы другие значения, человек просто зашел на сайт, то грузим ему index/index
         */
        if ($this->_uri[1] == "") {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/index/controller/index.php';
            $this->_controller = new Index_Controller();
            require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/index/model/index.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/index/index.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/footer.php';
        }
        /**
         * Если задан первый параметр, то грузим <имя модуля>/index
         */
        if ($this->_uri[1] != "" && $this->_uri[2] == "") {
            $this->_class = $this->_uri[1];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/index.php')) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/index.php';
            } else {
                error::pageNotFound();
                return;
            }
            $this->_controller = $this->_class . "_Controller";
            $this->_controller = new $$this->_controller($this->_params);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $this->_class . '/index.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/footer.php';
        }
        /**
         * Если заданы два параметра, то грузим <имя модуля>/<имя параметра>
         */
        if ($this->_uri[1] != "" && $this->_uri[2] != "") {
            $this->_class = $this->_uri[1];
            $file = $this->_uri[2];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/' . $file . ".php")) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/app/modules/' . $this->_uri[1] . '/controller/' . $file . ".php";
            } else {
                error::pageNotFound();
                return;
            }
            $this->_controller = $this->_class . "_" . $file . "_Controller";
            $this->_controller = new $this->_controller($this->_params);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $this->_class . '/' . $file . '.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/footer.php';
        }
    }

}

?>
