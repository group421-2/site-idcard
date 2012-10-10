<?php
require_once '/app/configs/Config.php';

class usersConfig extends Config {

	//TODO: загрузить config.class
	public static $db_host = "localhost";
	public static $db_user = "root";
	public static $db_pass = "";
	public static $db_table = "quotes";
	public static $_debug = true;
}
?>
