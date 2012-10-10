
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/import.class.php';
new import("model.quotes.add");

class quotes_add_Controller extends quotes_add_Model {

    private $_title;
    private $_text;

    public function __construct($params) {
        $this->init($params)->done();
    }

    private function init($params) {
        return $this;
    }

    public function execute() {
        $this->_title = $_POST['title'];
        $this->_text = $_POST['text'];
        $this->addQuote($this->_title, $this->_text);
        return true;
    }

}

?>