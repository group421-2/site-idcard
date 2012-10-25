<?php
require_once $_SERVER['DOCUMENT_ROOT']."/app/core/import.class.php";
new import("model.gallery");

class Gallery_Controller extends Gallery_Model {

    public function __construct() {
        $this->execute();
    }

    private function execute() {
        
    }
    
    public function returnAlbums() {
        return $this->getAlbums();
    }
    
    public function returnPhotoPath($id) {
        return $this->getAlbumPhotoById($id);
    }

}

?>