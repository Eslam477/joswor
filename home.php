<?php
get_header();
?>
<?php get_template_part('inc/parts/navs/nav', '1'); ?>

<section class="container mt-4">
    <div class="row">
        <?php if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <div class="the_post col-4">
                    <div class="post_thumpnail" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></div>
                    <div class="details">
                        <h3>
                            <?php the_title() ?>
                        </h3>
                        <?php the_excerpt() ?>
                        <a href="<?php echo the_permalink() ?>" class="w-100 text-center">
                            Read More <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>

<?php get_template_part('inc/parts/footers/footer', '1'); ?>

<?php
get_footer();
?>