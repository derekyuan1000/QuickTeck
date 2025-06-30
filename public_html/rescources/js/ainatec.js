jQuery(document).ready(function(){ 
	$(".language").hover(function(){
		$(this).addClass("language_ch");
	},function(){
		$(this).removeClass("language_ch");
	})
	
	$(".nav li").hover(function(){
		$(this).find(".navlist").stop(false,true).slideDown();
	},function(){
		$(this).find(".navlist").stop(false,true).slideUp();
	})
}); 
function showqu(object){
	if($(object).css("display") == "none"){
		$(".faq_list dd").hide();
		$(object).show();
	}else{
		$(object).hide();
	}
}