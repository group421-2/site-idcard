<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/dataprovider/queries.class.php";

class Index_Model {
    
    private $_query;
    public $_result;
    
    protected function getSlideShowPhotos() {
        $this->_query = new queries();
        $this->_result = $this->_query->select("path")->from("gallery_photos")->where("slideShow = '1'")->done();
        return $this->_result;
    }
}

?>