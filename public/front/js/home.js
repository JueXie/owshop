/*
@功能：订单页面js
@作者：jizzp
@时间：2018年12月13日
*/
$(function(){
	//左侧菜单收缩效果
	$(".menu_wrap dt").click(function(){
		$(this).siblings().toggle();
		$(this).find("b").toggleClass("off");
	});
})