<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/configs/Config.php';

class usersConfig extends Config {

    //TODO: загрузить config.class
    public static $db_use = true;
    public static $db_host = "localhost";
    public static $db_user = "root";
    public static $db_pass = "kjkszpj019jiop";
    public static $db_table = "site-idcard";
    public static $_debug = true;
    public static $db_type = "mysql";
    public static $db_locale = "utf8";

}

?>
