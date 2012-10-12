<?php

class import {

    private $_import;

    /**
     * @author PeoneEr <PeoneErko@gmail.com>
     * импортирование моделей
     * @param string $importString
     * @tutorial import("model.index")
     */
    public function __construct($importString) {
        /**
         * Импортирование дополнительных классов 
         */
        if ($importString == "error") {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/error.class.php";
            return true;
        } elseif ($importString == "write") {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/write.class.php";
            return true;
        } elseif ($importString == "tracert") {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/tracert.class.php";
            return true;
        }
        /**
         * Импортирование моделей и контроллеров 
         */
        $this->_import = explode(".", $importString);
        if (!$this->_import)
            return array("error" => "Не указаны модели для импортирования");
        switch ($this->_import[0]) {
            case "model":
                if (count($this->_import) == 2) {
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/modules/" . $this->_import[1] . "/model/index.php";
                    return true;
                }
                if (count($this->_import) == 3) {
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/modules/" . $this->_import[1] . "/model/" . $this->_import[2] . ".php";
                    return true;
                }
                break;
            case "controller":
                if (count($this->_import) == 2) {
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/modules/" . $this->_import[1] . "/controller/index.php";
                    return true;
                }
                if (count($this->_import) == 3) {
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/modules/" . $this->_import[1] . "/controller/" . $this->_import[2] . ".php";
                    return true;
                }
                break;
        }
    }

}

?>