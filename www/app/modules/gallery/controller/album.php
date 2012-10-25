
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/import.class.php';
new import("model.gallery.album");

class gallery_album_Controller extends gallery_album_Model {

    public static $_params;

    public function __construct($params) {
        $this->execute();
        self::$_params = $params;
    }

    private function execute() {
        
    }

    public static function returnPhotoPath() {
        return gallery_album_Model::getAlbumPhotoById(self::$_params[0]);
    }

}

?>