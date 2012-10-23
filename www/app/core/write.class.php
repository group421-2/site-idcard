<?php
/**
 * Класс записи в файл
 * @author Koala
 */

class write {

    private $file_path;
    
    /**
     * Конструктор класса. Настройка таймзоны, установление пути к файлам и прочие настройки и проверки
     */
    public function __construct() {
        date_default_timezone_set('UTC');
        $this->file_path = $_SERVER['DOCUMENT_ROOT'] . "/logs/" . date("d-m-Y") . ".log";
        if (!file_exists($this->file_path)) { //Если файла не существует - создать
            $handle = fopen($this->file_path, "x");
            fclose($handle);
        }
    }

    /**
     * Запись в файл
     * @param string $string
     */
    public function file_write($string) {
        $handle = fopen($this->file_path, "a");
        fwrite($handle, date("d.m.Y H:i" . "\n\r"));
        fwrite($handle, $string . "\n\r");
        fclose($handle);
    }

}

?>