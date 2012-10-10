<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/dataprovider/queries.class.php";

class quotes_add_Model extends queries {
    public function addQuote($title, $text) {
        $this->insert()->into("`quotes` (`title`, `text`, `date`)")->values(("'$title', '$text', NOW()"))->done();
        //mysql_query("INSERT INTO `quotes` (`title`, `text`, `date`) VALUES ('$title', '$text', NOW())") or die(mysql_error());
    }
}

?>