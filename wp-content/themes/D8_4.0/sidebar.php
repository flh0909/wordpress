<aside class="sidebar">
	<div class="widget widget_search clear">
	<form method="get" class="dropdown search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<input class="search-input" name="s" type="text" placeholder="输入关键字搜索"<?php if (is_search()) {
			echo ' value="' . htmlspecialchars($s) . '"';
		} ?> x-webkit-speech=""><input class="btn btn-success search-submit" type="submit" value="搜 索">
		<ul class="dropdown-menu search-suggest"></ul>
	</form>
	</div>
<?php 
if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_sitesidebar')) : endif; 

if (is_single()){
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_postsidebar')) : endif; 
}
else if (is_page()){
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_pagesidebar')) : endif; 
}
else if (is_home()){
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_sidebar')) : endif; 
}
else {
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_othersidebar')) : endif; 
}
?>
</aside>