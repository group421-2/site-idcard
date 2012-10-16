$(document).ready(function() {
    showHideImg();
    scrollDown();
    setTimeout(showHideImg(), 1500);
        
});
/**
 * Слайд-шоу
 */
function scrollDown() {
    $('#scrollDown').cycle({
        sync: true,
        delay: -5000,
        height: 560
    //speed: 700
    });
}
/**
 * Военная хитрость
 */
function showHideImg() {
    $("scrollDown").toggle();
}