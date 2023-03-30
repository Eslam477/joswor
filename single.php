<?php
get_header();
?>
<?php get_template_part('inc/parts/navs/nav', '1'); ?>



<?php
if (have_posts()) {
?>
    <section class="single_post container">
        <div class="post_thumpnail" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></div>
        <h1><?php the_title() ?></h1>
        <small><?php the_time('F jS, Y'); ?></small>
        <br>
        <small>
            <b>Tags :</b>
            <?php
            $posttags = get_the_tags();
            if ($posttags) {
                foreach ($posttags as $tag) {
                    echo $tag->name . ' ';
                }
            }
            ?>
        </small>
        <p>
            <?php the_content() ?>
        </p>
    </section>
<?php

}
?>





<?php get_template_part('inc/parts/footers/footer', '1'); ?>
<?php
get_footer();
?>