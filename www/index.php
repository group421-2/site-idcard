<?php
error_reporting(E_ALL);
require_once 'app/includes.php';
$Core = new Core();
$Core->Start($_SERVER['REQUEST_URI']);
?>
