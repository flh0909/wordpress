<?php
$themename = "MFBegin";
$shortname = "ygj";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$number_entries = array("选择数量","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array ( 
array( "name" => $themename." Options",
       "type" => "title"),

//首页设置

    array( "name" => "首页设置",
           "type" => "section"),
    array( "type" => "open"),
	
	array(  "name" => "选择首页布局",
			"desc" => "说明：默认博客布局，选择杂志布局需设置以下内容",
            "id" => $shortname."_home",
            "type" => "select",
            "std" => "杂志布局",
            "options" => array("博客布局", "杂志布局"),
			"section" => '<div class="part"></div>'),
						
	array(  "name" => "网站整体变灰",
			"desc" => "说明：在特别的日子里，一键设置网站整体变灰，支持IE、Chrome，基本上覆盖了大部分用户。",
			"id" => $shortname."_site_gray",
			"type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),
					
	array(
		"name"    => "主题风格",
		"desc"    => "13种颜色供选择，选择你喜欢的颜色，保存后前端展示会有所改变。<br/><span style=\"color:#C01E22;\">C01E22</span>,<span style=\"color:#0088cc;\">0088cc</span>,<span style=\"color:#FF5E52;\">FF5E52</span>, <span style=\"color:#2CDB87;\">2CDB87</span>, <span style=\"color:#00D6AC;\">00D6AC</span>,  <span style=\"color:#EA84FF;\">EA84FF</span>, <span style=\"color:#FDAC5F;\">FDAC5F</span>, <span style=\"color:#FD77B2;\">FD77B2</span>, <span style=\"color:#76BDFF;\">76BDFF</span>, <span style=\"color:#C38CFF;\">C38CFF</span>, <span style=\"color:#FF926F;\">FF926F</span>, <span style=\"color:#8AC78F;\">8AC78F</span>, <span style=\"color:#C7C183;\">C7C183</span>",
		"id"      => $shortname."_theme_skin",
		"type"    => "select",
		"std"     => "C01E22",
		"options" => array("C01E22","0088cc","FF5E52","2CDB87","00D6AC","EA84FF","FDAC5F","FD77B2","76BDFF","C38CFF","FF926F","8AC78F","C7C183")
		),	
			
	array(	"name" => "输入最新文章排除的分类ID",
            "desc" => "说明：比如：-1,-2,-3<br/>多个ID用英文逗号隔开(博客和杂志布局均有效)",
            "id" => $shortname."_new_exclude",
            "type" => "text",
            "std" => "",
			"section" => '<div class="part"></div>'),
		
//CMS首页布局控制

    array( "type" => "close"),
    array( "name" => "CMS布局",
           "type" => "section"),
    array( "type" => "open"),
	
	array(  "name" => "最新日志",
			"desc" => "说明：默认显示",
            "id" => $shortname."_new_p",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),

	array(	"name" => "最新日志显示的篇数",
			"desc" => "说明：默认显示3篇",
			"id" => $shortname."_new_post",
			"std" => "3",
			"type" => "select",
			"options" => $number_entries,
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "首页单栏",
			"desc" => "说明：默认显示",
            "id" => $shortname."_sydl",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),

	array(	"name" => "首页单栏分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catdl",
            "type" => "text",
            "std" => "1",
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "首页小双栏",
			"desc" => "说明：默认显示",
            "id" => $shortname."_sysl",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),

	array(	"name" => "首页小左侧分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catl",
            "type" => "text",
            "std" => "1"),

	array(	"name" => "首页小右侧分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catr",
            "type" => "text",
            "std" => "2"),
		
	array(	"name" => "小分类列表显示的篇数",
			"desc" => "说明：默认显示4篇",
			"id" => $shortname."_cat_n",
			"type" => "text",
            "std" => "4",
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "首页有图大双栏",
			"desc" => "说明：默认显示",
            "id" => $shortname."_syytsl",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),			
			
	array(	"name" => "首页大左侧（有图）分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catldt",
            "type" => "text",
            "std" => "1"),

	array(	"name" => "首页大右侧（有图）分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catrdt",
            "type" => "text",
            "std" => "2"),
	array(	"name" => "大分类列表显示的篇数",
			"desc" => "说明：默认显示5篇",
			"id" => $shortname."_cat_nddt",
			"type" => "text",
            "std" => "5",
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "首页无图大双栏",
			"desc" => "说明：默认显示",
            "id" => $shortname."_sywtsl",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),	
			
	array(	"name" => "首页大左侧（无图）分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catld",
            "type" => "text",
            "std" => "1"),

	array(	"name" => "首页大右侧（无图）分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catrd",
            "type" => "text",
            "std" => "2"),

	array(	"name" => "大分类列表显示的篇数",
			"desc" => "说明：默认显示5篇",
			"id" => $shortname."_cat_ndt",
			"type" => "text",
            "std" => "5"),

//综合功能控制

    array( "type" => "close"),
    array( "name" => "综合功能",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "是否显示LOGO",
			"desc" => "说明：默认显示",
            "id" => $shortname."_logo",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭"),
			"section" => '<div class="part"></div>'),
			
	array(	"name" => "最新文章图标",
            "desc" => "说明：默认三天（72小时）内发表的文章显示",
            "id" => $shortname."_date",
            "type" => "text",
            "std" => "72",
			"section" => '<div class="part"></div>'),

	array(  "name" => "正文底部小工具",
			"desc" => "说明：默认显示",
            "id" => $shortname."_zwdb",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭"),
			"section" => '<div class="part"></div>'),
			
	array(	"name" => "友情链接ID",
            "desc" => "说明：默认显示友情链接ID为1",
            "id" => $shortname."_link_id",
            "type" => "text",
            "std" => "1",
			"section" => '<div class="part"></div>'),
	
	array(  "name" => "百度站内搜索",
			"desc" => "说明：默认显示",
            "id" => $shortname."_bdzn",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),
	
	array(	"name" => "百度站内搜索，输入搜索 ID",
            "desc" => "",
            "id" => $shortname."_baidu_s",
            "type" => "text",
            "std" => "16287387553215420184"),

//SEO设置

    array( "type" => "close"),
	array( "name" => "SEO设置",
       "type" => "section"),
	array( "type" => "open"),

	array(	"name" => "首页描述（Description）",
			"desc" => "",
			"id" => $shortname."_description",
			"type" => "textarea",
            "std" => "说明：输入你的网站描述，一般不超过200个字符"),

	array(	"name" => "首页关键词（KeyWords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "说明：输入你的网站关键字，一般不超过100个字符"),
	
	array("name" => "ICP备案号",
            "desc" => "",
            "id" => $shortname."_icp",
            "type" => "text",
            "std" => "暂无备案"),
			
//广告管理

    array( "type" => "close"),
	array( "name" => "广告设置",
			"type" => "section"),
	array( "type" => "open"),

	array(  "name" => "是否显示首页(列表页)第一广告",
			"desc" => "说明：默认显示，最大宽度760px",
            "id" => $shortname."_adh",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入首页(列表页)第一广告代码",
            "desc" => "",
            "id" => $shortname."_adh_c",
            "type" => "textarea",
            "std" => '<a href="http://boke123.net/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad7600.jpg" alt="boke123导航_独立博客导航平台" /></a>',
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "是否显示首页（列表页）第二广告",
			"desc" => "说明：默认每页显示6篇文章及以上显示，最大宽度760px",
            "id" => $shortname."_adhx",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入首页(列表页)第二广告代码",
            "desc" => "",
            "id" => $shortname."_adh_cx",
            "type" => "textarea",
            "std" => '<a href="http://yigujin.wang/mfbegin" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad7601.jpg" alt="知更鸟Begin主题山寨版：MFBegin主题" /></a>',
			"section" => '<div class="part"></div>'),

	array(  "name" => "是否显示正文广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_g_single",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入正文广告代码",
            "desc" => "",
            "id" => $shortname."_single_ad",
            "type" => "textarea",
            "std" => '<a href="http://yigujin.wang/mfbegin" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad7601.jpg" alt="知更鸟Begin主题山寨版：MFBegin主题" /></a>',
			"section" => '<div class="part"></div>'),

	array(  "name" => "是否显示正文底部广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_adt",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入正文底部广告代码",
            "desc" => "",
            "id" => $shortname."_adtc",
            "type" => "textarea",
            "std" => '<a href="http://yigujin.wang/mfbegin" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad7601.jpg" alt="知更鸟Begin主题山寨版：MFBegin主题" /></a>',
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "是否显示评论框上方广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_g_comment",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入评论框上方广告代码",
            "desc" => "",
            "id" => $shortname."_ad_c",
            "type" => "textarea",
            "std" => '<a href="http://boke123.net/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad7600.jpg" alt="boke123导航_独立博客导航平台" /></a>',
			"section" => '<div class="part"></div>'),
			
	array(	"name" => "输入下载弹窗广告",
            "desc" => "",
            "id" => $shortname."_file_ad",
            "type" => "textarea",
            "std" => '<a href="http://boke123.net/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad500.jpg" alt="boke123导航_独立博客导航平台" /></a>',
			"section" => '<div class="part"></div>'),
			
	array(	"type" => "close") 
);
// 定义管理面板
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme-options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme-options.php&reset=true");
die;
}
} 
add_theme_page($themename."主题选项", "主题选项", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/inc/options/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/inc/options/rm_script.js", false, "1.0");
}
function mytheme_admin() { 
global $themename, $shortname, $options;
$i=0; 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?>主题选项</h2>
<p>
当前主题模仿知更鸟Begin主题外观而来 | 外观设计者：<a href="http://zmingcx.com" target="_blank">知更鸟</a> |  模仿者：<a href="http://yigujin.wang" target="_blank">懿古今</a> | <a href="http://yigujin.wang/mfbegin" target="_blank">查看更新及常见问题</a>
	<br/><font style="font-size:20px;"color=#ff0000><strong> &hearts; </strong></font><font color=#000>支持外观设计者：知更鸟支付宝：<font color=#21759b><strong>robin5988@gmail.com</strong></font></font> <br/> <font style="font-size:20px;"color=#ff0000><strong> &hearts; </strong></font><font color=#000>支持模仿者：懿古今支付宝：<font color=#21759b><strong>yigujin@qq.com</strong></font></font> 
</p>
<div class="rm_opts">
<form method="post">
  <?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
  <?php break; case "close": ?>
</div>
</div>

<?php break; case "title": ?>
<?php break; case 'text': ?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case 'textarea': ?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
 	 <div class="clearfix"></div> 
</div>
  
<?php break; case 'select': ?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
	</select>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "checkbox": ?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "section": $i++ ?>

<div class="rm_section">
	<div class="rm_title">
		<h3><?php echo $value['name']; ?></h3>
		<span class="submit"><input type="submit" value="保存设置" class="button-primary" id="newmeta-submit" name="save<?php echo $i; ?>"></span>
		<div class="clearfix"></div>
	</div>
<div class="rm_options">
<?php break;
}
}
?>
<?php
function show_id() {
	global $wpdb;
	$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
	$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
	$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
	$request .= " ORDER BY term_id asc";
	$categorys = $wpdb->get_results($request);
	foreach ($categorys as $category) { 
		$output = '<ol>'.$category->name."&nbsp;［<font color=#0196e3>".$category->term_id.'</font>］</ol>';
		echo $output;
	}
}
?>
<span class="show_id">
    <h4>分类对应 ID</h4>
    <?php show_id();?>
</span>
<span class="submit"><input type="submit" value="保存设置" class="button-primary" id="newmeta-submit" name="save<?php echo $i; ?>"></span>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
	<p class="submit">
		<input type="submit" class="button" name="reset" value="恢复默认设置" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
</div>
<?php }?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>