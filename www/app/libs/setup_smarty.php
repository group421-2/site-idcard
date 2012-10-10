<?php

// загружаем библиотеку Smarty
require($_SERVER['DOCUMENT_ROOT'] . '/app/libs/smarty/Smarty.class.php');

// Файл setup.php - это хорошее место для
// подключения библиотечных файлов вашего приложения,
// вы можете сделать это прямо здесь. Пример:
// require('guestbook/guestbook.lib.php');

class Smarty_Quotes extends Smarty {

    public $_smarty;

    public function __construct() {
        parent::__construct();
//        $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/views';
//        $this->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/templates_c/';
//        $this->config_dir = $_SERVER['DOCUMENT_ROOT'] . '/configs/';
//        $this->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/cache/';
//        $this->caching = true;
    }

    public function ass($what, $do) {
        $this->_smarty = parent::__construct();
        $this->_smarty->assign($what, $do);
    }

    public function dis($what) {
        $this->_smarty = parent::__construct();
        $this->_smarty->display($what);
    }

}

?>