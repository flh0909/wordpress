<?php get_header(); ?>
<?php if (dopt('d_adindex_01_b')) printf('<div class="banner banner-navbar">' . dopt('d_adindex_01') . '</div>'); ?>
    <div class="content-wrap">
        <div class="content">

            <?php //if (dopt('d_sticky_b')) include 'modules/sticky.php'; ?>


            <h2 class="title">本周热门</h2>
            <?php
            $args_hot = array(
                'orderby' => array('post_date'>='DESC'),
                'showposts' => 2,
                'date_query' => array(
                    'after' => date('Y-m-d H:i:s', time() - 60 * 60 * 24 * 7)
                )
            );
            query_posts($args_hot);
            ?>
            <ul class="week-hot clear">
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <div>
                            <a href="<?php the_permalink(); ?>" class="thumbnail"><?php deel_thumbnail(); ?></a>
                            <a href="<?php the_permalink() ?>" class="week-hot-title" title="<?php the_title(); ?> - <?php bloginfo('name'); ?>"><?php the_title(); ?></a>

                            <p>
                                <span class="muted"><i class="icon-eye-open icon12"></i> <?php deel_views('浏览'); ?></span>
    <span class="muted"><i class="icon-comment icon12"></i> <?php
        if (comments_open()) echo '<a href="' . get_comments_link() . '">' . get_comments_number('0', '1', '%') . '评论</a>';
        ?></span>
                            </p>
                        </div>

                    </li>
                <?php endwhile;
                wp_reset_query(); ?>
            </ul>


            <?php
            if (dopt('d_adindex_03_b')) printf('<div class="banner banner-contenttop">' . dopt('d_adindex_03') . '</div>');

            #if( $paged && $paged > 1 ){
            #printf('<header class="archive-header"><h1>最新发布 第'.$paged.'页</h1><div class="archive-header-info"><p>'.get_option('blogname').get_option('blogdescription').'</p></div></header>');
            #}else{
            #if (dopt('d_sticky_b')) include 'modules/sticky.php';

            printf('<h2 class="title">最新发布</h2>');
            #}

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'ignore_sticky_posts' => 1,
                // 'orderby'=>'comment_count',
                'paged' => $paged,
                'post__not_in' => get_option('sticky_posts')
            );
            query_posts($args);
            include 'modules/excerpt.php';
            ?>
        </div>
    </div>
<?php get_sidebar();
get_footer(); ?>