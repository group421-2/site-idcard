<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/dataprovider/queries.class.php";

class Index_Model {
    
    private $_query;
    public $_result;
    
    public function getLastQuotes() {
       $this->_query = new queries();
       $this->_result = $this->_query->select("*")->from("quotes")->orderBy("`date` DESC")->done();
       return $this->_result;
    }
}

?>