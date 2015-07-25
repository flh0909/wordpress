<?php get_header();?>
<div id="content" class="site-content">	
<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php while ( have_posts() ) : the_post(); ?>
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>			
	</header><!-- .entry-header -->

<?php if (get_option('ygj_g_single') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } 
	else { include(TEMPLATEPATH . '/inc/ad/ad_single.php'); } ?>
	
	<div class="entry-content">
					<div class="single-content">			
	<?php the_content(); ?>
	<?php wp_link_pages(array('before' => '<div class="page-links">', 'after' => '', 'next_or_number' => 'next', 'previouspagelink' => '<span>上一页</span>', 'nextpagelink' => "")); ?><?php wp_link_pages(array('before' => '', 'after' => '', 'next_or_number' => 'number', 'link_before' =>'<span>', 'link_after'=>'</span>')); ?>
					<?php wp_link_pages(array('before' => '', 'after' => '</div>', 'next_or_number' => 'next', 'previouspagelink' => '', 'nextpagelink' => "<span>下一页</span>")); ?>			
			</div>
<div class="clear"></div>
	<?php get_template_part( 'inc/social' ); ?>
			<footer class="single-footer">
				<ul class="single-meta">
										<li class="views"><?php if( function_exists( 'the_views' ) ) { print '阅读 '; the_views(); } ?></li>
										<li class="comment"><?php comments_popup_link( '暂无评论', '评论 1', '评论 %' ); ?>
					</li>										
					<li class="r-hide"><a href="javascript:pr()" onclick="javascript:this.innerHTML=(this.innerHTML==&#39;隐藏边栏&#39;?&#39;显示边栏&#39;:&#39;隐藏边栏&#39;);">隐藏边栏</a></li>
					<li class="edit-link"><?php edit_post_link('编辑', '  ', '  '); ?></span></li>
				</ul>

				<ul id="fontsize">A+</ul>
				<div class="single-cat-tag">
					<div class="single-tag"><strong><a href="http://www.toptheme.org" target="_blank">来源</a>：</strong><a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php bloginfo('name');?></a>（QQ号：2226524923），欢迎分享本文，转载请保留出处！</div>	
					<div class="single-cat"><strong><a href="http://www.toptheme.org" target="_blank">日期</a>：</strong><?php the_time( 'Y年m月d日' ) ?>&nbsp;&nbsp;<strong><a href="http://www.toptheme.org" target="_blank">分类</a>：</strong><?php the_category( ', ' ) ?><span class="single-tag"><strong><a href="http://www.toptheme.org" target="_blank">标签</a>：</strong><?php the_tags('', ', ', '');?></span></div>
								
				</div>
			</footer><!-- .entry-footer -->
<?php include('inc/file.php'); ?>
				<div class="clear"></div>
	</div><!-- .entry-content -->
	</article><!-- #post -->
														
		<?php if (get_option('ygj_adt') == '关闭') { ?>
		<?php { echo ''; } ?>
	<?php } else { include(TEMPLATEPATH . '/inc/ad/ad_single_d.php'); } ?>

	<nav class="nav-single">
		<?php previous_post_link('%link','<span class="meta-nav"><strong>上一篇：</strong>%title </span>',true,'') ?>
		<?php next_post_link('%link','<span class="meta-nav"><strong>下一篇：</strong>%title </span>',true,'') ?>					
		<div class="clear"></div>				
	</nav>

	<?php if (get_option('ygj_zwdb') == '关闭') { ?>
		<?php { echo ''; } ?>
	<?php } else { ?>
		<div id="single-widget">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
		<div class="clear"></div>
	</div>
	<?php } ?>
	<?php comments_template( '', true ); ?>			
			<?php endwhile; ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_sidebar();?>
<div class="clear"></div>
</div><!-- .site-content -->
<?php get_footer();?>