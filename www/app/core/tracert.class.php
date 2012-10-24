<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("query");

/**
 * обработчик ошибок
 * TODO: реализовать класс
 */
class tracert {

    private $_queryToDatabase = "";
    private $_answerFromDatabase = array();

    public function getParams($query, array $answer = null) {
        $this->_queryToDatabase = $query;
        $this->_answerFromDatabase = $answer;
    }

//    public function viewQuery() {
//        return $this->_queryToDatabase;
//    }
//
//    public function viewAnswer() {
//        if ($this->_answerFromDatabase != null) {
//            return $this->_answerFromDatabase;
//        }
//    }

}

?>
