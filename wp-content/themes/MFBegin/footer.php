<div id="footer-widget-box">
	<div class="footer-widget">
	<?php wp_reset_query();if ( is_home()){ ?>	
		<div id="links">
	<ul>
		<li id="linkcat-2" class="linkcat"><h2>友情链接</h2>
			<ul class="xoxo blogroll">
				<li><strong>友情链接：</strong></li>
				<?php
				if(function_exists('wp_hot_get_links')){
				wp_hot_get_links();
				}else{
				wp_list_bookmarks('title_li=&categorize=0&orderby=rand&show_images=&limit=30&category='.get_option('ygj_link_id'));	
				}
				?>
			</ul>
		</li>
	</ul>
<div class="clear"></div>
</div>
	<?php } ?>
		
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">			
			<a href="http://www.toptheme.org" target="_blank">Copyright</a> ©&nbsp; <?php date('Y'); bloginfo('name');?> &nbsp; | &nbsp; Theme by <a title="基于知更鸟Begin主题外观模仿而成" href="http://yigujin.wang/mfbegin" target="_blank"><?php echo get_current_theme(); ?></a><span class="footer-tag">&<a title="wordpress主题" href="http://www.toptheme.org" target="_blank">Begin</a> &nbsp; | &nbsp; Powered by <a href="http://www.toptheme.org" title="wordpress主题" target="_blank" rel="nofollow">WordPress</a> &nbsp; | &nbsp;  <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow"><?php echo stripslashes(get_option('ygj_icp')); ?></a></span>
		</div><!-- .site-info -->
</footer><!-- .site-footer -->
	</div>
</div>	
<?php get_template_part( 'inc/scroll' ); ?>
<?php if (is_single() || is_page() ) { ?>
<?php get_template_part( 'inc/share' ); ?>
<?php get_template_part( 'inc/shang' ); ?>
<script>window._bd_share_config={"common":{"bdSnsKey":{"tsina":"2363344102"},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php } ?>
<?php if (is_home() || is_archive() || is_search()) { ?>
<script type="text/javascript">
    document.onkeydown = chang_page;function chang_page(e) {
        var e = e || event,
        keycode = e.which || e.keyCode;
        if (keycode == 33 || keycode == 37) location = '<?php echo get_previous_posts_page_link(); ?>';
        if (keycode == 34 || keycode == 39) location = '<?php echo get_next_posts_page_link(); ?>';
    }
</script>
<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<?php wp_footer(); ?>
</body></html>