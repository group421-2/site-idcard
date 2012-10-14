<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/error.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/configs/constants.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/dataprovider/db.class.php";

class Config {

    private $db_host;
    private $db_user;
    private $db_password;
    private $db_table;
    private $db_use;
    private $db_type;
    public static $_debug;

    public function __construct() {
        $error = new error();
        $this->db_host = (usersConfig::$db_host) ? (usersConfig::$db_host) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        //TODO: переписать на правильную работу класса error, в соответствии с новыми параметрами
        $this->db_user = (usersConfig::$db_user) ? (usersConfig::$db_user) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        $this->db_password = (usersConfig::$db_pass) ? (usersConfig::$db_pass) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        $this->db_table = (usersConfig::$db_table) ? (usersConfig::$db_table) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        $this->db_use = (usersConfig::$db_use) ? (usersConfig::$db_use) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        $this->db_type = (usersConfig::$db_type) ? (usersConfig::$db_type) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        $this->_debug = (usersConfig::$_debug) ? (usersConfig::$_debug) : $error->getMessage(_CONFIG_NOT_FOUND)->writeMessage();
        //TODO: передавать локаль в параметрах
        if ($this->db_use)
            new databaseprovider($this->db_host, $this->db_user, $this->db_password, $this->db_table, $this->db_type);
    }

}

?>
