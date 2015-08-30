<?php get_header(); ?>
<div class="content-wrap">
	<div class="content">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			/**
			 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
			 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
			 */
			$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
			$index=1;
			foreach ( $attachments as $k => $attachment ) :
				if ( $attachment->ID == $post->ID )
					break;
				$index++;
			endforeach;
			?>
			<header class="article-header">
				<h1 class="article-title"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ) ?>"><?php echo get_the_title( $post->post_parent ); ?></a> (<?php echo $index.'/'.count($attachments)?>)</h1>
				<div class="meta">

					<time class="muted"><i class="ico icon-time icon12"></i> <?php echo get_the_time('Y-m-d G:i:s')?></time>
				<span class="muted"><i class="ico icon-eye-open icon12"></i>
	<span id="j_post_views"><?php if(!is_user_logged_in()){ echo "0 浏览"; }else{deel_views('浏览');} ?>	</span>
		</span>

					<?php if ( comments_open() ) echo '<span class="muted"><i class="icon-comment icon12"></i> <a href="'.get_comments_link().'">'.get_comments_number('0', '1', '%').'评论</a></span>'; ?>
					<?php edit_post_link('[编辑]'); ?>
				</div>
				<?php deel_share(); ?>
			</header>

			<article class="article-content article-content-image">
				<div class="attachment">
					<?php


					$k++;
					// If there is more than 1 attachment in a gallery
					if ( count( $attachments ) > 1 ) :
						if ( isset( $attachments[ $k ] ) ) :
							// get the URL of the next image attachment
							$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
						else :
							// or get the URL of the first image attachment
							$next_attachment_url = get_permalink( $post->post_parent );
						endif;
					else :
						// or, if there's only 1 image, get the URL of the image
						$next_attachment_url = get_permalink( $post->post_parent );
					endif;
					?>
					<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
						$attachment_size = apply_filters( 'twentytwelve_attachment_size', array( 960, 960 ) );
						echo wp_get_attachment_image( $post->ID, $attachment_size );
						?></a>

					<?php if ( ! empty( $post->post_excerpt ) ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
				</div><!-- .attachment -->
			</article>
			<nav id="image-navigation" class="article-navigation" role="navigation">
				<?php if($index>2){?>
				<span class="previous-image"><a href="<?php get_attachment_link( $attachments[ $index-2 ]->ID )?>">&larr; 上一张</a></span>
				<?php }?>

				<span class="next-image"><a href="<?php echo esc_url( $next_attachment_url ); ?>">下一张 &rarr;</a></span>
			</nav><!-- #image-navigation -->

			<div class="article-content">
				<?php the_content(); ?>
			</div>




			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>