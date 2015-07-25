<ul id="scroll">
	<li><a class="scroll-t" title="返回顶部"><i class="icon-scroll-t"></i></a></li>
	<?php if (get_option('ygj_share') == 'true') { ?>
		<li><a href="#share" id="share-main" title="分享"><i class="icon-share"></i></a></li>
	<?php } ?>

	<?php wp_reset_query();if(is_single() || is_page()) { ?>
		<li><a href="#respond" class="scroll-c" title="发表评论"><i class="icon-scroll-c"></i></a></li>
	<?php } ?>
	<li><a class="scroll-b" title="转到底部"><i class="icon-scroll-b"></i></a></li>
</ul>

