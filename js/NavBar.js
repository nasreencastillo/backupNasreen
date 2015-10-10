$(document).ready(function(){

	$(".s-toggle").click(function(){
		$("#mysearch").slideToggle("fast");
	});
	
	//--------------------------------------------Animated Scrolling---------------------------//	
	$('.nav li a').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			   if (target.length) {
				 $('html,body').animate({
					 scrollTop: target.offset().top
				}, 800);
				return false;
			}
		}
	});
//-----------------------------------------End of Animated Scrolling---------------------------//
});

	