<?php

/**
 * Класс фильтрации.
 * Реализиует очистку, проверку переменных и возвращает результаты
 * @author PeoneEr
 */
class filter {

    private $_output = "";

    public function __construct() {
        
    }

    /**
     * Удаление лишних пробелов
     * @param string $input
     * @return $this
     */
    public function clearTrims($input) {
        $this->_output = trim($input);
        return $this;
    }

    /**
     * Удаление HT<L символов
     * @param string $input
     * @return $this
     */
    public function clearHTMLSpecialChars($input) {
        $this->_output = htmlspecialchars($input);
        return $this;
    }

    /**
     * Очистка массива (пока без методов)
     * @param array $input
     */
    public function clearArray(array $input) {
        foreach ($input as $key) {
            $input[$key] = $this->clearTrims($input[$key])->$this->clearHTMLSpecialChars($input[$key])->returnClearedString();
        }
    }

    /**
     * Завершение выполнения методов
     * @return string $this->_output
     */
    public function returnClearedString() {
        return $this->_output;
    }

    /**
     * Является ли $input числом
     * @param int $input
     * @return boolean
     */
    public function isInt($input) {
        if (is_int($input))
            return true;
        return false;
    }

}

?>
