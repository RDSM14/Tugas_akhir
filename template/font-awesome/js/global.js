$(document).ready(function(){function e(){$(".modal").each(function(){var e=$(this).clone().css("display","block").appendTo("body"),n=Math.round((e.height()-e.find(".modal-content").height())/2);n=n>0?n:0,e.remove(),$(this).find(".modal-content").css("margin-top",n)})}var n=$("#pull");menu=$("nav ul"),menuHeight=menu.height(),$(n).on("click",function(e){e.preventDefault(),menu.slideToggle()}),$(window).resize(function(){var e=$(window).width();e>320&&menu.is(":hidden")&&menu.removeAttr("style")}),$(".modal").on("show.bs.modal",e),$(window).on("resize",e);


	$(".showPassword").change(function(){
		if(this.checked === true) {
		   $(".password").attr("type","text");
		   $(".password").css({"font-family":"latoregular"});
		}
		else if(this.checked === false) {
			$(".password").attr("type","password");
			$(".password").css({"font-family":"Arial"});
		}
	});

});


