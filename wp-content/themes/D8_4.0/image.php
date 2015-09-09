<?php get_header(); ?>
<div class="content-wrap">
	<div class="content">

		<?php
		$gid=$_GET['gid'];
		$aid=$_GET['aid'];
		query_posts(array('p' =>$gid ));
		?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php

			/**
			 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
			 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
			 */
			//$attachments = array_values( get_children( array( 'post_parent' => ($_GET['gid'] || $post->post_parent), 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
			$attachments=get_post_meta($gid, '_easy_image_gallery', true);
			// echo 'IDS__'.$attachments;
			$attachments = explode( ',', $attachments );
			$index=0;
			foreach ( $attachments as $attachment ) :
				$index++;
				if ( $attachment == $aid )
					break;

			endforeach;
			?>
			<header class="article-header">
				<h1 class="article-title"><a href="/?gid=<?php echo $gid.'&aid='.$aid?>"><?php echo get_the_title( $gid ); ?></a> (<?php echo $index.'/'.count($attachments)?>)</h1>
				<!--<div class="meta">

					<time class="muted"><i class="ico icon-time icon12"></i> <?php /*echo get_the_time('Y-m-d G:i:s')*/?></time>
				<span class="muted"><i class="ico icon-eye-open icon12"></i>
	<span id="j_post_views"><?php /*if(!is_user_logged_in()){ echo "0 浏览"; }else{deel_views('浏览');} */?>	</span>
		</span>

					<?php /*if ( comments_open() ) echo '<span class="muted"><i class="icon-comment icon12"></i> <a href="'.get_comments_link().'">'.get_comments_number('0', '1', '%').'评论</a></span>'; */?><?php /*edit_post_link('[编辑]'); */?>
				</div>-->
				<?php deel_share(); ?>
			</header>

			<article class="article-content article-content-image">
				<div class="attachment">
					<?php


					$k++;
					// If there is more than 1 attachment in a gallery
					if ( count( $attachments ) > 1 ) :
						if ( isset( $attachments[  $index ] ) ) :
							// get the URL of the next image attachment
							$next_attachment_url = '/?gid='.$gid.'&aid='.$attachments[ $index ];
						else :
							// or get the URL of the first image attachment
							$next_attachment_url = '/archives/'.$gid;
						endif;
					else :
						// or, if there's only 1 image, get the URL of the image
						$next_attachment_url = '/archives/'.$gid;
					endif;
					?>
					<a href="<?php echo ( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
						$attachment_size = apply_filters( 'twentytwelve_attachment_size', array( 960, 960 ) );
						echo remove_width_height(wp_get_attachment_image( $aid, $attachment_size ));
						?></a>



				</div><!-- .attachment -->
			</article>


			<article class="article-content">

<?php echo remove_width_height(get_post($_GET['aid'])->post_content)?>
			</article>

			<nav id="image-navigation" class="article-navigation" role="navigation">
				<?php if($index>1){?>
				<span class="previous-image"><a href="/?gid=<?php echo $gid.'&aid='.$attachments[ $index -2]?>">&larr; 上一张</a></span>
				<?php }?>

				<span class="next-image"><a href="<?php echo ( $next_attachment_url ); ?>">下一张 &rarr;</a></span>
			</nav><!-- #image-navigation -->





			<?php endwhile; // end of the loop.
		wp_reset_query();
		?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar();get_footer(); ?>