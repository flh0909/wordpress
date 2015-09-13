<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/23
 * Time: 21:48
 */

$GLOBALS['name']='g_name';
date_default_timezone_set('Asia/Shanghai');
echo date('Ymd_His_').rand(100,999).'<br/>'.microtime();


echo 'test';

echo date("Y-m-d H:i:s");

echo "<br/>";

echo rand(100,999);
echo "<br/>";
echo "<br/>";

echo date('Y-m-d H:i:s',time()-60*60*24*7);

echo "<br/>";
echo "<br/>";
echo "<br/>";

echo 'aaaaa';

$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);


$str='<p height="22" align="cenetr" style="float:left;height:30px;">111 22</p>
<img src="http://fileaaa.jpg" width="100" alt="aaa" />
<div style="float:left;height:30px;">中国人</div>';

/*PHP正则提取图片img标记中的任意属性*/
$str = '<div style="margin: 0px auto; width: 740px;"> <p><img width="748" height="444" alt="" src="/images/upload/Image/manmiao_0001.jpg" /></p></div><iframe width="212" height="232"></iframe>';
//去掉图片宽度
/*$search = '/(<img.*?)width=(["\'])?.*?(?(2)\2|\s)([^>]+>)/is';
//去掉图片高度
$search1 = '/(<img.*?)height=(["\'])?.*?(?(2)\2|\s)([^>]+>)/is';
$content = preg_replace($search,'$1$3',$str);
$content = preg_replace($search1,'$1$3',$content);*/
//去掉div的style
$str = preg_replace("/style=.+?['|\"]/i",'',$str);//这种方式很简单易懂，但因为太简单，不知道有没有漏洞，否则去掉图片的宽高也用这种方法写了

$exp=Array('/(<img.*?)width=(["\'])?.*?(?(2)\2|\s)([^>]+>)/is','/(<img.*?)height=(["\'])?.*?(?(2)\2|\s)([^>]+>)/is');
$content =preg_replace($exp,'$1$3',$str);

highlight_string($content);



