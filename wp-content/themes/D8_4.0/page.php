<?php get_header(); ?>
<div class="content-wrap">
	<div class="content">
		<?php while (have_posts()) : the_post(); ?>
		<header class="article-header">
			<h1 class="article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<span class="muted"><i class="icon-user icon12"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo get_the_author() ?></a></span>
				<time class="muted"><i class="ico icon-time icon12"></i> <?php the_time('Y-m-d');?></time>
				<span class="muted"><i class="ico icon-eye-open icon12"></i> <?php deel_views('浏览'); ?></span>
				<?php if ( comments_open() ) echo '<span class="muted"><i class="icon-comment icon12"></i> <a href="'.get_comments_link().'">'.get_comments_number('0', '1', '%').'评论</a></span>'; ?>
				<?php edit_post_link('[编辑]'); ?>
			</div>
		</header>
		<article class="article-content">
			<?php the_content(); ?>
		</article>
		<?php comments_template('', true); ?>
		<?php endwhile;  ?>
	</div>
</div>
<?php get_sidebar(); get_footer(); ?>