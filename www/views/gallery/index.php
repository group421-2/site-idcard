<script src="/views/add/js/gallery/index.js"></script>
<link rel="stylesheet" type="text/css" href="/views/add/css/gallery/index.css"></link>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/core/import.class.php";
new import("controller.index");
$galleryIndexController = new Gallery_Controller();
$albums = $galleryIndexController->returnAlbums();
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
    <div id="content" allign="center">
        <ul class="thumbnails" style="margin-top: 20px; margin-left: 30px;">
            <?php
            for ($i = 0; $i < count($albums); $i++) :
                $photos = $galleryIndexController->returnPhotoPath($albums[$i]['id']);
                ?>

                <li class="span3">
                    <a href="/gallery/album/<?= $albums[$i]['id']; ?>">
                        <img src="<?= $photos[0]['path']; ?>" class="thumbnail"/>
    <?= $albums[$i]['name']; ?>
                    </a>
                </li>
<?php endfor; ?>
        </ul>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
        It has survived not only five centuries, but also the leap into electronic typesetting, 
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
        containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker 
        including versions of Lorem Ipsum.
    </div>
</div>
