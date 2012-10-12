<?php

class Core {
    
    /**
     * Точка входа в приложение. Устанавливает роутинг.
     * @param string $url
     * 
     */
    public function Start($url) {
        require_once "route.class.php";
        new route($url);
    }

}

?>
