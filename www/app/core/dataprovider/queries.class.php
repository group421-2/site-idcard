<?php

/**
 * Запросы в бд
 */
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/includes.php";

class queries {

    private $_select;
    private $_from;
    private $_where;
    private $_into;
    private $_values;
    private $_update_table;
    private $_set;
    private $_query;
    private $_switcher; // 1: select, 2: insert, 3: update
    private $_order;
    
    public function select($select) 
    {
        $this->_select = $select;
        $this->_switcher = 1;
        return $this;
    }

    public function from($from) 
    {
        $this->_from = $from;
        return $this;
    }

    public function where($where) 
    {
        $this->_where = "WHERE " . $where;
        return $this;
    }

    public function orderBy($order) 
    {
        $this->_order = "ORDER BY" . $order;
        return $this;
    }

    public function insert() 
    {
        $this->_switcher = 2;
        return $this;
    }

    public function into($into) 
    {
        $this->_into = $into;
        return $this;
    }

    public function values($values) 
    {
        $this->_values = $values;
        return $this;
    }

    public function update($update_table) 
    {
        $this->_update_table = $update_table;
        $this->_switcher = 3;
        return $this;
    }

    public function set($set) 
    {
        $this->_set = $set;
        return $this;
    }

    private function __prepare() 
    {
        switch ($this->_switcher) 
        {
            case 1:
                $this->_query = "SELECT " . $this->_select . " FROM " . $this->_from . " " . $this->_where . " " . $this->_order;
            break;
            case 2:
                $this->_query = "INSERT INTO " . $this->_into . " VALUES " . $this->_values;
            print "<pre>";
                var_dump($this->_query);
            print "</pre>";
            break;
            case 3:
                $this->_query = "UPDATE " . $this->_update_table . " SET " . $this->_set . " " . $this->_where;
            break;
        }
    }

    public function done() 
    {
        $this->__prepare();
        switch ($this->_switcher) 
        {
            case 1:
            $result = mysql_query($this->_query) or die(mysql_error());
            $fetch = mysql_fetch_assoc($result);
            do {
                $array[] = $fetch;
            } while ($fetch = mysql_fetch_assoc($result));
            return $array;
            break;
            case 2:
            $result = mysql_query($this->_query) or die(mysql_error());
            return true;
            break;
            case 3:
            $result = mysql_query($this->_query) or die(mysql_error());
            return true;
            break;
        }
    }

    public function getById($from, $id)
    {
        $this->_query = "SELECT * FROM $from WHERE `id` = $id";
        $this->_switcher = 1;
    }

    public function getByName($from, $name)
    {
       $this->_query = "SELECT * FROM $from WHERE `id` = $name";
       $this->_switcher = 1;
    }

    public function getLine($from, $where)
    {
        $this->_query = "SELECT * FROM $from WHERE $where LIMIT 1";
        $this->_switcher = 1;
    }

}

?>
