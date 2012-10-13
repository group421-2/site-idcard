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
        switch ($importString) {
            case "error":
                require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/error.class.php";
                return true;
                break;
            case "write":
                require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/write.class.php";
                return true;
                break;
            case "tracert":
                require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/tracert.class.php";
                return true;
                break;
            case "constants":
                require_once $_SERVER['DOCUMENT_ROOT'] . "/app/configs/constants.php";
                return true;
                break;
            case "config":
                require_once $_SERVER['DOCUMENT_ROOT'] . "/app/configs/Config.php";
                return true;
                break;
            default:
                break;
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
