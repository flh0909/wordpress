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


$exp=Array("/height=.{0,5}\s/i","/width=.{0,5}\s/i");

$exp_o=Array('','');

echo preg_replace($exp,$exp_o,$str);



