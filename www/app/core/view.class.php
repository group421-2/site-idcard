<?php


class view {

    public static $_view;

    public static function viewTracert($tracert) {
        require_once '/views/tracert/error.php';
        new tracertError($tracert);
    }

}

?>
