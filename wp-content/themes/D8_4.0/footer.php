</section>
<footer class="footer">
    <div class="footer-inner container">
        <div class="copyright pull-left">
            版权所有，保留一切权利！ &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>　<br/>
            <?php if(dopt('d_contact_mail')){?>联系我们：<a style="color:#ddd;" href="mailto:<?php echo dopt('d_contact_mail'); ?>"><?php echo dopt('d_contact_mail'); ?></a><?php }?>

            <?php zh_cn_l10n_icp_num()?>
        </div>
        <div class="trackcode pull-right">
            <?php if( dopt('d_track_b') ) echo dopt('d_track'); ?>
        </div>
    </div>
</footer>
<?php 
wp_footer(); 
if( dopt('d_footcode_b') ) echo dopt('d_footcode'); 
?>
</body>
</html>