<?php
	$scrollcount = get_option('ygj_new_post');
 ?>
<?php query_posts('&showposts='.$scrollcount.'&ignore_sticky_posts=10.&cat='.get_option('ygj_new_exclude')); while ( have_posts() ) : the_post();$do_not_duplicate[] = $post->ID; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<figure class="thumbnail box-hide">		
			<?php get_template_part( 'inc/thumbnail' ); ?>		
			<span class="cat">
				<?php 
					$category = get_the_category(); 
					if($category[0]){
					echo '<a href='.get_category_link($category[0]->term_id ).'>'.$category[0]->cat_name.'</a>';
					}
				?>
			</span>
		</figure>
		<?php get_template_part( 'inc/new' ); ?>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>		
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<div class="archive-content">			 				
				<?php if (has_excerpt()){ the_excerpt();} else { echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 168,"..."); } ?>
			</div>
			<span class="title-l"></span>
			<span class="entry-meta">
				<span class="date"><?php  the_time( 'Y年n月j日');?></span>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="views"><?php if( function_exists( 'the_views' ) ) { print '  阅读 '; the_views(); print ' 次  ';  } ;?></span>&nbsp;&nbsp;&nbsp;&nbsp;	
			<span class="comment"><?php comments_popup_link( ' 评论 0 条', ' 评论 1 条', ' 评论 % 条' ); ?></span>				
			</span>			
			<div class="clear"></div>
		</div><!-- .entry-content -->
		
		<span class="entry-more"><a href="<?php the_permalink() ?>" rel="bookmark">阅读全文</a></span>
	</article><!-- #post -->

 	<!-- ad -->
	<?php if ($wp_query->current_post == 0) : ?>
	<?php if (get_option('ygj_adh') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else { include(TEMPLATEPATH . '/inc/ad/ad_h.php'); } ?>
	<?php endif; ?>	
	<!-- end: ad -->
<?php endwhile; ?>