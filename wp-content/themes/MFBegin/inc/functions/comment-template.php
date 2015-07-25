<?php
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	// 楼层
	global $commentcount;
	if(!$commentcount) {
		$page = get_query_var('cpage')-1;
		$cpp=get_option('comments_per_page');
		$commentcount = $cpp * $page;
	}
?>
	<div id="anchor"><div id="comment-<?php comment_ID() ?>"></div></div>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
		<?php echo my_avatar( $comment->comment_author_email,40,$default='',$comment->comment_author); ?>
		<!--<?php printf( __( '<cite class="fn">%s</cite> <span class="says">:</span>' ), get_comment_author_link() ); ?>-->
		<strong><?php commentauthor(); ?><?php get_author_class($comment->comment_author_email,$comment->user_id); ?><?php if(user_can($comment->user_id, 1)){echo '<span class="dengji">【站长】</span>';}; ?><br/></strong>
		<span class="comment-meta commentmetadata">
			<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"></a>
			<span class="comment-aux">
				<?php printf( __('%1$s at %2$s'), get_comment_date( 'Y年m月d日' ),  get_comment_time('H点i分') ); ?>
				<?php
					if ( is_user_logged_in() ) {
						$url = get_bloginfo('url');
						echo '<a id="delete-'. $comment->comment_ID .'" href="' . wp_nonce_url("$url/wp-admin/comment.php?action=deletecomment&amp;p=" . $comment->comment_post_ID . '&amp;c=' . $comment->comment_ID, 'delete-comment_' . $comment->comment_ID) . '" >&nbsp;删除</a>';
					}
				?>
				<?php edit_comment_link( '编辑' , '&nbsp;', '' ); ?>
				<span class="floor">
					<?php
						if(!$parent_id = $comment->comment_parent){
							switch ($commentcount){
								case 0 :echo "&nbsp;沙发";++$commentcount;break;
								case 1 :echo "&nbsp;板凳";++$commentcount;break;
								case 2 :echo "&nbsp;地板";++$commentcount;break;
								default:printf('&nbsp;%1$s楼', ++$commentcount);
							}
						}
					?>
					<?php if( $depth > 1){printf('&nbsp;地下%1$s层', $depth-1);} ?>
				</span>
			</span>
			<span class="reply">&nbsp;<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
		</span>
	</div>
	<?php comment_text(); ?>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<div class="comment-awaiting-moderation">您的评论正在等待审核！</div>
	<?php endif; ?>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}