<?php
/*
Template Name: 代码高亮
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<title><?php echo trim(wp_title('',0)); ?> | <?php bloginfo('name'); ?></title>
<meta name="description" content="在线代码高亮转换" />
<meta name="keywords" content="在线代码高亮转换,代码高亮,代码着色" />
<style type="text/css">
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
}
html {
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
}
/** 全局 **/
body,
button,
input,
select,
textarea {
	font: 14px "Microsoft YaHei", 微软雅黑, Helvetica, Arial, Lucida Grande,Tahoma,sans-serif;
	color: #444;
	line-height:160%;
	background: #f2f2f2;
}
a {
	color: #000;
	text-decoration: none;
}
textarea {
	background: #fff;
	border: 1px solid #ccc;
}
#wrapper {
	width: 980px;
	margin: 10px auto;
	padding: 5px;
}
#header {
	height: 40px;
}
#header h1{
	font-size: 16px;
}
#main {
}
#main_box {
	background: #fff;
	margin: 10px 0 20px 0;
	padding: 10px;
	border: 1px solid #ccc;
}
#main_box h2 {
	font-size: 14px;
	margin: 0 0 5px 10px;
}
#main_box p {
	color: #3b8dbd;
	margin: 0 0 5px 10px;
}
.options {
	margin: 0 0 0 20px;
}
.options_no {
	display: none;
}
.render {
	margin: 0 0 0 370px;
}
button {
	color: #fff;
	padding: 0 8px;
	background: #3b8dbd;
	border: 1px solid #3b8dbd;
	cursor:pointer;
	border-radius: 2px;
}
#preview {
	margin: 0 0 50px 0;
	color:#fff;
	width: 100%;
	height: 100%
}
.dp-highlighter {
	border: 1px solid #B9B9B9;
}
#footer {
}
#copyright {
	text-align: center;
	margin:10px 0 10px 0;
}
/* 代码 style*/
.dp-highlighter {
	font: 14px "Microsoft YaHei", 微软雅黑, Helvetica, Arial, Lucida Grande,Tahoma,sans-serif;
	background: #fff;
	border: 1px solid #e8e8e8;
	width: 99%;
	word-break: break-all;
	white-space: normal;
	overflow: auto;
	margin: 0px auto
}
.dp-highlighter .bar {
	padding: 2px
}
.dp-highlighter .collapsed .bar,.dp-highlighter .nogutter .bar {
	padding-left: 0px
}
.dp-highlighter ol {
	margin: 0px 0px 1px 32px;/* 1px bottom margin seems to fix occasional Firefox scrolling */
	padding: 2px;
	color: #666
}
.dp-highlighter.nogutter ol {
	list-style-type: none;
	margin-left: 0px
}
.dp-highlighter ol li,.dp-highlighter .columns div {
/*background-color: #fff;*/
	border-left: 2px solid #0196e3;
	padding-left: 10px;
	line-height: 18px
}
.dp-highlighter .nogutter ol li,.dp-highlighter .nogutter .columns div {
	border:0
}
.dp-highlighter .columns {
	color:gray;
	width:100%
}
.dp-highlighter .columns div {
	padding-bottom: 5px
}
.dp-highlighter ol li.alt {
/*background-color: #f8f8f8;*/}
.dp-highlighter ol li span {
	color: Black
}
/* Adjust some properties when collapsed */
.dp-highlighter .collapsed ol {
	margin: 0px
}
.dp-highlighter .collapsed ol li {
	display: none
}
/* Additional modifications when in print-view */
.dp-highlighter .printing {
	border: none
}
.dp-highlighter .printing .tools {
	display: none !important
}
.dp-highlighter .printing li {
	display: list-item !important
}
/* Styles for the tools */
.dp-highlighter .tools {
	padding: 3px 8px 3px 15px;
	border-bottom: 1px solid #2B91AF;
	font: 14px "Microsoft YaHei", 微软雅黑, Helvetica, Arial, Lucida Grande,Tahoma,sans-serif;
	color: silver
}
.dp-highlighter .collapsed .tools {
	border-bottom: 0
}
.dp-highlighter .tools a {
	font-size: 9pt;
	color: gray;
	text-decoration: none;
	margin-right: 10px
}
.dp-highlighter .tools a:hover {
	color: red;
	text-decoration: underline
}
/* About dialog styles */
.dp-about {
	background-color:# fff;
	margin: 0px;
	padding: 0px
}
.dp-about table {
	width: 100%;
	height: 100%;
	font: 14px "Microsoft YaHei", 微软雅黑, Helvetica, Arial, Lucida Grande,Tahoma,sans-serif;
}
.dp-about td {
	padding: 10px;
	vertical-align: top
}
.dp-about .copy {
	border-bottom: 1px solid #ACA899;
	height: 95%
}
.dp-about .title {
	color: red;
	font-weight: bold
}
.dp-about .para {
	margin:0 0 4px 0
}
.dp-about .footer {
	background-color: #ECEADB;
	border-top: 1px solid #fff;
	text-align: right
}
.dp-about .close { 
	font: 14px "Microsoft YaHei", 微软雅黑, Helvetica, Arial, Lucida Grande,Tahoma,sans-serif;
	background-color: #ECEADB;
	width: 60px;
	height: 22px
}
/* Language specific styles */
.dp-c {}
.dp-c .comment {
	color: green
}
.dp-c .string {
	color: blue
}
.dp-c .preprocessor {
	color: gray
}
.dp-c .keyword {
	color: blue
}
.dp-c .vars {
	color: #d00
}
.dp-vb{}
.dp-vb .comment {
	color: green
}
.dp-vb .string {
	color: blue
}
.dp-vb .preprocessor {
	color: gray
}
.dp-vb .keyword {
	color: blue
}
.dp-sql{}
.dp-sql .comment {
	color: green
}
.dp-sql .string {
	color: red
}
.dp-sql .keyword {
	color: rgb(127,0,85)
}
.dp-sql .func {
	color: #ff1493
}
.dp-sql .op{
	color:blue
}
.dp-xml {}
.dp-xml .cdata {
	color: #ff1493
}
.dp-xml .comments {
	color: green
}
.dp-xml .tag {
	font-weight: bold;
	color: blue
}
.dp-xml .tag-name {
	color: rgb(127,0,85);
	font-weight: bold
}
.dp-xml .attribute {
	color: red
}
.dp-xml .attribute-value {
	color: blue
}
.dp-delphi {}
.dp-delphi .comment {
	color: #008200;
	font-style: italic
}
.dp-delphi .string {
	color: blue
}
.dp-delphi .number {
	color: blue
}
.dp-delphi .directive {
	color: #008284
}
.dp-delphi .keyword {
	font-weight: bold;
	color: navy
}
.dp-delphi .vars {
	color: #000
}
.dp-py {}
.dp-py .comment {
	color: green
}
.dp-py .string {
	color: red
}
.dp-py .docstring {
	color: green
}
.dp-py .keyword {
	color: blue;
	font-weight: bold
}
.dp-py .builtins {
	color: #ff1493
}
.dp-py .magicmethods {
	color: #808080
}
.dp-py .exceptions {
	color: brown
}
.dp-py .types {
	color: brown;
	font-style: italic
}
.dp-py .commonlibs {
	color: #8A2BE2;
	font-style: italic
}
.dp-rb{}
.dp-rb .comment {
	color: #c00
}
.dp-rb .string {
	color: #f0c
}
.dp-rb .symbol {
	color: #02b902
}
.dp-rb .keyword {
	color: #069
}
.dp-rb .variable {
	color: #6cf
}
.dp-css {}
.dp-css .comment {
	color: green
}
.dp-css .string {
	color: red
}
.dp-css .keyword {
	color: blue
}
.dp-css .colors {
	color: darkred
}
.dp-css .vars {
	color: #d00
}
.dp-j {}
.dp-j .comment {
	color: rgb(63,127,95)
}
.dp-j .string {
	color: rgb(42,0,255)
}
.dp-j .keyword {
	color: rgb(127,0,85);
	font-weight: bold
}
.dp-j .annotation {
	color: #646464
}
.dp-j .number {
	color: #C00000
}
.dp-cpp {}
.dp-cpp .comment {
	color: #e00
}
.dp-cpp .string {
	color: red
}
.dp-cpp .preprocessor {
	color: #CD00CD;
	font-weight: bold
}
.dp-cpp .keyword {
	color: #5697D9;
	font-weight: bold
}
.dp-cpp .datatypes {
	color: #2E8B57;
	font-weight: bold
}
.dp-perl{}
.dp-perl .comment {
	color: green
}
.dp-perl .string {
	color: red
}
.dp-perl .keyword {
	color: rgb(127,0,85)
}
.dp-perl .func {
	color: #ff1493
}
.dp-perl .declarations {
	color: blue
}
.dp-css .vars {
	color: #d00
}
.dp-g {}
.dp-g .comment {
	color: rgb(63,127,95)
}
.dp-g .string {
	color: rgb(42,0,255)
}
.dp-g .keyword {
	color: rgb(127,0,85);
	font-weight: bold
}
.dp-g .type {
	color: rgb(0,127,0);
	font-weight: bold
}
.dp-g .modifier {
	color: rgb(100,0,100);
	font-weight: bold
}
.dp-g .constant {
	color: rgb(255,0,0);
	font-weight: bold
}
.dp-g .method {
	color: rgb(255,96,0);
	font-weight: bold
}
.dp-g .number {
	color: #C00000
}
</style>
<script type="text/javascript">
var dp={sh:{Toolbar:{},Utils:{},RegexLib:{},Brushes:{},Strings:{},Version:"1.4.1"}};dp.sh.Strings={AboutDialog:"<html><head><title>About...</title></head><body class=\"dp-about\"><table cellspacing=\"0\"><tr><td class=\"copy\"><p class=\"title\">dp.SyntaxHighlighter</div><div class=\"para\">Version: {V}</p><p><a href=\"http://www.dreamprojections.com/syntaxhighlighter/?ref=about\" target=\"_blank\">http://www.dreamprojections.com/SyntaxHighlighter</a></p>&copy;2004-2005 Alex Gorbatchev. All right reserved.</td></tr><tr><td class=\"footer\"><input type=\"button\" class=\"close\" value=\"OK\" onClick=\"window.close()\"/></td></tr></table></body></html>"};dp.SyntaxHighlighter=dp.sh;dp.sh.Toolbar.Commands={ExpandSource:{label:"+ expand source",check:function(_1){return _1.collapse;},func:function(_2,_3){_2.parentNode.removeChild(_2);_3.div.className=_3.div.className.replace("collapsed","");}},ViewSource:{label:"View",func:function(_4,_5){var _6=_5.originalCode.replace(/</g,"&lt;");var _7=window.open("","_blank","width=750, height=400, location=0, resizable=1, menubar=0, scrollbars=1");_7.document.write("<textarea style=\"width:99%;height:99%\">"+_6+"</textarea>");_7.document.close();}},CopyToClipboard:{label:"Copy",check:function(){return window.clipboardData!=null;},func:function(_8,_9){window.clipboardData.setData("text",_9.originalCode);alert("The code is in your clipboard now");}},PrintSource:{label:"Print",func:function(_a,_b){var _c=document.createElement("IFRAME");var _d=null;_c.style.cssText="position:absolute;width:0px;height:0px;left:-500px;top:-500px;";document.body.appendChild(_c);_d=_c.contentWindow.document;dp.sh.Utils.CopyStyles(_d,window.document);_d.write("<div class=\""+_b.div.className.replace("collapsed","")+" printing\">"+_b.div.innerHTML+"</div>");_d.close();_c.contentWindow.focus();_c.contentWindow.print();alert("Printing...");document.body.removeChild(_c);}},About:{label:"",func:function(_e){var _f=window.open("","_blank","dialog,width=300,height=150,scrollbars=0");var doc=_f.document;dp.sh.Utils.CopyStyles(doc,window.document);doc.write(dp.sh.Strings.AboutDialog.replace("{V}",dp.sh.Version));doc.close();_f.focus();}}};dp.sh.Toolbar.Create=function(_11){var div=document.createElement("DIV");div.className="tools";div.innerHTML='<b style="color:#000;">Code</b>&nbsp;&nbsp;&nbsp;';for(var _13 in dp.sh.Toolbar.Commands){var cmd=dp.sh.Toolbar.Commands[_13];if(cmd.check!=null&&!cmd.check(_11)){continue;}div.innerHTML+="<a href=\"#\" onclick=\"dp.sh.Toolbar.Command('"+_13+"',this);return false;\">"+cmd.label+"</a>";}return div;};dp.sh.Toolbar.Command=function(_15,_16){var n=_16;while(n!=null&&n.className.indexOf("dp-highlighter")==-1){n=n.parentNode;}if(n!=null){dp.sh.Toolbar.Commands[_15].func(_16,n.highlighter);}};dp.sh.Utils.CopyStyles=function(_18,_19){var _1a=_19.getElementsByTagName("link");for(var i=0;i<_1a.length;i++){if(_1a[i].rel.toLowerCase()=="stylesheet"){_18.write("<link type=\"text/css\" rel=\"stylesheet\" href=\""+_1a[i].href+"\"></link>");}}};dp.sh.RegexLib={MultiLineCComments:new RegExp("/\\*[\\s\\S]*?\\*/","gm"),SingleLineCComments:new RegExp("//.*$","gm"),SingleLinePerlComments:new RegExp("#.*$","gm"),DoubleQuotedString:new RegExp("\"(?:\\.|(\\\\\\\")|[^\\\"\"])*\"","g"),SingleQuotedString:new RegExp("'(?:\\.|(\\\\\\'))*'","g")};dp.sh.Match=function(_1c,_1d,css){this.value=_1c;this.index=_1d;this.length=_1c.length;this.css=css;};dp.sh.Highlighter=function(){this.noGutter=false;this.addControls=true;this.collapse=false;this.tabsToSpaces=true;this.wrapColumn=80;this.showColumns=true;};dp.sh.Highlighter.SortCallback=function(m1,m2){if(m1.index<m2.index){return -1;}else{if(m1.index>m2.index){return 1;}else{if(m1.length<m2.length){return -1;}else{if(m1.length>m2.length){return 1;}}}}return 0;};dp.sh.Highlighter.prototype.CreateElement=function(_21){var _22=document.createElement(_21);_22.highlighter=this;return _22;};dp.sh.Highlighter.prototype.GetMatches=function(_23,css){var _25=0;var _26=null;while((_26=_23.exec(this.code))!=null){this.matches[this.matches.length]=new dp.sh.Match(_26[0],_26.index,css);}};dp.sh.Highlighter.prototype.AddBit=function(str,css){if(str==null||str.length==0){return;}var _29=this.CreateElement("SPAN");str=str.replace(/&/g,"&amp;");str=str.replace(/ /g,"&nbsp;");str=str.replace(/</g,"&lt;");str=str.replace(/\n/gm,"&nbsp;<br>");if(css!=null){var _2a=new RegExp("<br>","gi");if(_2a.test(str)){var _2b=str.split("&nbsp;<br>");str="";for(var i=0;i<_2b.length;i++){_29=this.CreateElement("SPAN");_29.className=css;_29.innerHTML=_2b[i];this.div.appendChild(_29);if(i+1<_2b.length){this.div.appendChild(this.CreateElement("BR"));}}}else{_29.className=css;_29.innerHTML=str;this.div.appendChild(_29);}}else{_29.innerHTML=str;this.div.appendChild(_29);}};dp.sh.Highlighter.prototype.IsInside=function(_2d){if(_2d==null||_2d.length==0){return false;}for(var i=0;i<this.matches.length;i++){var c=this.matches[i];if(c==null){continue;}if((_2d.index>c.index)&&(_2d.index<c.index+c.length)){return true;}}return false;};dp.sh.Highlighter.prototype.ProcessRegexList=function(){for(var i=0;i<this.regexList.length;i++){this.GetMatches(this.regexList[i].regex,this.regexList[i].css);}};dp.sh.Highlighter.prototype.ProcessSmartTabs=function(_31){var _32=_31.split("\n");var _33="";var _34=4;var tab="\t";function InsertSpaces(_36,pos,_38){var _39=_36.substr(0,pos);var _3a=_36.substr(pos+1,_36.length);var _3b="";for(var i=0;i<_38;i++){_3b+=" ";}return _39+_3b+_3a;}function ProcessLine(_3d,_3e){if(_3d.indexOf(tab)==-1){return _3d;}var pos=0;while((pos=_3d.indexOf(tab))!=-1){var _40=_3e-pos%_3e;_3d=InsertSpaces(_3d,pos,_40);}return _3d;}for(var i=0;i<_32.length;i++){_33+=ProcessLine(_32[i],_34)+"\n";}return _33;};dp.sh.Highlighter.prototype.SwitchToList=function(){var _42=this.div.innerHTML.replace(/<(br)\/?>/gi,"\n");var _43=_42.split("\n");if(this.addControls==true){this.bar.appendChild(dp.sh.Toolbar.Create(this));}if(this.showColumns){var div=this.CreateElement("div");var _45=this.CreateElement("div");var _46=10;var i=1;while(i<=150){if(i%_46==0){div.innerHTML+=i;i+=(i+"").length;}else{div.innerHTML+="&middot;";i++;}}_45.className="columns";_45.appendChild(div);this.bar.appendChild(_45);}for(var i=0,lineIndex=this.firstLine;i<_43.length-1;i++,lineIndex++){var li=this.CreateElement("LI");var _4a=this.CreateElement("SPAN");li.className=(i%2==0)?"alt":"";_4a.innerHTML=_43[i]+"&nbsp;";li.appendChild(_4a);this.ol.appendChild(li);}this.div.innerHTML="";};dp.sh.Highlighter.prototype.Highlight=function(_4b){function Trim(str){return str.replace(/^\s*(.*?)[\s\n]*$/g,"$1");}function Chop(str){return str.replace(/\n*$/,"").replace(/^\n*/,"");}function Unindent(str){var _4f=str.split("\n");var _50=new Array();var _51=new RegExp("^\\s*","g");var min=1000;for(var i=0;i<_4f.length&&min>0;i++){if(Trim(_4f[i]).length==0){continue;}var _54=_51.exec(_4f[i]);if(_54!=null&&_54.length>0){min=Math.min(_54[0].length,min);}}if(min>0){for(var i=0;i<_4f.length;i++){_4f[i]=_4f[i].substr(min);}}return _4f.join("\n");}function Copy(_56,_57,_58){return _56.substr(_57,_58-_57);}var pos=0;this.originalCode=_4b;this.code=Chop(Unindent(_4b));this.div=this.CreateElement("DIV");this.bar=this.CreateElement("DIV");this.ol=this.CreateElement("OL");this.matches=new Array();this.div.className="dp-highlighter";this.div.highlighter=this;this.bar.className="bar";this.ol.start=this.firstLine;if(this.CssClass!=null){this.ol.className=this.CssClass;}if(this.collapse){this.div.className+=" collapsed";}if(this.noGutter){this.div.className+=" nogutter";}if(this.tabsToSpaces==true){this.code=this.ProcessSmartTabs(this.code);}this.ProcessRegexList();if(this.matches.length==0){this.AddBit(this.code,null);this.SwitchToList();this.div.appendChild(this.ol);return;}this.matches=this.matches.sort(dp.sh.Highlighter.SortCallback);for(var i=0;i<this.matches.length;i++){if(this.IsInside(this.matches[i])){this.matches[i]=null;}}for(var i=0;i<this.matches.length;i++){var _5c=this.matches[i];if(_5c==null||_5c.length==0){continue;}this.AddBit(Copy(this.code,pos,_5c.index),null);this.AddBit(_5c.value,_5c.css);pos=_5c.index+_5c.length;}this.AddBit(this.code.substr(pos),null);this.SwitchToList();this.div.appendChild(this.bar);this.div.appendChild(this.ol);};dp.sh.Highlighter.prototype.GetKeywords=function(str){return "\\b"+str.replace(/ /g,"\\b|\\b")+"\\b";};dp.sh.HighlightAll=function(_5e,_5f,_60,_61,_62,_63){function FindValue(){var a=arguments;for(var i=0;i<a.length;i++){if(a[i]==null){continue;}if(typeof (a[i])=="string"&&a[i]!=""){return a[i]+"";}if(typeof (a[i])=="object"&&a[i].value!=""){return a[i].value+"";}}return null;}function IsOptionSet(_66,_67){for(var i=0;i<_67.length;i++){if(_67[i]==_66){return true;}}return false;}function GetOptionValue(_69,_6a,_6b){var _6c=new RegExp("^"+_69+"\\[(\\w+)\\]$","gi");var _6d=null;for(var i=0;i<_6a.length;i++){if((_6d=_6c.exec(_6a[i]))!=null){return _6d[1];}}return _6b;}var _6f=document.getElementsByName(_5e);var _70=null;var _71=new Object();var _72="value";if(_6f==null){return;}for(var _73 in dp.sh.Brushes){var _74=dp.sh.Brushes[_73].Aliases;if(_74==null){continue;}for(var i=0;i<_74.length;i++){_71[_74[i]]=_73;}}for(var i=0;i<_6f.length;i++){var _77=_6f[i];var _78=FindValue(_77.attributes["class"],_77.className,_77.attributes["language"],_77.language);var _79="";if(_78==null){continue;}_78=_78.split(":");_79=_78[0].toLowerCase();if(_71[_79]==null){continue;}_70=new dp.sh.Brushes[_71[_79]]();_77.style.display="none";_70.noGutter=(_5f==null)?IsOptionSet("nogutter",_78):!_5f;_70.addControls=(_60==null)?!IsOptionSet("nocontrols",_78):_60;_70.collapse=(_61==null)?IsOptionSet("collapse",_78):_61;_70.showColumns=(_63==null)?IsOptionSet("showcolumns",_78):_63;_70.firstLine=(_62==null)?parseInt(GetOptionValue("firstline",_78,1)):_62;_70.Highlight(_77[_72]);_77.parentNode.insertBefore(_70.div,_77);}};
dp.sh.Brushes.Ruby=function(){var keywords='alias and BEGIN begin break case class def define_method defined do each else elsif '+'END end ensure false for if in module new next nil not or raise redo rescue retry return '+'self super then throw true undef unless until when while yield';var builtins='Array Bignum Binding Class Continuation Dir Exception FalseClass File::Stat File Fixnum Fload '+'Hash Integer IO MatchData Method Module NilClass Numeric Object Proc Range Regexp String Struct::TMS Symbol '+'ThreadGroup Thread Time TrueClass';this.regexList=[{regex:dp.sh.RegexLib.SingleLinePerlComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp(':[a-z][A-Za-z0-9_]*','g'),css:'symbol'},{regex:new RegExp('[\\$|@|@@]\\w+','g'),css:'variable'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'},{regex:new RegExp(this.GetKeywords(builtins),'gm'),css:'builtin'}];this.CssClass='dp-rb';};dp.sh.Brushes.Ruby.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Ruby.Aliases=['ruby','rails'];
dp.sh.Brushes.Cpp=function(){var datatypes='ATOM BOOL BOOLEAN BYTE CHAR COLORREF DWORD DWORDLONG DWORD_PTR '+'DWORD32 DWORD64 FLOAT HACCEL HALF_PTR HANDLE HBITMAP HBRUSH '+'HCOLORSPACE HCONV HCONVLIST HCURSOR HDC HDDEDATA HDESK HDROP HDWP '+'HENHMETAFILE HFILE HFONT HGDIOBJ HGLOBAL HHOOK HICON HINSTANCE HKEY '+'HKL HLOCAL HMENU HMETAFILE HMODULE HMONITOR HPALETTE HPEN HRESULT '+'HRGN HRSRC HSZ HWINSTA HWND INT INT_PTR INT32 INT64 LANGID LCID LCTYPE '+'LGRPID LONG LONGLONG LONG_PTR LONG32 LONG64 LPARAM LPBOOL LPBYTE LPCOLORREF '+'LPCSTR LPCTSTR LPCVOID LPCWSTR LPDWORD LPHANDLE LPINT LPLONG LPSTR LPTSTR '+'LPVOID LPWORD LPWSTR LRESULT PBOOL PBOOLEAN PBYTE PCHAR PCSTR PCTSTR PCWSTR '+'PDWORDLONG PDWORD_PTR PDWORD32 PDWORD64 PFLOAT PHALF_PTR PHANDLE PHKEY PINT '+'PINT_PTR PINT32 PINT64 PLCID PLONG PLONGLONG PLONG_PTR PLONG32 PLONG64 POINTER_32 '+'POINTER_64 PSHORT PSIZE_T PSSIZE_T PSTR PTBYTE PTCHAR PTSTR PUCHAR PUHALF_PTR '+'PUINT PUINT_PTR PUINT32 PUINT64 PULONG PULONGLONG PULONG_PTR PULONG32 PULONG64 '+'PUSHORT PVOID PWCHAR PWORD PWSTR SC_HANDLE SC_LOCK SERVICE_STATUS_HANDLE SHORT '+'SIZE_T SSIZE_T TBYTE TCHAR UCHAR UHALF_PTR UINT UINT_PTR UINT32 UINT64 ULONG '+'ULONGLONG ULONG_PTR ULONG32 ULONG64 USHORT USN VOID WCHAR WORD WPARAM WPARAM WPARAM '+'char bool short int __int32 __int64 __int8 __int16 long float double __wchar_t '+'clock_t _complex _dev_t _diskfree_t div_t ldiv_t _exception _EXCEPTION_POINTERS '+'FILE _finddata_t _finddatai64_t _wfinddata_t _wfinddatai64_t __finddata64_t '+'__wfinddata64_t _FPIEEE_RECORD fpos_t _HEAPINFO _HFILE lconv intptr_t '+'jmp_buf mbstate_t _off_t _onexit_t _PNH ptrdiff_t _purecall_handler '+'sig_atomic_t size_t _stat __stat64 _stati64 terminate_function '+'time_t __time64_t _timeb __timeb64 tm uintptr_t _utimbuf '+'va_list wchar_t wctrans_t wctype_t wint_t signed';var keywords='break case catch class const __finally __exception __try '+'const_cast continue private public protected __declspec '+'default delete deprecated dllexport dllimport do dynamic_cast '+'else enum explicit extern if for friend goto inline '+'mutable naked namespace new noinline noreturn nothrow '+'register reinterpret_cast return selectany '+'sizeof static static_cast struct switch template this '+'thread throw true false try typedef typeid typename union '+'using uuid virtual void volatile whcar_t while';this.regexList=[{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('^ *#.*','gm'),css:'preprocessor'},{regex:new RegExp(this.GetKeywords(datatypes),'gm'),css:'datatypes'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-cpp';};dp.sh.Brushes.Cpp.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Cpp.Aliases=['cpp','c','c++'];
dp.sh.Brushes.CSharp=function(){var keywords='abstract as base bool break byte case catch char checked class const '+'continue decimal default delegate do double else enum event explicit '+'extern false finally fixed float for foreach get goto if implicit in int '+'interface internal is lock long namespace new null object operator out '+'override params private protected public readonly ref return sbyte sealed set '+'short sizeof stackalloc static string struct switch this throw true try '+'typeof uint ulong unchecked unsafe ushort using virtual void while';this.regexList=[{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('^\\s*#.*','gm'),css:'preprocessor'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-c';};dp.sh.Brushes.CSharp.prototype=new dp.sh.Highlighter();dp.sh.Brushes.CSharp.Aliases=['c#','c-sharp','csharp'];
dp.sh.Brushes.CSS=function(){var keywords='ascent azimuth background-attachment background-color background-image background-position '+'background-repeat background baseline bbox border-collapse border-color border-spacing border-style border-top '+'border-right border-bottom border-left border-top-color border-right-color border-bottom-color border-left-color '+'border-top-style border-right-style border-bottom-style border-left-style border-top-width border-right-width '+'border-bottom-width border-left-width border-width border bottom cap-height caption-side centerline clear clip color '+'content counter-increment counter-reset cue-after cue-before cue cursor definition-src descent direction display '+'elevation empty-cells float font-size-adjust font-family font-size font-stretch font-style font-variant font-weight font '+'height letter-spacing line-height list-style-image list-style-position list-style-type list-style margin-top '+'margin-right margin-bottom margin-left margin marker-offset marks mathline max-height max-width min-height min-width orphans '+'outline-color outline-style outline-width outline overflow padding-top padding-right padding-bottom padding-left padding page '+'page-break-after page-break-before page-break-inside pause pause-after pause-before pitch pitch-range play-during position '+'quotes richness right size slope src speak-header speak-numeral speak-punctuation speak speech-rate stemh stemv stress '+'table-layout text-align text-decoration text-indent text-shadow text-transform unicode-bidi unicode-range units-per-em '+'vertical-align visibility voice-family volume white-space widows width widths word-spacing x-height z-index';var values='above absolute all always aqua armenian attr aural auto avoid baseline behind below bidi-override black blink block blue bold bolder '+'both bottom braille capitalize caption center center-left center-right circle close-quote code collapse compact condensed '+'continuous counter counters crop cross crosshair cursive dashed decimal decimal-leading-zero default digits disc dotted double '+'embed embossed e-resize expanded extra-condensed extra-expanded fantasy far-left far-right fast faster fixed format fuchsia '+'gray green groove handheld hebrew help hidden hide high higher icon inline-table inline inset inside invert italic '+'justify landscape large larger left-side left leftwards level lighter lime line-through list-item local loud lower-alpha '+'lowercase lower-greek lower-latin lower-roman lower low ltr marker maroon medium message-box middle mix move narrower '+'navy ne-resize no-close-quote none no-open-quote no-repeat normal nowrap n-resize nw-resize oblique olive once open-quote outset '+'outside overline pointer portrait pre print projection purple red relative repeat repeat-x repeat-y rgb ridge right right-side '+'rightwards rtl run-in screen scroll semi-condensed semi-expanded separate se-resize show silent silver slower slow '+'small small-caps small-caption smaller soft solid speech spell-out square s-resize static status-bar sub super sw-resize '+'table-caption table-cell table-column table-column-group table-footer-group table-header-group table-row table-row-group teal '+'text-bottom text-top thick thin top transparent tty tv ultra-condensed ultra-expanded underline upper-alpha uppercase upper-latin '+'upper-roman url visible wait white wider w-resize x-fast x-high x-large x-loud x-low x-slow x-small x-soft xx-large xx-small yellow';var fonts='[mM]onospace [tT]ahoma [vV]erdana [aA]rial [hH]elvetica [sS]ans-serif [sS]erif';this.regexList=[{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('\\#[a-zA-Z0-9]{3,6}','g'),css:'colors'},{regex:new RegExp('(\\d+)(px|pt|\:)','g'),css:'string'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'},{regex:new RegExp(this.GetKeywords(values),'g'),css:'string'},{regex:new RegExp(this.GetKeywords(fonts),'g'),css:'string'}];this.CssClass='dp-css';};dp.sh.Brushes.CSS.prototype=new dp.sh.Highlighter();dp.sh.Brushes.CSS.Aliases=['css'];
dp.sh.Brushes.Java=function(){var keywords='abstract assert boolean break byte case catch char class const '+'continue default do double else enum extends '+'false final finally float for goto if implements import '+'instanceof int interface long native new null '+'package private protected public return '+'short static strictfp super switch synchronized this throw throws true '+'transient try void volatile while';this.regexList=[{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('\\b([\\d]+(\\.[\\d]+)?|0x[a-f0-9]+)\\b','gi'),css:'number'},{regex:new RegExp('(?!\\@interface\\b)\\@[\\$\\w]+\\b','g'),css:'annotation'},{regex:new RegExp('\\@interface\\b','g'),css:'keyword'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-j';};dp.sh.Brushes.Java.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Java.Aliases=['java'];
dp.sh.Brushes.JScript=function(){var keywords='abstract boolean break byte case catch char class const continue debugger '+'default delete do double else enum export extends false final finally float '+'for function goto if implements import in instanceof int interface long native '+'new null package private protected public return short static super switch '+'synchronized this throw throws transient true try typeof var void volatile while with';this.regexList=[{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('^\\s*#.*','gm'),css:'preprocessor'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-c';};dp.sh.Brushes.JScript.prototype=new dp.sh.Highlighter();dp.sh.Brushes.JScript.Aliases=['js','jscript','javascript'];
dp.sh.Brushes.Python=function(){var keywords='and assert break class continue def del elif else except exec '+'finally for from global if import in is lambda not or object pass print '+'raise return try yield while';var builtins='self __builtin__ __dict__ __future__ __methods__ __members__ __author__ __email__ __version__'+'__class__ __bases__ __import__ __main__ __name__ __doc__ __self__ __debug__ __slots__ '+'abs append apply basestring bool buffer callable chr classmethod clear close cmp coerce compile complex '+'conjugate copy count delattr dict dir divmod enumerate Ellipsis eval execfile extend False file fileno filter float flush '+'get getattr globals has_key hasarttr hash hex id index input insert int intern isatty isinstance isubclass '+'items iter keys len list locals long map max min mode oct open ord pop pow property range '+'raw_input read readline readlines reduce reload remove repr reverse round seek setattr slice sum '+'staticmethod str super tell True truncate tuple type unichr unicode update values write writelines xrange zip';var magicmethods='__abs__ __add__ __and__ __call__ __cmp__ __coerce__ __complex__ __concat__ __contains__ __del__ __delattr__ __delitem__ '+'__delslice__ __div__ __divmod__ __float__ __getattr__ __getitem__ __getslice__ __hash__ __hex__ __eq__ __le__ __lt__ __gt__ __ge__ '+'__iadd__ __isub__ __imod__ __idiv__ __ipow__ __iand__ __ior__ __ixor__ __ilshift__ __irshift__ '+'__invert__ __init__ __int__ __inv__ __iter__ __len__ __long__ __lshift__ __mod__ __mul__ __new__ __neg__ __nonzero__ __oct__ __or__ '+'__pos__ __pow__ __radd__ __rand__ __rcmp__ __rdiv__ __rdivmod__ __repeat__ __repr__ __rlshift__ __rmod__ __rmul__ '+'__ror__ __rpow__ __rrshift__ __rshift__ __rsub__ __rxor__ __setattr__ __setitem__ __setslice__ __str__ __sub__ __xor__';var exceptions='Exception StandardError ArithmeticError LookupError EnvironmentError AssertionError AttributeError EOFError '+'FutureWarning IndentationError OverflowWarning PendingDeprecationWarning ReferenceError RuntimeWarning '+'SyntaxWarning TabError UnicodeDecodeError UnicodeEncodeError UnicodeTranslateError UserWarning Warning '+'IOError ImportError IndexError KeyError KeyboardInterrupt MemoryError NameError NotImplementedError OSError '+'RuntimeError StopIteration SyntaxError SystemError SystemExit TypeError UnboundLocalError UnicodeError ValueError '+'FloatingPointError OverflowError WindowsError ZeroDivisionError';var types='NoneType TypeType IntType LongType FloatType ComplexType StringType UnicodeType BufferType TupleType ListType '+'DictType FunctionType LambdaType CodeType ClassType UnboundMethodType InstanceType MethodType BuiltinFunctionType BuiltinMethodType '+'ModuleType FileType XRangeType TracebackType FrameType SliceType EllipsisType';var commonlibs='anydbm array asynchat asyncore AST base64 binascii binhex bisect bsddb buildtools bz2 '+'BaseHTTPServer Bastion calendar cgi cmath cmd codecs codeop commands compiler copy copy_reg '+'cPickle crypt cStringIO csv curses Carbon CGIHTTPServer ConfigParser Cookie datetime dbhash '+'dbm difflib dircache distutils doctest DocXMLRPCServer email encodings errno exceptions fcntl '+'filecmp fileinput ftplib gc gdbm getopt getpass glob gopherlib gzip heapq htmlentitydefs '+'htmllib httplib HTMLParser imageop imaplib imgfile imghdr imp inspect itertools jpeg keyword '+'linecache locale logging mailbox mailcap marshal math md5 mhlib mimetools mimetypes mimify mmap '+'mpz multifile mutex MimeWriter netrc new nis nntplib nsremote operator optparse os parser pickle pipes '+'popen2 poplib posix posixfile pprint preferences profile pstats pwd pydoc pythonprefs quietconsole '+'quopri Queue random re readline resource rexec rfc822 rgbimg sched select sets sgmllib sha shelve shutil '+'signal site smtplib socket stat statcache string struct symbol sys syslog SimpleHTTPServer '+'SimpleXMLRPCServer SocketServer StringIO tabnanny tarfile telnetlib tempfile termios textwrap '+'thread threading time timeit token tokenize traceback tty types Tkinter unicodedata unittest '+'urllib urllib2 urlparse user UserDict UserList UserString warnings weakref webbrowser whichdb '+'xml xmllib xmlrpclib xreadlines zipfile zlib';this.regexList=[{regex:new RegExp('#.*$','gm'),css:'comment'},{regex:new RegExp('"""(.|\n)*?"""','gm'),css:'string'},{regex:new RegExp("'''(.|\n)*?'''",'gm'),css:'string'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'},{regex:new RegExp(this.GetKeywords(builtins),'gm'),css:'builtins'},{regex:new RegExp(this.GetKeywords(magicmethods),'gm'),css:'magicmethods'},{regex:new RegExp(this.GetKeywords(exceptions),'gm'),css:'exceptions'},{regex:new RegExp(this.GetKeywords(types),'gm'),css:'types'},{regex:new RegExp(this.GetKeywords(commonlibs),'gm'),css:'commonlibs'}];this.CssClass='dp-py';};dp.sh.Brushes.Python.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Python.Aliases=['py','python'];
dp.sh.Brushes.Sql=function(){var funcs='abs avg case cast coalesce convert count current_timestamp '+'current_user day isnull left lower month nullif replace right '+'session_user space substring sum system_user upper user year';var keywords='absolute action add after alter as asc at authorization begin bigint '+'binary bit by cascade char character check checkpoint close collate '+'column commit committed connect connection constraint contains continue '+'create cube current current_date current_time cursor database date '+'deallocate dec decimal declare default delete desc distinct double drop '+'dynamic else end end-exec escape except exec execute false fetch first '+'float for force foreign forward free from full function global goto grant '+'group grouping having hour ignore index inner insensitive insert instead '+'int integer intersect into is isolation key last level load local max min '+'minute modify move name national nchar next no numeric of off on only '+'open option order out output partial password precision prepare primary '+'prior privileges procedure public read real references relative repeatable '+'restrict return returns revoke rollback rollup rows rule schema scroll '+'second section select sequence serializable set size smallint static '+'statistics table temp temporary then time timestamp to top transaction '+'translation trigger true truncate uncommitted union unique update values '+'varchar varying view when where with work';var operators='all and any between cross in join like not null or outer some';this.regexList=[{regex:new RegExp('--(.*)$','gm'),css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp(this.GetKeywords(funcs),'gmi'),css:'func'},{regex:new RegExp(this.GetKeywords(operators),'gmi'),css:'op'},{regex:new RegExp(this.GetKeywords(keywords),'gmi'),css:'keyword'}];this.CssClass='dp-sql';};dp.sh.Brushes.Sql.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Sql.Aliases=['sql'];
dp.sh.Brushes.Xml=function(){this.CssClass='dp-xml';};dp.sh.Brushes.Xml.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Xml.Aliases=['xml','xhtml','xslt','html','xhtml'];dp.sh.Brushes.Xml.prototype.ProcessRegexList=function(){function push(array,value){array[array.length]=value;};var index=0;var match=null;var regex=null;this.GetMatches(new RegExp('<\\!\\[[\\w\\s]*?\\[(.|\\s)*?\\]\\]>','gm'),'cdata');this.GetMatches(new RegExp('<!--\\s*.*\\s*?-->','gm'),'comments');regex=new RegExp('([:\\w-\.]+)\\s*=\\s*(".*?"|\'.*?\'|\\w+)*','gm');while((match=regex.exec(this.code))!=null){push(this.matches,new dp.sh.Match(match[1],match.index,'attribute'));if(match[2]!=undefined){push(this.matches,new dp.sh.Match(match[2],match.index+match[0].indexOf(match[2]),'attribute-value'));};};this.GetMatches(new RegExp('</*\\?*(?!\\!)|/*\\?*>','gm'),'tag');regex=new RegExp('</*\\?*\\s*([:\\w-\.]+)','gm');while((match=regex.exec(this.code))!=null){push(this.matches,new dp.sh.Match(match[1],match.index+match[0].indexOf(match[1]),'tag-name'));};};
dp.sh.Brushes.Php=function(){var funcs='abs acos acosh addcslashes addslashes '+'array_change_key_case array_chunk array_combine array_count_values array_diff '+'array_diff_assoc array_diff_key array_diff_uassoc array_diff_ukey array_fill '+'array_filter array_flip array_intersect array_intersect_assoc array_intersect_key '+'array_intersect_uassoc array_intersect_ukey array_key_exists array_keys array_map '+'array_merge array_merge_recursive array_multisort array_pad array_pop array_product '+'array_push array_rand array_reduce array_reverse array_search array_shift '+'array_slice array_splice array_sum array_udiff array_udiff_assoc '+'array_udiff_uassoc array_uintersect array_uintersect_assoc '+'array_uintersect_uassoc array_unique array_unshift array_values array_walk '+'array_walk_recursive atan atan2 atanh base64_decode base64_encode base_convert '+'basename bcadd bccomp bcdiv bcmod bcmul bindec bindtextdomain bzclose bzcompress '+'bzdecompress bzerrno bzerror bzerrstr bzflush bzopen bzread bzwrite ceil chdir '+'checkdate checkdnsrr chgrp chmod chop chown chr chroot chunk_split class_exists '+'closedir closelog copy cos cosh count count_chars date decbin dechex decoct '+'deg2rad delete ebcdic2ascii echo empty end ereg ereg_replace eregi eregi_replace error_log '+'error_reporting escapeshellarg escapeshellcmd eval exec exit exp explode extension_loaded '+'feof fflush fgetc fgetcsv fgets fgetss file_exists file_get_contents file_put_contents '+'fileatime filectime filegroup fileinode filemtime fileowner fileperms filesize filetype '+'floatval flock floor flush fmod fnmatch fopen fpassthru fprintf fputcsv fputs fread fscanf '+'fseek fsockopen fstat ftell ftok getallheaders getcwd getdate getenv gethostbyaddr gethostbyname '+'gethostbynamel getimagesize getlastmod getmxrr getmygid getmyinode getmypid getmyuid getopt '+'getprotobyname getprotobynumber getrandmax getrusage getservbyname getservbyport gettext '+'gettimeofday gettype glob gmdate gmmktime ini_alter ini_get ini_get_all ini_restore ini_set '+'interface_exists intval ip2long is_a is_array is_bool is_callable is_dir is_double '+'is_executable is_file is_finite is_float is_infinite is_int is_integer is_link is_long '+'is_nan is_null is_numeric is_object is_readable is_real is_resource is_scalar is_soap_fault '+'is_string is_subclass_of is_uploaded_file is_writable is_writeable mkdir mktime nl2br '+'parse_ini_file parse_str parse_url passthru pathinfo readlink realpath rewind rewinddir rmdir '+'round str_ireplace str_pad str_repeat str_replace str_rot13 str_shuffle str_split '+'str_word_count strcasecmp strchr strcmp strcoll strcspn strftime strip_tags stripcslashes '+'stripos stripslashes stristr strlen strnatcasecmp strnatcmp strncasecmp strncmp strpbrk '+'strpos strptime strrchr strrev strripos strrpos strspn strstr strtok strtolower strtotime '+'strtoupper strtr strval substr substr_compare';var keywords='and or xor __FILE__ __LINE__ array as break case '+'cfunction class const continue declare default die do else '+'elseif empty enddeclare endfor endforeach endif endswitch endwhile '+'extends for foreach function include include_once global if '+'new old_function return static switch use require require_once '+'var while __FUNCTION__ __CLASS__ '+'__METHOD__ abstract interface public implements extends private protected throw';this.regexList=[{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('\\$\\w+','g'),css:'vars'},{regex:new RegExp(this.GetKeywords(funcs),'gmi'),css:'func'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-c';};dp.sh.Brushes.Php.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Php.Aliases=['php'];
dp.sh.Brushes.Vb=function(){var keywords='AddHandler AddressOf AndAlso Alias And Ansi As Assembly Auto '+'Boolean ByRef Byte ByVal Call Case Catch CBool CByte CChar CDate '+'CDec CDbl Char CInt Class CLng CObj Const CShort CSng CStr CType '+'Date Decimal Declare Default Delegate Dim DirectCast Do Double Each '+'Else ElseIf End Enum Erase Error Event Exit False Finally For Friend '+'Function Get GetType GoSub GoTo Handles If Implements Imports In '+'Inherits Integer Interface Is Let Lib Like Long Loop Me Mod Module '+'MustInherit MustOverride MyBase MyClass Namespace New Next Not Nothing '+'NotInheritable NotOverridable Object On Option Optional Or OrElse '+'Overloads Overridable Overrides ParamArray Preserve Private Property '+'Protected Public RaiseEvent ReadOnly ReDim REM RemoveHandler Resume '+'Return Select Set Shadows Shared Short Single Static Step Stop String '+'Structure Sub SyncLock Then Throw To True Try TypeOf Unicode Until '+'Variant When While With WithEvents WriteOnly Xor';this.regexList=[{regex:new RegExp('\'.*$','gm'),css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:new RegExp('^\\s*#.*','gm'),css:'preprocessor'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-vb';};dp.sh.Brushes.Vb.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Vb.Aliases=['vb','vb.net'];
dp.sh.Brushes.Perl = function(){var funcs = 'abs accept alarm atan2 bind binmode bless caller chdir chmod chomp chop chown chr chroot close closedir connect cos crypt dbmclose dbmopen defined delete dump each endgrent endhostent endnetent endprotoent endpwent endservent eof exec exists exp fcntl fileno flock fork format formline getc getgrent getgrgid getgrnam gethostbyaddr gethostbyname gethostent getlogin getnetbyaddr getnetbyname getnetent getpeername getpgrp getppid getpriority getprotobyname getprotobynumber getprotoent getpwent getpwnam getpwuid getservbyname getservbyport getservent getsockname getsockopt glob gmtime grep hex import index int ioctl join keys kill lc lcfirst length link listen localtime lock log lstat m map mkdir msgctl msgget msgrcv msgsnd no oct open opendir ord pack pipe pop pos print printf prototype push q qq quotemeta qw qx rand read readdir readline readlink readpipe recv ref rename reset reverse rewinddir rindex rmdir scalar seek seekdir semctl semget semop send setgrent sethostent setnetent setpgrp setpriority setprotoent setpwent setservent setsockopt shift shmctl shmget shmread shmwrite shutdown sin sleep socket socketpair sort splice split sprintf sqrt srand stat study sub substr symlink syscall sysopen sysread sysseek system syswrite tell telldir tie tied time times tr truncate uc ucfirst umask undef unlink unpack unshift untie utime values vec waitpid wantarray warn write qr';var keywords ='s select goto die do package redo require return continue for foreach last next wait while use if else elsif eval exit unless switch case';var declarations = 'my our local';this.regexList = [{ regex: dp.sh.RegexLib.SingleLinePerlComments, css: 'comment' },{ regex: dp.sh.RegexLib.DoubleQuotedString, css: 'string' },	{ regex: dp.sh.RegexLib.SingleQuotedString, css: 'string' },{ regex: new RegExp('(\\$|@|%)\\w+', 'g'), css: 'vars' },{ regex: new RegExp(this.GetKeywords(funcs), 'gmi'), css: 'func' },{ regex: new RegExp(this.GetKeywords(keywords), 'gm'), css: 'keyword' },{ regex: new RegExp(this.GetKeywords(declarations), 'gm'), css: 'declarations' }];this.CssClass = 'dp-perl';};dp.sh.Brushes.Perl.prototype= new dp.sh.Highlighter();dp.sh.Brushes.Perl.Aliases= ['perl'];
dp.sh.Brushes.Delphi=function(){var keywords='abs addr and ansichar ansistring array as asm begin boolean byte cardinal '+'case char class comp const constructor currency destructor div do double '+'downto else end except exports extended false file finalization finally '+'for function goto if implementation in inherited int64 initialization '+'integer interface is label library longint longword mod nil not object '+'of on or packed pansichar pansistring pchar pcurrency pdatetime pextended '+'pint64 pointer private procedure program property pshortstring pstring '+'pvariant pwidechar pwidestring protected public published raise real real48 '+'record repeat set shl shortint shortstring shr single smallint string then '+'threadvar to true try type unit until uses val var varirnt while widechar '+'widestring with word write writeln xor';this.regexList=[{regex:new RegExp('\\(\\*[\\s\\S]*?\\*\\)','gm'),css:'comment'},{regex:new RegExp('{(?!\\$)[\\s\\S]*?}','gm'),css:'comment'},{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('\\{\\$[a-zA-Z]+ .+\\}','g'),css:'directive'},{regex:new RegExp('\\b[\\d\\.]+\\b','g'),css:'number'},{regex:new RegExp('\\$[a-zA-Z0-9]+\\b','g'),css:'number'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'}];this.CssClass='dp-delphi';this.Style='.dp-delphi .number { color: blue; }'+'.dp-delphi .directive { color: #008284; }'+'.dp-delphi .vars { color: #000; }';};dp.sh.Brushes.Delphi.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Delphi.Aliases=['delphi','pascal'];
dp.sh.Brushes.Groovy=function(){var keywords='as assert break case catch class continue def default do else extends finally '+'if in implements import instanceof interface new package property return switch '+'throw throws try while';var types='void boolean byte char short int long float double';var modifiers='public protected private static';var constants='null';var methods='allProperties count get size '+'collect each eachProperty eachPropertyName eachWithIndex find findAll '+'findIndexOf grep inject max min reverseEach sort '+'asImmutable asSynchronized flatten intersect join pop reverse subMap toList '+'padRight padLeft contains eachMatch toCharacter toLong toUrl tokenize '+'eachFile eachFileRecurse eachB yte eachLine readBytes readLine getText '+'splitEachLine withReader append encodeBase64 decodeBase64 filterLine '+'transformChar transformLine withOutputStream withPrintWriter withStream '+'withStreams withWriter withWriterAppend write writeLine '+'dump inspect invokeMethod print println step times upto use waitForOrKill '+'getText';this.regexList=[{regex:dp.sh.RegexLib.SingleLineCComments,css:'comment'},{regex:dp.sh.RegexLib.MultiLineCComments,css:'comment'},{regex:dp.sh.RegexLib.DoubleQuotedString,css:'string'},{regex:dp.sh.RegexLib.SingleQuotedString,css:'string'},{regex:new RegExp('""".*"""','g'),css:'string'},{regex:new RegExp('\\b([\\d]+(\\.[\\d]+)?|0x[a-f0-9]+)\\b','gi'),css:'number'},{regex:new RegExp(this.GetKeywords(keywords),'gm'),css:'keyword'},{regex:new RegExp(this.GetKeywords(types),'gm'),css:'type'},{regex:new RegExp(this.GetKeywords(modifiers),'gm'),css:'modifier'},{regex:new RegExp(this.GetKeywords(constants),'gm'),css:'constant'},{regex:new RegExp(this.GetKeywords(methods),'gm'),css:'method'}];this.CssClass='dp-g'};dp.sh.Brushes.Groovy.prototype=new dp.sh.Highlighter();dp.sh.Brushes.Groovy.Aliases=['groovy'];
</script>
<script type="text/javascript">

	window.resizeTo(750,532);

	function clearText()
	{
		document.getElementById("sourceCode").value="";
		document.getElementById("htmlCode").value="";
		document.getElementById("preview").innerHTML="";
	}

	function generateCode()
	{
	
		if(document.getElementById("sourceCode").value.trim()=="")
		{
			return;
		}
		
		dp.SyntaxHighlighter.HighlightAll("sourceCode",
		document.getElementById("showGutter").checked,
		document.getElementById("showControls").checked,
		document.getElementById("collapseAll").checked,
		document.getElementById("firstLine").checked,
		document.getElementById("showColumns").checked);
	}

	function docopy(src)
	{
		if(src=='source')
		{
			if(document.getElementById("sourceCode").value != "")
				window.clipboardData.setdata("Text",document.getElementById("sourceCode").value); 
			else
				alert("Content is empty, can't copy!")
		}
		else if(src=='html')
		{
			if(document.getElementById("sourceCode").value != "")
				window.clipboardData.setdata("Text",document.getElementById("htmlCode").value); 
			else
				alert("Content is empty, can't copy!")
		}
		else
		{
			if(document.getElementById("preview").innerHTML != "")
				window.clipboardData.setdata("Text",document.getElementById("htmlCode").value);
			else
				alert("Content is empty, can't copy!")
		}
	}

	function dopasted(dst)
	{
		if(dst == 'source')
		{
			if(window.clipboardData.getdata("Text") != null)
				document.getElementById("sourceCode").value=window.clipboardData.getdata("Text"); 
		}
		else if(dst == 'html')
		{
			if(window.clipboardData.getdata("Text") != null)
				document.getElementById("htmlCode").value=window.clipboardData.getdata("Text"); 
		}
		else
		{
			if(window.clipboardData.getdata("Text") != null)
				document.getElementById("preview").innerHTML=window.clipboardData.getdata("Text"); 
		}
	}

	function doclear(dst)
	{
		if(dst == 'source')
		{
			document.getElementById("sourceCode").value=""; 
		}
		else if(dst == 'html')
		{
			document.getElementById("htmlCode").value=""; 
		}
		else
		{
			document.getElementById("preview").innerHTML=""; 
		}
	}

	String.prototype.trim = function(){
		return this.replace(/(^\s*)|(\s*＄)/g, "");
	}

//rendered div - highlighted div
var  highlightdiv = null;

// highlightes all elements identified by name and gets source code from specified property
dp.sh.HighlightAll = function(name, showGutter /* optional */, showControls /* optional */, collapseAll /* optional */, firstLine /* optional */, showColumns /* optional */)
{
	function FindValue()
	{
		var a = arguments;
		
		for(var i = 0; i < a.length; i++)
		{
			if(a[i] == null)
				continue;
				
			if(typeof(a[i]) == 'string' && a[i] != '')
				return a[i] + '';
		
			if(typeof(a[i]) == 'object' && a[i].value != '')
				return a[i].value + '';
		}
		
		return null;
	}
	
	function IsoptionSet(value, list)
	{
		for(var i = 0; i < list.length; i++)
			if(list[i] == value)
				return true;
		
		return false;
	}
	
	function GetoptionValue(name, list, defaultValue)
	{
		var regex = new RegExp('^' + name + '\\[(\\w+)\\]＄', 'gi');
		var matches = null;

		for(var i = 0; i < list.length; i++)
			if((matches = regex.exec(list[i])) != null)
				return matches[1];
		
		return defaultValue;
	}

	var elements = document.getElementsByName(name);
	var highlighter = null;
	var registered = new Object();
	var propertyName = 'value';
	
	// if no code blocks found, leave
	if(elements == null)
		return;

	// register all brushes
	for(var brush in dp.sh.Brushes)
	{
		var aliases = dp.sh.Brushes[brush].Aliases;

		if(aliases == null)
			continue;
		
		for(var i = 0; i < aliases.length; i++)
			registered[aliases[i]] = brush;
	}

	for(var i = 0; i < elements.length; i++)
	{
		var element = elements[i];
		var options = FindValue(
				element.attributes['class'], element.className, 
				element.attributes['language'], element.language
				);
		var language = '';
		
		if(options == null)
			continue;
		
		options = options.split(':');
		
		language = options[0].toLowerCase();

		if(registered[language] == null)
			continue;
		
		// instantiate a brush
		highlighter = new dp.sh.Brushes[registered[language]]();
		
		// hide the original element
		//element.style.display = 'none';

		highlighter.noGutter = (showGutter == null) ? IsoptionSet('nogutter', options) : !showGutter;
		highlighter.addControls = (showControls == null) ? !IsoptionSet('nocontrols', options) : showControls;
		highlighter.collapse = (collapseAll == null) ? IsoptionSet('collapse', options) : collapseAll;
		highlighter.showColumns = (showColumns == null) ? IsoptionSet('showcolumns', options) : showColumns;
		
		// first line idea comes from Andrew Collington, thanks!
		highlighter.firstLine = (firstLine == null) ? parseInt(GetoptionValue('firstline', options, 1)) : firstLine;

		highlighter.Highlight(element[propertyName]);
		
		document.getElementById("htmlCode").value = highlighter.div.outerHTML.substring();

		highlightdiv = highlighter;
		
		document.getElementById("preview").innerHTML = highlighter.div.outerHTML.trim();
	}	
}

// executes toolbar command by name
dp.sh.Toolbar.Command = function(name, sender)
{
	var n = sender;
	
	//while(n != null && n.className.indexOf('dp-highlighter') == -1)
	//	n = n.parentNode;
	//if(n != null)
		dp.sh.Toolbar.Commands[name].func(sender, highlightdiv);
}

</script>


</head>
<body>

<?php while (have_posts()) : the_post(); ?>	
<div id="wrapper">
	<div id="header">
     <h1>在线代码高亮转换</h1>
     	<div id=usehelp>
			代码高亮转换工具测试版，适用于发表文章或者留言时粘代码之用。<!-- 其它主题可以<a title="使用方法" href="http://zmingcx.com/wordpress-code-highlight.html" target="_blank">点此参考方法使用</a> -->
		</div>
	</div>
	<div id="post">
		<div id="main">
			<div id="main_box">	
				<h2>输入源代码</h2>
				<!-- <div id="copypaste">
					<a href="#" onclick="docopy('source')">&nbsp;复制&nbsp;</a>
					|<a href="#" onclick="dopasted('source')">&nbsp;粘贴&nbsp;</a>
					|<a href="#" onclick="doclear('source')">&nbsp;清除&nbsp;</a>
				</div> -->
				<textarea title="输入源代码." class=java id=sourceCode style="width: 100%" name=sourceCode rows=6></textarea>
			</div>
			<div id="main_box">	
				<h2>转换设置</h2>
				<span class="options">选择语言:&nbsp;&nbsp;
				<select onchange="document.getElementById('sourceCode').className=this.value">
					<option value=java selected>java</option>
					<option value=xml>xml</option>
					<option value=sql>sql</option>
					<option value=jscript>jscript</option>
					<option value=groovy>groovy</option>
					<option value=css>css</option>
					<option value=cpp>cpp</option>
					<option value=c#>c#</option>
					<option value=python>python</option
					<option value=vb>vb</option>
					<option value=perl>perl</option>
					<option value=php>php</option>
					<option value=ruby>ruby</option>
					<option value=delphi>delphi</option>
				</select>
				</span>
				<span class="options">选项：&nbsp;
					<input id=showGutter type=checkbox checked> 显示行号
					<input id=firstLine type=checkbox checked> 起始为1
					<span class="options_no">
					<input id=showControls type=checkbox> 工具栏
					<input id=collapseAll type=checkbox> 折叠
					<input id=showColumns type=checkbox> 显示列数
					</span>
				</span>
				<span class="render">
					<button onclick=generateCode()>转&nbsp;&nbsp;换</button>
					<button onclick=clearText()>清&nbsp;&nbsp;除</button>
				</span>
			</div>
			<div id="main_box">
				<h2>HTML 代码</h2>
				<p>复制粘贴代码请用鼠标右键或者快捷键！</p>
				<textarea id=htmlCode style="width: 100%" name=htmlCode rows=6></textarea>
			</div>

			<div id="main_box">
				<h2>HTML 预览</h2>
				<div id="preview"></div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="copyright">
			Copyright &copy; <?php bloginfo( 'name' ); ?>  保留所有权利.&nbsp;&nbsp;Design by <a title="Robin" href="http://zmingcx.com" target="_blank"> Robin</a><br/>
		</div>
	</div>
</div>
<?php endwhile; ?>
</body>
</html>