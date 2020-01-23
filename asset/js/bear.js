$(document).ready(function(){

	$("#btn-login").click(function(){
		$("#mask").fadeIn(200);
		$("#login-cover").fadeIn(200);
	});

	$("#mask").click(function(){
		$("#mask").fadeOut(200);
		$("#login-cover").fadeOut(200);
	});

	$(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

    // $(".menu-icon").click(function(){
    //     // $("#main-menu ul").slideToggle(0);
    // });

    // menu header responsive
     $(".menu-icon").click(function(e){
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

});