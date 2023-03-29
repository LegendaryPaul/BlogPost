<?php get_header(); ?>

<section class="thePost">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php echo get_the_post_thumbnail() ?>
        <p>
        <small><?php echo get_the_date('M/d/y'); ?></small>
        </p>
        <?php get_field('the_category'); ?>
        <?php the_content(); ?>
        <div class="thePost__wrapper">
        </div>
    </div>
</section>


<?php get_footer(); ?>
