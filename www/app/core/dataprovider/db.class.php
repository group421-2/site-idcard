<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("error");

/**
 * @author PeoneEr <peoneerko@gmail.com>
 * Класс работы с БД
 */
class databaseprovider {

    /**
     * @var string $_db_host содержит адрес для подключения к бд
     */
    private $_db_host;

    /**
     * @var string $_db_user содержит имя пользователя
     */
    private $_db_user;

    /**
     * @var string $_db_pass содержит пароль
     */
    private $_db_pass;

    /**
     * @var string $_db_table содержит имя базы данных
     */
    private $_db_table;

    /**
     * @var string $_db_locale локализация
     */
    private $_db_locale;

    /**
     * @var string $_db_connection_type тип соединения с бд
     */
    private $_db_connection_type;

    public function __construct($db_host, $db_user, $db_pass, $db_table, $db_connection_type = "mysql", $db_locale = NULL) {
        $this->init($db_host, $db_user, $db_pass, $db_table, $db_connection_type, $db_locale)->connect();
    }

    /**
     * инициализация параметров
     * @var string $_db_host содержит адрес для подключения к бд
     * @var string $_db_user содержит имя пользователя
     * @var string $_db_pass содержит пароль
     * @var string $_db_table содержит имя базы данных
     * @var string $_db_locale локализация
     * @var string $_db_connection_type тип соединения с бд
     */
    private function init($db_host, $db_user, $db_pass, $db_table, $db_connection_type, $db_locale) {
        /**
         * вызов $init->connect();
         */
        $this->_db_host = $db_host;
        $this->_db_user = $db_user;
        $this->_db_pass = $db_pass;
        $this->_db_table = $db_table;
        $this->_db_connection_type = $db_connection_type;
        ($db_locale == NULL) ? $db_locale = NULL : $this->_db_locale = $db_locale;
        return $this;
    }

    /**
     * соединение с БД и выбор таблицы
     */
    private function connect() {
        /**
         * переключатель, который зависит от $this->_db_connection_type и имеет два параметра
         * 1. mysql, запускает простое соединение с бд
         * 2. mysqlp, запускает постоянное соединение с бд
         */
        $error = new error();
        switch ($this->_db_connection_type) {
            case "mysql":
                try {
                    mysql_connect($this->_db_host, $this->_db_user, $this->_db_pass) or die(mysql_error());
                    mysql_query("set names utf8");
                } catch (Exception $e) {
                    $error->getMessage($e->getMessage() . " on line " . $e->getLine());
                }
                break;
            case "mysqlp":
                try {
                    mysql_pconnect($this->_db_host, $this->_db_user, $this->_db_pass) or die(mysql_error());
                    mysql_query("set names utf8");
                } catch (Exception $e) {
                    $error->getMessage($e->getMessage() . " on line " . $e->getLine());
                }
                break;
        }
        try {
            mysql_select_db($this->_db_table) or die(mysql_error());
        } catch (Exception $e) {
            $error->getMessage($e->getMessage() . " on line " . $e->getLine());
        }
        return $this; //на всякий случай ;(
    }

}

?>
