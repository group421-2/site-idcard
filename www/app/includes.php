<?php

require_once 'core/dataprovider/db.class.php';
require_once 'core/core.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
new databaseprovider(config::$db_host, config::$db_user, config::$db_pass, config::$db_table, config::$_debug);
?>
