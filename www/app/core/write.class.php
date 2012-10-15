<?php

class write {

    private $file_path;

    public function __construct() {
        date_default_timezone_set('UTC');
        $this->file_path = $_SERVER['DOCUMENT_ROOT'] . "/logs/" . date("d-m-Y") . ".log";
        if (!file_exists($this->file_path)) {
            $handle = fopen($this->file_path, "x");
            fclose($handle);
        }
    }

    public function file_write($string) {
        $handle = fopen($this->file_path, "a");
        fwrite($handle, date("d.m.Y H:i" . "\n\r"));
        fwrite($handle, $string . "\n\r");
        fclose($handle);
    }

    public function file_read() {
        /**
         * Если понадобится,допишем
         */
    }

}

?>