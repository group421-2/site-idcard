<script src="/views/add/js/index/index.js"></script>
<link rel="stylesheet" type="text/css" href="/views/add/css/index/index.css"></link>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/import.class.php';
new import("controller.index");
$content = new Index_Controller();
$content = $content->_quotes;
for ($i = 0; $i < count($content); $i++): ?>
<div class="wrap_quotes">
    <div class="title_quotes">
        <?php print $content[$i]['title']; ?>
    </div>
    <div class="date_quotes">
        <?php print $content[$i]['date']; ?>
    </div>
    <div class="text_quotes">
        <?php print $content[$i]['text']; ?>
    </div>
</div>
<?php endfor; ?>

<div class="wrap_button">
    <button class="add_button">Добавить цитату</button>
</div>


<form action="" method="POST">
<div class="add_menu_wrap">
    <a href="" id="close"onclick="return false;">Закрыть</a>
    <div class="add_menu_title">
        <input type="text" name="quote[title]" id="quote_title" required placeholder="Заголовок" />
    </div>
    <div class="add_menu_text">
        <textarea rows="5" cols="20" name="quote[text]" id="quote_text" placeholder="Текст" /></textarea>
    </div>
    <button id="add_quote" onclick="return false;">Добавить</button>
</div>
</form>