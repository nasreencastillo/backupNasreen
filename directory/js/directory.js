$(document).ready(function() {

    var mydrop = $("#mycateg .dropdown-menu");


    $("#categ-cat").on('click', function() {
        mydrop.slideToggle();
    });

    $(".btn-group .dropdown-menu li a").on('click', function() {

        var iselect = $(this).text();
        $("#categ-data").text(iselect);
        mydrop.slideToggle();
    });


$(document).on("mouseenter", ".dir-member", function() {
     $(this).css({"border": "0px solid #0050a1"}).animate({
        borderWidth: 2
     },100);
}).on("mouseleave",".dir-member", function(){
    $(this).animate({
        borderWidth: 0
        
    },100);
});

});