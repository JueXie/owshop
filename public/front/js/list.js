/*
@功能：列表页js
@作者：jizzp
@时间：2018年12月13日
*/

$(function(){
	$(".child h3").click(function(){
		$(this).toggleClass("on").parent().find("ul").toggle();
	});
});