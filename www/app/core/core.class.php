<?php

class Core {

    public function Start($url) {
        require_once "route.class.php";
        $route = new route($url);
    }

}

?>
