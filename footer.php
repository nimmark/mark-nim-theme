<?= wp_footer(); ?>

<footer class="site-footer">
    <div class="site-footer__container">
        <h5 class="heading-5 site-logo"><a href="<?= site_url() ?>" class="site-logo__url--white"><?= bloginfo('name'); ?></a></h5>
        <h6 class="heading-6 text-white">&#xa9; <?= date('Y') ?> Mark G. Nim. All rights reserved</h6>
    </div>


</footer>

<?php
$svg_sprites = get_template_directory() . '/images/icomoon-sprites.svg';
if (file_exists($svg_sprites)) {
    echo file_get_contents($svg_sprites);
}
?>

</body>

</html>