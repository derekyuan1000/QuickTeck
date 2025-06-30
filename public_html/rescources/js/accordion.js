
$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
	$("#dialogWindowBin").click(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
function CloseDialog()
{
	$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});
}
function ShowDialog(obj,url)
{
	var oRect=obj.getBoundingClientRect();
	x=oRect.left;
	y=oRect.top;
	x+=20;y+=20+$(document).scrollTop();
	
	$("#dialogWindowBin").css({'left':x,'top':y});
	$("#dialogWindowBin").fadeIn(500,function()
	{
		$("#dialogWindowBin").load(url);
	}
	);
}

function acc_click(el){
	//$("ul>li>h3","#accordion").addClass("down").removeClass("up");
	//$(".up").addClass("down").removeClass("up");
	//$("ul>li>div","#accordion").hide();
    //$(el).addClass("up");
    if ($(el).attr('class') == "up") {
        $("div", $(el).parent()).hide();
        $(el).addClass("down").removeClass("up");
    } else {
        $("div", $(el).parent()).show();
        $(el).addClass("up").removeClass("down");
    }
	//$("div",$(el).parent()).show();
}