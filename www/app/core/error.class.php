<?php 

/**
* TODO: реализовать класс
*/

class error {

	private $_error = null;
	
	public function __construct() {
		//$this->getError($error);
	}

	public static function getError($error) {
		$this->_error = $error;
		if ($this->_error) {
			tracert::view($this->_error);
		}
	}


	
}

?>