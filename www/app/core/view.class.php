<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/libs/smarty/Smarty.class.php');

class view {

    public static $_view;

    public function __construct() {
        $v = new Smarty();
        self::$_view = $v;
    }

    public function configure()
    {
        $v->allow_php_templates = true;
        $v->force_compile = false;
        $v->caching = false;
        $v->cache_lifetime = 100;
        $v->template_dir =  $_SERVER['DOCUMENT_ROO'] . '/views';
        $v->compile_dir =   $_SERVER['DOCUMENT_ROOT'] . '/templates_c/';
        $v->config_dir =    $_SERVER['DOCUMENT_ROOT'] . '/configs/';
        $v->cache_dir =     $_SERVER['DOCUMENT_ROOT'] . '/cache/';
    }

    public static function viewTracert($tracert)
    {
        require_once '/views/tracert/error.php';
        new tracertError($tracert);
    }

}

?>
