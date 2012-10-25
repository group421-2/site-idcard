<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/dataprovider/queries.class.php";

class Gallery_Model {

    private $_query;
    public $_result;

    protected function getAlbums() {
        $this->_query = new queries();
        $this->_result = $this->_query->select("*")->from("gallery_albums")->done();
        return $this->_result;
    }
    
    protected function getAlbumPhotoById($id) {
        $this->_query = new queries();
        $this->_result = $this->_query->select("path")->from("gallery_photos")->where("idAlbum = $id LIMIT 1")->done();
        return $this->_result; 
    }

}

?>