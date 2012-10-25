<script src="/views/add/js/index/index.js"></script>
<script src="/views/add/js/libs/jquery.easing.compatibility.js"></script>
<script src="/views/add/js/libs/jquery.cycle.lite.js"></script>
<link rel="stylesheet" type="text/css" href="/views/add/css/index/index.css"></link>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("controller.index");
$indexController = new Index_Controller();
$slideShowArray = $indexController->returnSlideShow();
?>
<div id="wrap" align="center">
    <!-- Меню -->
    <div class="menu">
        <a href="/index">Главная</a>
    </div>
    <div class="menu">
        <a href="/gallery">Галерея</a>
    </div>
    <div class="menu">
        <a href="/services">Услуги</a>
    </div>
    <!-- /Меню -->

    <div id="scrollDown" class="pics">
        <?php for ($i = 0; $i < count($slideShowArray); $i++) : ?>
            <img src="<?= $slideShowArray[$i]['path']; ?>" />
            <?php endfor; ?>
    </div>
    <div id="content">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
        It has survived not only five centuries, but also the leap into electronic typesetting, 
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
        containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker 
        including versions of Lorem Ipsum.
    </div>

</div>