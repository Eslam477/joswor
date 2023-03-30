<?php
get_header()
?>
<?php get_template_part('inc/parts/navs/nav', '1'); ?>

<section class="page-aboutUs-thumbnail-section">
    <div style='background-image: url(<?php echo get_the_post_thumbnail_url() ?>);' class="x">
        <div class="text-center">
            <h2>Welcome to Joswor</h2>
        </div>
    </div>
</section>

<section class="pt-4 container content-section">
    <h3>Who Are We?</h3>
    <div class="row">
        <div class="col-6">
            <p><?php the_content() ?></p>
        </div>
        <div class="col-6">
            <span class="logo">
                <img src="<?php echo get_theme_file_uri() . '/assets/img/logo2.png' ?>" height="550" width="550">
            </span>
        </div>
    </div>
</section>

<?php get_template_part('inc/parts/footers/footer', '1'); ?>

<?php
get_footer()
?>