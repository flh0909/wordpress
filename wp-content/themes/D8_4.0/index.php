<?php get_header(); ?>
<?php if (dopt('d_adindex_01_b')) printf('<div class="banner banner-navbar">' . dopt('d_adindex_01') . '</div>'); ?>
    <div class="content-wrap">
        <div class="content">

            <?php
            if( $paged && $paged > 1 ){}else{
                 //if (dopt('d_sticky_b')) include 'modules/sticky.php';
                include 'modules/recommend.php';
            ?>
            <?php }?>

            <h2 class="title">本周热门</h2>
            <?php
                $hot_ids=array();
                $args_hot = array(
                'ignore_sticky_posts' => 1,
                    'meta_key'=>'views',
                    'orderby'=>'meta_value_num',
//                    'orderby'=> 'comment_count',
                'showposts'=>3,
                'post__not_in' => get_option('sticky_posts'),
                'date_query' => array(
                    'after' => date('Y-m-d H:i:s', time() - 60 * 60 * 24 * 7)
                )
            );
            query_posts($args_hot);
            ?>
            <ul class="week-hot clear">
                <?php while (have_posts()) : the_post(); array_push($hot_ids,$post->ID)?>
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
            // echo json_encode(get_option('sidebars_widgets'));
            // echo json_encode($hot_ids);
            // echo json_encode(get_option('sticky_posts'));
            if (dopt('d_adindex_03_b')) printf('<div class="banner banner-contenttop">' . dopt('d_adindex_03') . '</div>');

            if( $paged && $paged > 1 ){
            printf('<header class="archive-header"><h1>最新发布 第'.$paged.'页</h1></header>');
            }else{
            #if (dopt('d_sticky_b')) include 'modules/sticky.php';

            printf('<h2 class="title">最新发布</h2>');
            }

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'ignore_sticky_posts' => 1,
                 //'orderby'=>'comment_count',
                'posts_per_page'=>10,
                'paged' => $paged//,
                //'post__not_in' => array_merge(get_option('sticky_posts'),$hot_ids)
            );
            query_posts($args);
            include 'modules/excerpt.php';
            ?>
        </div>
    </div>
<?php get_sidebar();
get_footer(); ?>