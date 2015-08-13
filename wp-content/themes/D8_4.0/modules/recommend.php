<h2 class="title">今日推荐</h2>
<div class="recommend clear">
    <?php $_post_index = 0; ?>

    <?php $sticky = get_option('sticky_posts');
    rsort($sticky);
    query_posts(array('post__in' => $sticky, 'ignore_sticky_posts' => 1, 'showposts' => dopt('d_sticky_count') ? dopt('d_sticky_count') : 2));
    while (have_posts()) :
    the_post();

    if ($_post_index == 0){
    ?>
    <div class="recommend-top">
        <a href="<?php the_permalink(); ?>" class="thumbnail"><?php deel_thumbnail(); ?>
            <span><?php the_title(); ?></span>
        </a>
    </div>
    <ul class="recommend-list ">
        <?php } else { ?>
            <li>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?> - <?php bloginfo('name'); ?>"><?php deel_thumbnail("thumbnail"); ?></a>
                <a class="text-overflow" href="<?php the_permalink() ?>" title="<?php the_title(); ?> - <?php bloginfo('name'); ?>"><?php the_title(); ?></a>
                <p class="muted"><?php echo deel_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 48, '...')?></p>
            </li>

        <?php
        }
        $_post_index++;
        endwhile;
        wp_reset_query();
        ?>
    </ul>
</div>