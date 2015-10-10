
$(document).ready(function()
{
$("#btnhome").click(function() {
    var offset = 50; //Offset of 20px
     $('html,body').animate({
        scrollTop: $("#home").offset().top - offset},
        'slow');
});


$("#btnservices").click(function() {
    var offset = 50; //Offset of 20px
    $('html, body').animate({
        scrollTop: $("#services").offset().top - offset
    }, 2000);
});

$("#btnabt").click(function() {
    var offset = 50; //Offset of 20px
    $('html, body').animate({
        scrollTop: $("#aboutUs").offset().top - offset
    }, 2000);
});

$("#btncontact").click(function() {
	console.log("nas");
    var offset = 50; //Offset of 20px
    $('html, body').animate({
        scrollTop: $("#Contacts").offset().top - offset
    }, 2000);
});

var secheight =$(window).height() + 28;
var winheight = $(window).height();


$(".advertise").height(secheight);
$(".opacblack").height(secheight);


});