$(document).ready(function() {
    $('.add_button').click(function() {
       $(".add_menu_wrap").toggle("slow");
    });
    var date = new Date();
    $("#add_quote").click(function() {
        $.ajax({
           url : '/quotes/add',
           type: 'POST',
           data: {
               'title' : $("#quote_title").val(),
               'text' : $("#quote_text").val()
           },
           success: function() {
               $(".add_menu_wrap").toggle("slow");
               $("header").prepend(
                    "<div class=\"wrap_quotes\"><div class=\"title_quotes\">" + $("#quote_title").val() + " </div> <div class=\"date_quotes\">"+date+" </div><div class=\"text_quotes\">"+$("#quote_text").val()+" </div></div>");
           }
        });
    });
    
    $("#close").click(function() {
       $(".add_menu_wrap").toggle("slow");
    });
})