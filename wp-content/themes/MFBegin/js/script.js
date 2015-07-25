$(document).ready(function(){

// 搜索
$(".nav-search").click(function(){
	$("#main-search").slideToggle(500);
});

// 菜单
$(".nav-mobile").click(function(){
	$("#mobile-nav").slideToggle(500);
});

// 引用
$(".backs").click(function(){
	$(".track").slideToggle("slow");
	return false;
});

// 滚屏
$('.scroll-t').click(function () {
	$('html,body').animate({
		scrollTop: '0px'
	}, 800);
});
$('.scroll-c').click(function () {
	$('html,body').animate({
		scrollTop: $('.nav-single').offset().top
 	}, 800);
});
$('.scroll-b').click(function () {
	$('html,body').animate({
		scrollTop: $('.site-info').offset().top
	}, 800);
});

// 去边线
$(".message-widget li:last, .message-page li:last, .hot_commend li:last, .random-page li:last, .search-page li:last, .my-comment li:last").css("border","none");

// 表情
$('.smiley').click(function () {
	$('.smiley-box').animate({
		opacity: 'toggle',
		left: '50px'
	}, 1000).animate({
		left: '10px'
	}, 'fast');
	return false;
});

// 弹窗
$('#login-main').leanModal({
	top: 110,
	overlay: 0.6,
	closeButton: '.hidemodal'
});
$('#share-main-s').leanModal({
	top: 110,
	overlay: 0.6,
	closeButton: '.hidemodal'
});
	$('#shang-main-p').leanModal({
	top: 50,
	overlay: 0.6,
	closeButton: '.hidemodal'
});
$('#weixin-t').leanModal({
	top: 110,
	overlay: 0.6,
	closeButton: '.hidemodal'
});

// 字号
$("#fontsize").click(function() {
    var _this = $(this);
    var _t = $(".single-content");
    var _c = _this.attr("class");
    if (_c == "size_s") {
        _this.removeClass("size_s").addClass("size_l");
        _this.text("A+");
        _t.removeClass("fontsmall").addClass("fontlarge");
    } else {
        _this.removeClass("size_l").addClass("size_s");
        _this.text("A-");
        _t.removeClass("fontlarge").addClass("fontsmall");
    };
});

 // 图片数量
var i=$('.cboxElement').size();
$('.myimg').html(' '+i+' 张图片');

// 图片延迟
$(function() {
	$("img").lazyload({
        effect: "fadeIn",
		failure_limit: 150
      });
});
});
// 隐藏侧边
function pr() {
var R=document.getElementById("sidebar");
var L=document.getElementById("primary");
if (R.className=="sidebar")
	{
		R.className="sidebar-h";
		L.className="";
	}
else
	{
		R.className="sidebar";
		L.className="primary";
	}
}

// 文字滚动
(function($){$.fn.textSlider=function(settings){settings=jQuery.extend({speed:"normal",line:2,timer:1000},settings);return this.each(function(){$.fn.textSlider.scllor($(this),settings)})};$.fn.textSlider.scllor=function($this,settings){var ul=$("ul:eq(0)",$this);var timerID;var li=ul.children();var _btnUp=$(".up:eq(0)",$this);var _btnDown=$(".down:eq(0)",$this);var liHight=$(li[0]).height();var upHeight=0-settings.line*liHight;var scrollUp=function(){_btnUp.unbind("click",scrollUp);ul.animate({marginTop:upHeight},settings.speed,function(){for(i=0;i<settings.line;i++){ul.find("li:first").appendTo(ul)}ul.css({marginTop:0});_btnUp.bind("click",scrollUp)})};var scrollDown=function(){_btnDown.unbind("click",scrollDown);ul.css({marginTop:upHeight});for(i=0;i<settings.line;i++){ul.find("li:last").prependTo(ul)}ul.animate({marginTop:0},settings.speed,function(){_btnDown.bind("click",scrollDown)})};var autoPlay=function(){timerID=window.setInterval(scrollUp,settings.timer)};var autoStop=function(){window.clearInterval(timerID)};ul.hover(autoStop,autoPlay).mouseout();_btnUp.css("cursor","pointer").click(scrollUp);_btnUp.hover(autoStop,autoPlay);_btnDown.css("cursor","pointer").click(scrollDown);_btnDown.hover(autoStop,autoPlay)}})(jQuery);

// 表情
function grin(a){var d;a=" "+a+" ";if(document.getElementById("comment")&&document.getElementById("comment").type=="textarea"){d=document.getElementById("comment")}else{return false}if(document.selection){d.focus();sel=document.selection.createRange();sel.text=a;d.focus()}else{if(d.selectionStart||d.selectionStart=="0"){var c=d.selectionStart;var b=d.selectionEnd;var e=b;d.value=d.value.substring(0,c)+a+d.value.substring(b,d.value.length);e+=a.length;d.focus();d.selectionStart=e;d.selectionEnd=e}else{d.value+=a;d.focus()}}};

// 弹窗
(function(a){a.fn.extend({leanModal:function(d){var e={top:100,overlay:0.5,closeButton:null};var c=a("<div id='overlay'></div>");a("body").append(c);d=a.extend(e,d);return this.each(function(){var f=d;a(this).click(function(j){var i=a(this).attr("href");a("#overlay").click(function(){b(i)});a(f.closeButton).click(function(){b(i)});var h=a(i).outerHeight();var g=a(i).outerWidth();a("#overlay").css({"display":"block",opacity:0});a("#overlay").fadeTo(200,f.overlay);a(i).css({"display":"block","position":"fixed","opacity":0,"z-index":11000,"left":50+"%","margin-left":-(g/2)+"px","top":f.top+"px"});a(i).fadeTo(200,1);j.preventDefault()})});function b(f){a("#overlay").fadeOut(200);a(f).css({"display":"none"})}}})})(jQuery);
