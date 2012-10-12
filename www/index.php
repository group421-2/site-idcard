<?php
error_reporting(E_ALL); //Включение отображения всех настроек
require_once 'app/includes.php'; ///подключение файла с глобальными инклудами
$Core = new Core();
$Core->Start($_SERVER['REQUEST_URI']); //начало работы приложения, точка входа
?>
