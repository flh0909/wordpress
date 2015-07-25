<?php get_header();?>
	<div id="content" class="site-content">
	<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<?php if ( !is_paged() ) { ?>
		<?php if ( is_sticky() ) { ?><?php include (TEMPLATEPATH . '/inc/slider.php'); ?><?php } ?>
	<?php } ?>
		
	<?php if (get_option('ygj_new_p') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else { include(TEMPLATEPATH . '/inc/new_post.php'); } ?>
	
	<div class="clear"></div>			
<?php if (get_option('ygj_sydl') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else {	?>	
	<div class="line-one">
	<?php 
		$display_categories = explode(',', get_option('ygj_catdl') ); 
		foreach ($display_categories as $category) { ?>
		<?php
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post__not_in' => $do_not_duplicate
				)
			);
		?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="cat-box">
			<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
			<div class="clear"></div>
			<div class="cat-site">
				<figure class="line-one-thumbnail">
					<?php include('inc/thumbnail.php'); ?>		
				</figure>
				<?php endwhile; ?>
				<ul class="cat-one-list">
				<?php
					query_posts( array(
						'showposts' => 5,
						'cat' => $category,
						'post_not_in' => $do_not_duplicate
						)
		 			);
				?>
				<?php while (have_posts()) : the_post(); ?>
				<span class="list-date"><?php the_time('m/d') ?></span>					
				<li class="list-title"><i class="icon-li"></i>
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,50); ?></a>
				</li>									
				<?php endwhile; ?>						
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>	
	<?php } ?>		
	</div>
		<?php }?>	
		<?php if (get_option('ygj_adhx') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else { include(TEMPLATEPATH . '/inc/ad/ad_hx.php'); } ?>
	
	<?php if (get_option('ygj_sysl') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else {	?>			
<div class="line-small">
	<?php 
		$display_categories = explode(',', get_option('ygj_catl') ); 
		foreach ($display_categories as $category) { ?>
		<?php
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post_not_in' => $do_not_duplicate
				)
			);
		?>
	<div class="xl2 xm2">
	
		<?php while (have_posts()) : the_post(); ?>
		<div class="cat-box">
			<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
			<div class="clear"></div>
			<div class="cat-site">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,32); ?></a></h2>		
				<figure class="thumbnail box-hide">
				<?php include('inc/thumbnail.php'); ?>		
				</figure>
				<div class="cat-main">
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 80,"..."); ?>		
				</div>
				<div class="clear"></div>
				<?php endwhile; ?>
				<ul class="cat-list">
				<?php
					query_posts( array(
						'showposts' => get_option('ygj_cat_n'),
						'cat' => $category,
						'offset' => 1,
						'post_not_in' => $do_not_duplicate
						)
		 			);
				?>
				<?php while (have_posts()) : the_post(); ?>
				<span class="list-date"><?php the_time('m/d') ?></span>					
				<li class="list-title"><i class="icon-li"></i>
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,30); ?></a>
				</li>									
				<?php endwhile; ?>	
				</ul>
			</div>
		</div>
		
	</div><?php } ?>

<?php 
		$display_categories = explode(',', get_option('ygj_catr') ); 
		foreach ($display_categories as $category) { 
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post_not_in' => $do_not_duplicate
				)
			);
		?>
	<div class="xl2 xm2">
		
		<div class="cat-box">
			<?php while (have_posts()) : the_post(); ?>
			<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
			<div class="clear"></div>
			<div class="cat-site">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,32); ?></a></h2>			
				<figure class="thumbnail box-hide">
				<?php include('inc/thumbnail.php'); ?>		
				</figure>
				<div class="cat-main">
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 80,"..."); ?>	
				</div>
				<?php endwhile; ?>
				<div class="clear"></div>
					<ul class="cat-list">
					<?php
					query_posts( array(
						'showposts' => get_option('ygj_cat_n'),
						'cat' => $category,
						'offset' => 1,
						'post_not_in' => $do_not_duplicate
						)
		 			);
					?>
					<?php while (have_posts()) : the_post(); ?>
						<span class="list-date"><?php the_time('m/d') ?></span>					
						<li class="list-title"><i class="icon-li"></i>
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,30); ?></a>
						</li>									
					<?php endwhile; ?>										
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<div class="clear"></div>				

							
<div class="clear"></div>			
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>

<div class="clear"></div>	
<?php if (get_option('ygj_syytsl') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else {	?>	
	<div class="line-big">
		<?php 
		$display_categories = explode(',', get_option('ygj_catldt') ); 
		foreach ($display_categories as $category) { 
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post_not_in' => $do_not_duplicate
				)
			);
		?>
		<div class="xl3 xm3">
			<div class="cat-box">
				<?php while (have_posts()) : the_post(); ?>
				<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
				<div class="clear"></div>
				<div class="cat-site">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,48); ?></a></h2>			
					<figure class="thumbnail box-hide box-show">
						<?php include('inc/thumbnail.php'); ?>		
					</figure>
					<div class="cat-main">					
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180,"..."); ?>
					</div>
					<?php endwhile; ?>
					<div class="clear"></div>
					<ul class="cat-list">
					<?php
					query_posts( array(
						'showposts' => get_option('ygj_cat_nddt'),
						'cat' => $category,
						'offset' => 1,
						'post_not_in' => $do_not_duplicate
						)
		 			);
					?>
					<?php while (have_posts()) : the_post(); ?>
						<span class="list-date"><?php the_time('m/d') ?></span>					
						<li class="list-title"><i class="icon-li"></i><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,50); ?></a></li>	
					<?php endwhile; ?>						
					</ul>

				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php 
		$display_categories = explode(',', get_option('ygj_catrdt') ); 
		foreach ($display_categories as $category) { 
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post_not_in' => $do_not_duplicate
				)
			);
		?>
		<div class="xl3 xm3">
			<div class="cat-box">
				<?php while (have_posts()) : the_post(); ?>
				<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
				<div class="clear"></div>
				<div class="cat-site">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,48); ?></a></h2>			
					<figure class="thumbnail box-hide box-show">
						<?php include('inc/thumbnail.php'); ?>		
					</figure>
					<div class="cat-main">
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180,"..."); ?>
					</div>
					<?php endwhile; ?>
					<div class="clear"></div>
					<ul class="cat-list">
							<?php
					query_posts( array(
						'showposts' => get_option('ygj_cat_nddt'),
						'cat' => $category,
						'offset' => 1,
						'post_not_in' => $do_not_duplicate
						)
		 			);
					?>
					<?php while (have_posts()) : the_post(); ?>
						<span class="list-date"><?php the_time('m/d') ?></span>					
						<li class="list-title"><i class="icon-li"></i><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,50); ?></a></li>	
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="clear"></div>	
	</div>
<?php } ?>
<?php if (get_option('ygj_sywtsl') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else {	?>	
	<div class="line-big">
	<?php 
		$display_categories = explode(',', get_option('ygj_catld') ); 
		foreach ($display_categories as $category) { 
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post_not_in' => $do_not_duplicate
				)
			);
		?>
		<div class="xl3 xm3">
			<div class="cat-box">
			<?php while (have_posts()) : the_post(); ?>
				<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
				<?php endwhile; ?>
				<div class="clear"></div>
				<div class="cat-site">
					<ul class="cat-list">
					<?php
					query_posts( array(
						'showposts' => get_option('ygj_cat_ndt'),
						'cat' => $category,
						'post_not_in' => $do_not_duplicate
						)
		 			);
					?>
					<?php while (have_posts()) : the_post(); ?>
						<span class="list-date"><?php the_time('m/d') ?></span>					
						<li class="list-title"><i class="icon-li"></i><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,50); ?></a></li>	
						<?php endwhile; ?>						
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php 
		$display_categories = explode(',', get_option('ygj_catrd') ); 
		foreach ($display_categories as $category) { 
			query_posts( array(
				'showposts' => 1,
				'cat' => $category,
				'post_not_in' => $do_not_duplicate
				)
			);
		?>
		<div class="xl3 xm3">
			<div class="cat-box">
			<?php while (have_posts()) : the_post(); ?>
				<h3 class="cat-title"><i class="icon-cat"></i><a href="<?php echo get_category_link($category);?>" title="<?php echo category_description( $categoryID ); ?>"><?php single_cat_title(); ?></a></h3>
				<?php endwhile; ?>
				<div class="clear"></div>
				<div class="cat-site">
					<ul class="cat-list">
					<?php
					query_posts( array(
						'showposts' => get_option('ygj_cat_ndt'),
						'cat' => $category,
						'post_not_in' => $do_not_duplicate
						)
		 			);
					?>
					<?php while (have_posts()) : the_post(); ?>
						<span class="list-date"><?php the_time('m/d') ?></span>					
						<li class="list-title"><i class="icon-li"></i><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo cut_str($post->post_title,50); ?></a></li>	
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="clear"></div>	
	</div>
	<?php } ?>
<div class="clear"></div>
	</div><!-- .site-content -->				
<?php get_footer();?>