<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php wp_title('-', true, 'right');
        echo get_option('blogname');
        if (is_home()) echo ' - '.get_option('blogdescription');
        if ($paged > 1) echo '-Page ', $paged; ?></title>
    <?php
    $sr_1 = 0;
    $sr_2 = 0;
    $commenton = 0;
    if (dopt('d_sideroll_b')) {
        $sr_1 = dopt('d_sideroll_1');
        $sr_2 = dopt('d_sideroll_2');
    }
    if (is_singular()) {
        if (comments_open()) $commenton = 1;
    }
    ?>
    <script>
        window._deel = {
            name: '<?php bloginfo('name') ?>',
            url: '<?php echo get_bloginfo("template_url") ?>',
            rss: '<?php echo dopt('d_rss') ?>',
            ajaxpager: '<?php echo dopt('d_ajaxpager_b') && wp_is_mobile() ?"on":"" ?>',
            maillist: '<?php echo dopt('d_maillist_b') ?>',
            maillistCode: '<?php echo dopt('d_maillist') ?>',
            commenton: <?php echo $commenton ?>,
            roll: [<?php echo $sr_1 ?>, <?php echo $sr_2 ?>],
            tougaoContentmin: <?php echo dopt('d_tougao_contentmin')?dopt('d_tougao_contentmin'):200 ?>,
            tougaoContentmax: <?php echo dopt('d_tougao_contentmax')?dopt('d_tougao_contentmax'):5000 ?>,
            appkey: {
                tqq: '<?php echo dopt('t_appkey_tqq') ?>',
                tsina: '<?php echo dopt('t_appkey_tsina') ?>',
                t163: '<?php echo dopt('t_appkey_t163') ?>',
                tsohu: '<?php echo dopt('t_appkey_tsohu') ?>'
            }
        }
    </script>
    <?php
    wp_enqueue_style('base', get_stylesheet_directory_uri().'/styles/base.css', array(), '3.0');
    wp_enqueue_style('form', get_stylesheet_directory_uri().'/styles/form.css', array(), '3.0');
    wp_enqueue_style('icon', get_stylesheet_directory_uri().'/styles/icon.css', array(), '3.0');
    wp_enqueue_style('components', get_stylesheet_directory_uri().'/styles/components.css', array(), '3.0');
    wp_enqueue_style('widget', get_stylesheet_directory_uri().'/styles/widget.css', array(), '3.0');
    wp_enqueue_style('ui', get_stylesheet_directory_uri().'/styles/ui.css', array(), '3.0');
    wp_enqueue_style('response', get_stylesheet_directory_uri().'/styles/response.css', array(), '3.0');

    wp_head();
    if (dopt('d_headcode_b')) echo dopt('d_headcode');
    $style = '';
    if (dopt('article_content_fontsize')) {
        $lineheight = '';
        //if (dopt('article_content_fontsize') == '16') $lineheight = 'line-height:27px;}.article-content p{margin:20px 0;';
        //$style .= '.article-content{font-size: ' . dopt('article_content_fontsize') . 'px;' . $lineheight . '}@media (max-width:640px){.article-content{font-size:16px}}';
    }
    if (dopt('d_banner_show')) {
        $style .= '@media (max-width:767px){.banner{display:none}}';
    }
    if (dopt('d_logo_w')) {
        $style .= '.navbar .logo{width:' . dopt('d_logo_w') . 'px}@media (max-width: 979px){.navbar .logo{width:100%}}';
    }
    if (dopt('d_navfix')) {
        $style .= 'body{margin-top: 40px}.navbar-wrap{position:fixed}@media (max-width: 979px){body{margin-top: 0}.navbar-wrap{position:relative}}';
    }
    echo '<style>' . $style . '</style>';
    ?>
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script><![endif]-->
</head>
<body <?php body_class(); ?>>
<div class="navbar-wrap ">
    <div class="navbar container">
        <?php
        $logoTagName = is_home() ? 'h1' : 'div';
        echo '<' . $logoTagName . ' class="logo"><a href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '-' . get_bloginfo('description') . '">' . get_bloginfo('name') . '</a></' . $logoTagName . '>' . "\n";
        ?>
        <ul class="nav">
            <?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'nav', 'echo' => false)))); ?>
        </ul>

    </div>
</div>
<header class="header">
    <a class="header-logo pull-left" href="/"></a>
    <div class="header-name pull-left">
        <h1><a href="<?php echo get_bloginfo('url')?>" title="<?php echo get_bloginfo('name') . '-' . get_bloginfo('description')?>"><?php echo get_bloginfo('name')?></a></h1>
        <p><span><?php echo get_bloginfo('description')?>&nbsp;&nbsp;<a href="/"><?php echo get_bloginfo('url')?></a></span></p>
<!--        <p class="bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></p>-->
    </div>
    <div class="menu pull-right">
        <div class="top-search">
            <form method="get" class="dropdown search-form" action="<?php /*echo esc_url(home_url('/')); */?>">
                <input class="search-input" name="s" type="text" placeholder="输入关键字搜索"<?php /*if (is_search()) {
                echo ' value="' . htmlspecialchars($s) . '"';
            } */?> x-webkit-speech=""><input class="btn btn-success search-submit" type="submit" value="搜索">
                <ul class="dropdown-menu search-suggest"></ul>
            </form>
        </div>
        <div class="btn-group pull-left">
            <?php if (dopt('d_tqq_b') || dopt('d_weibo_b') || dopt('d_facebook_b') || dopt('d_twitter_b')) { ?>
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">关注 <i class="caret"></i></button>
                <ul class="dropdown-menu pull-right">
                    <?php if (dopt('d_tqq_b')) echo '<li><a href="' . dopt('d_tqq') . '" target="_blank">腾讯微博</a></li>'; ?>
                    <?php if (dopt('d_weibo_b')) echo '<li><a href="' . dopt('d_weibo') . '" target="_blank">新浪微博</a></li>'; ?>
                    <?php if (dopt('d_facebook_b')) echo '<li><a href="' . dopt('d_facebook') . '" target="_blank">Facebook</a></li>'; ?>
                    <?php if (dopt('d_twitter_b')) echo '<li><a href="' . dopt('d_twitter') . '" target="_blank">Twitter</a></li>'; ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</header>
<section class="container">
<?php if (dopt('d_adsite_01_b')) echo '<div class="banner banner-site">' . dopt('d_adsite_01') . '</div>'; ?>