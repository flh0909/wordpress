<h2 class="title">今日推荐</h2>
<div class="recommend clear">
    <?php $args = array(
        'order' => 'DESC',
        'orderby'=>'date',
        'cat' => 39,
        'posts_per_page' => 4
    );
    query_posts($args);
    $_post_index = 0;
    ?>

    <?php while (have_posts()) :
    the_post();
    if ($_post_index == 0){
    ?>
    <div class="recommend-top">
        <a href="<?php the_permalink(); ?>" class="thumbnail"><?php deel_thumbnail(); ?>
            <span><?php the_title(); ?></span>
        </a>
    </div>
    <ul class="recommend-list ">
        <?php } else {?>
            <li>
                <a href="<?php the_permalink() ?>"  title="<?php the_title(); ?> - <?php bloginfo('name'); ?>"><?php the_title(); ?></a>
            </li>
            <?php
        }
        $_post_index++;
        endwhile;
        wp_reset_query(); ?>
    </ul>
</div>