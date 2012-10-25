<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/dataprovider/queries.class.php";

class gallery_album_Model {

    private static $_query;
    private static $_result;

    protected static function getAlbumPhotoById($id) {
        self::$_query = new queries();
        self::$_result = self::$_query->select("path")->from("gallery_photos")->where("idAlbum = $id")->done();
        return self::$_result;
    }

}

?>