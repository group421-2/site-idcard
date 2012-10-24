<?php

/**
 * Класс фильтрации.
 * Реализиует очистку, проверку переменных и возвращает результаты
 * @author PeoneEr
 */
class filter {

    private $_output = "";
    private $_input = "";

    public function __construct($input) {
        $this->_input = $input;
    }

    /**
     * Удаление лишних пробелов
     * @param string $input
     * @return $this
     */
    public function clearTrims() {
        $this->_output = trim($this->_input);
        return $this;
    }

    /**
     * Удаление HTML символов
     * @param string $this->_input
     * @return $this
     */
    public function clearHTMLSpecialChars() {
        $this->_output = htmlspecialchars($this->_input);
        return $this;
    }


    /**
     * Завершение выполнения методов
     * @return string $this->_output
     */
    public function returnClearedString() {
        return $this->_output;
    }
    
    
    /**
     * Очистка массива (пока без методов)
     * @param array $input
     * TODO: реализовать использование методов
     */
    public function clearArray(array $input) {
        foreach ($input as $key) {
            $input[$key] = $this->clearTrims($input[$key])->$this->clearHTMLSpecialChars($input[$key])->returnClearedString();
        }
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
    
    /**
     * Деструктор класса
     */
    private function __destruct() {
        unset($this->_input);
        unset($this->_output);
    }

}

?>
