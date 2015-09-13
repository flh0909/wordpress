<ul class="article-related clear">
<?php  
$exclude_id = $post->ID; 
$posttags = get_the_tags(); 
$i = 0;
$limit = !dopt('d_related_count') ? 12 : dopt('d_related_count');
if ( $posttags ) { 
	$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->name . ',';
	$args = array(
		'post_status' => 'publish',
		'tag_slug__in' => explode(',', $tags), 
		'post__not_in' => explode(',', $exclude_id), 
		'caller_get_posts' => 1, 
		'orderby' => 'comment_date', 
		'posts_per_page' => $limit
	);
	query_posts($args); 
	while( have_posts() ) { the_post();?>
		<li>
			<div>
				<a href="<?php the_permalink(); ?>" class="thumbnail"><?php deel_thumbnail(); ?></a>
				<a href="<?php the_permalink() ?>" class="article-related-title" title="<?php the_title(); ?> - <?php bloginfo('name'); ?>"><?php the_title(); ?></a>

				<p>
					<span class="muted"><i class="icon-eye-open icon12"></i> <?php deel_views('浏览'); ?></span>
    <span class="muted"><i class="icon-comment icon12"></i> <?php
		if (comments_open()) echo '<a href="' . get_comments_link() . '">' . get_comments_number('0', '1', '%') . '评论</a>';
		?></span>
				</p>
			</div>

		</li>
		<?php
		$exclude_id .= ',' . $post->ID; $i ++;
	};
	wp_reset_query();
}
if ( $i < $limit ) { 
	$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
	$args = array(
		'category__in' => explode(',', $cats), 
		'post__not_in' => explode(',', $exclude_id),
		'caller_get_posts' => 1,
		'orderby' => 'comment_date',
		'posts_per_page' => $limit - $i
	);
	query_posts($args);
	while( have_posts() ) { the_post();?>
		<li>
			<div>
				<a href="<?php the_permalink(); ?>" class="thumbnail"><?php deel_thumbnail(); ?></a>
				<a href="<?php the_permalink() ?>" class="article-related-title" title="<?php the_title(); ?> - <?php bloginfo('name'); ?>"><?php the_title(); ?></a>

				<p>
					<span class="muted"><i class="icon-eye-open icon12"></i> <?php deel_views('浏览'); ?></span>
    <span class="muted"><i class="icon-comment icon12"></i> <?php
		if (comments_open()) echo '<a href="' . get_comments_link() . '">' . get_comments_number('0', '1', '%') . '评论</a>';
		?></span>
				</p>
			</div>

		</li>
		<?php
		$i ++;
	};
	wp_reset_query();
}
if ( $i  == 0 ){
	echo '<li>暂无相关文章！</li>';
}
?>
</ul>
