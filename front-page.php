<?php 

/*
    Template Name: Home
*/ 
?>

<?php get_header(); ?>

<section class="banner">
      <div class="container">
        <div class="banner__wrapper">
          <h1><?php echo get_field('banner_title'); ?></h1>
          <div class="banner__grid">
            <div class="banner__main">
                

              <article class="banner__story">
                <!-- DISPLAYING 1 POST -->
              <?php
                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'uncategorized'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args)
                ?>

                <?php if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();?>


                <!-- <picture>
                  <source
                    srcset="<?php echo get_template_directory_uri();?>./img/img-1-sm.webp"
                    media="(max-width:719px)"
                  />
                  <source srcset="<?php echo get_template_directory_uri();?>./img/img-1.webp" media="(min-width:720px)" />
                  <img src="<?php echo get_template_directory_uri();?>./img/img-1.webp" alt="blog-img" />
                </picture> -->
                <?php echo get_the_post_thumbnail() ?>
                <div class="banner__story__content">
                  <small><?php echo get_the_date('M/d/y')?></small>
                  <h2>Malesuada Fames Ac Ante Ipsum Primis In Faucibus</h2>
                  <p>
                    <?php the_excerpt(); ?>
                  </p>
                  <a href="<?php the_permalink(); ?>">Read More...</a>
                </div>

                <?php
                endwhile;
                else :
                    echo 'No available content';
                endif;
                wp_reset_postdata();
                ?>
              </article>


            </div>

            <div class="banner__sidebar">
                 <!-- DISPLAYING 4 POST AND SKIP 1 POST-->
                <?php
                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 4,
                        'offset' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'uncategorized'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args)
                ?>

                <?php if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();?>
               
              <div class="card__sm">
                <?php echo get_the_post_thumbnail() ?>
                <div class="card__sm__content">
                  <small><?php echo get_the_date('M/d/y') ?></small>
                  <h3><?php the_title(); ?></h3>
                  <a href="<?php the_permalink(); ?>">Read More...</a>
                </div>
              </div>
              <?php
                endwhile;
                else :
                    echo 'No available content';
                endif;
                wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="latest">
      <div class="container">
        <h2>Latest Story</h2>
        <div class="latest__wrapper">

        <!-- displaying 3 items -->
                <?php
                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'Latest Post'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args)
                ?>

                <?php if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();?>
          <div class="card__md">
          <?php echo get_the_post_thumbnail() ?>
            <div class="card__md__content">
              <ul>
                <li><small><?php echo get_the_date('M/d/y') ?></small></li>
                <li><small><?php echo get_field('the_category');?></small></li>
              </ul>
              <h3>
                <?php the_title(); ?>
              </h3>

              <p>
              <?php the_excerpt(); ?>
              </p>
              <a href="<?php the_permalink(); ?>">Read More...</a>
            </div>
          </div>
          <?php
                endwhile;
                else :
                    echo 'No available content';
                endif;
                wp_reset_postdata();
              ?>
        </div>
      </div>
    </section>

    <section class="feature">
      <div class="feature__content">
        <h2><?php echo get_field('feature_title')?></h2>
        <h3 class="block__header">
          <?php echo get_field('feature_h2');?>
        </h3>
        <p>
        <?php echo get_field('feature_parag');?>
        </p>
      </div>

      <div class="container">
        <div class="feature__img">

                <?php
                    $featureImg = get_field('feature_img');
                    if(!empty($featureImg)):
                ?>
                <img src="<?php echo esc_url($featureImg['url']); ?>" alt="<?php echo esc_attr($featureImg['alt']); ?>">
                <?php endif;?>
        </div>
      </div>

      <div class="container">
        <div class="feature__wrapper">
          <div class="feature__main">
          <?php
                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'Featured Post'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args)
                ?>

                <?php if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();?>
            <article class="card__lg">
            <?php echo get_the_post_thumbnail() ?>
              <div class="card__lg__content">
                <small><?php echo get_the_date('M/d/y') ?></small>
                <h3>
                  <?php the_title(); ?>
                </h3>
                <p>
                  <?php the_excerpt(); ?>
                </p>
                <a href="<?php the_permalink();?>">Read More...</a>
              </div>
            </article>
            <?php
                endwhile;
                else :
                    echo 'No available content';
                endif;
                wp_reset_postdata();
              ?>
          </div>
          <div class="feature__sidebar">
                <?php
                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 6,
                        'offset' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'Featured Post'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args)
                ?>
                 <?php if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();?>
            <div class="card__mini">
              <small><?php echo get_the_date('M/d/y') ?></small>
              <h4>
                <?php the_title(); ?>
              </h4>
              <a href="<?php the_permalink();?>">Read More ...</a>
            </div>
            <?php
                endwhile;
                else :
                    echo 'No available content';
                endif;
                wp_reset_postdata();
              ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>