$(document).ready(function() {
    showHideImg();
    scrollDown();
    setTimeout(showHideImg(), 1500);
        
});
function scrollDown() {
    $('#scrollDown').cycle({
        sync: true,
        delay: -5000,
        height: 560
    //speed: 700
    });
}
function showHideImg() {
    $("scrollDown").toggle();
}