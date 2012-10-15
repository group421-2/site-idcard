<script src="/views/add/js/index/index.js"></script>
<script src="/views/add/js/libs/jquery.easing.compatibility.js"></script>
<script src="/views/add/js/libs/jquery.cycle.lite.js"></script>
<script>
    $(document).ready(function() {
        $('#scrollDown').cycle({
            sync: true,
            delay: -2000,
            height: 560
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="/views/add/css/index/index.css"></link>
<div id="wrap" align="center">
    <!-- Меню -->
    <div class="menu">
        <a href="/content">Главная</a>
    </div>
    <div class="menu">
        <a href="/content">Галерея</a>
    </div>
    <div class="menu">
        <a href="/content">Услуги</a>
    </div>
    <!-- /Меню -->
    
    <div id="scrollDown" class="pics">
        <img src="/files/photos/1.jpg" height="700px" width="973px" />
        <img src="/files/photos/2.jpg" />
        <img src="/files/photos/3.jpg" />
        <img src="/files/photos/4.jpg" />
        <img src="/files/photos/5.jpg" />
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