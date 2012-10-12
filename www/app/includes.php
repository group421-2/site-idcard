<?php

require_once 'core/dataprovider/db.class.php';
require_once 'core/core.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
if (usersConfig::$db_use)
    new databaseprovider(usersConfig::$db_host, usersConfig::$db_user, usersConfig::$db_pass, usersConfig::$db_table, usersConfig::$_debug);
?>
