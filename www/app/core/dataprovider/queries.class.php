<?php

/**
 * Запросы в бд
 * @author PeoneEr
 * @tutorial $this->_result = $this->_query()->select()->from()->where()->done();
 */
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("includes");
new import("error");
new import("config");
new import("tracert");

class queries {

    /**
     *
     * @var string $_select Выбрать
     */
    private $_select;

    /**
     *
     * @var string $_from Откуда
     */
    private $_from;

    /**
     *
     * @var string $_where Где
     */
    private $_where;

    /**
     *
     * @var string $_into Вставить в
     */
    private $_into;

    /**
     *
     * @var array $_values Значения для вставки
     */
    private $_values;

    /**
     *
     * @var string $_update_table Значения для обновления таблиц
     */
    private $_update_table;

    /**
     *
     * @var string $_set Установить
     */
    private $_set;

    /**
     *
     * @var string $_query Запрос
     */
    private $_query;

    /**
     *
     * @var int $_switcher Переключатель
     * 1: select
     * 2: insert
     * 3: update
     * Задается автоматически
     */
    private $_switcher;

    /**
     *
     * @var string $_order Отсортировать
     */
    private $_order;

    public function select($select) {
        $this->_select = $select;
        $this->_switcher = 1;
        return $this;
    }

    public function from($from) {
        $this->_from = $from;
        return $this;
    }

    public function where($where) {
        $this->_where = "WHERE " . $where;
        return $this;
    }

    public function orderBy($order) {
        $this->_order = "ORDER BY" . $order;
        return $this;
    }

    public function insert() {
        $this->_switcher = 2;
        return $this;
    }

    public function into($into) {
        $this->_into = $into;
        return $this;
    }

    public function values($values) {
        $this->_values = $values;
        return $this;
    }

    public function update($update_table) {
        $this->_update_table = $update_table;
        $this->_switcher = 3;
        return $this;
    }

    public function set($set) {
        $this->_set = $set;
        return $this;
    }

    private function __prepare() {
        switch ($this->_switcher) {
            case 1:
                $this->_query = "SELECT " . $this->_select . " FROM " . $this->_from . " " . $this->_where . " " . $this->_order;
                break;
            case 2:
                $this->_query = "INSERT INTO " . $this->_into . " VALUES " . $this->_values;
                break;
            case 3:
                $this->_query = "UPDATE " . $this->_update_table . " SET " . $this->_set . " " . $this->_where;
                break;
        }
    }

    public function done() {
        $error = new error();
        $tracert = new tracert();
        $config = new Config();
        $this->__prepare();
        switch ($this->_switcher) {
            case 1:
                $result = mysql_query($this->_query) or die($error->getMessage(mysql_error())->writeMessage());
                $fetch = mysql_fetch_assoc($result);
                do {
                    $array[] = $fetch;
                } while ($fetch = mysql_fetch_assoc($result));
                if ($config->getVar("debug")) {
                    $error->getMessage("Query " . $this->_query . " was execute, result return now")->writeMessage();
                    $tracert->getParams($this->_query, $array);
                }
                return $array;
                break;
            case 2:
                $result = mysql_query($this->_query) or die($error->getMessage(mysql_error())->writeMessage());
                if ($config->getVar("debug"))
                    $tracert->getParams($this->_query);
                return true;
                break;
            case 3:
                $result = mysql_query($this->_query) or die($error->getMessage(mysql_error())->writeMessage());
                if ($config->getVar("debug"))
                    $tracert->getParams($this->_query);
                return true;
                break;
        }
    }

    public function getById($from, $id) {
        $this->_query = "SELECT * FROM $from WHERE `id` = $id";
        $this->_switcher = 1;
    }

    public function getByName($from, $name) {
        $this->_query = "SELECT * FROM $from WHERE `name` = $name";
        $this->_switcher = 1;
    }

    public function getLine($from, $where) {
        $this->_query = "SELECT * FROM $from WHERE $where LIMIT 1";
        $this->_switcher = 1;
    }

}

?>
