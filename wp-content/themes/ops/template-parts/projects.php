<?php
/**
 * Template Name: template-projects
 *
 * @package WordPress
 * @subpackage ops
 * @since  1.0
 */
get_header(); ?>

<div class="page-content">
    <div id="content">
        <header>
            <div class="cover bg-light">
                <div class="container px-3">
                    <div class="row">
                        <div class="col-lg-6 p-3"><img class="img-fluid"
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/illustrations/hello1.svg"
                                alt="hello" />
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-5 d-none d-sm-block text-center">

                                <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">Solutions
                                    Shaping Tomorrow</h1>


                                <p class="" style="font-size: xx-large;">It's not hard to find perfect solutions when
                                    you know what your values are</p>
                            </div>
                            <div class="mb-5 d-block d-sm-none text-center">

                                <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">Solutions
                                    Shaping Tomorrow
                                </h1>
                                <p class="" style="font-size: large;">It's not hard to find perfect solutions when
                                    you know what your values are</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
    </div>
</div>
<div class="section px-3 px-lg-4 pt-5" id="experience">
    <div class="container-narrow">
        <div class="text-center mb-5">
            <h2 class="marker marker-center">Our Projects</h2>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'projects',
                'posts_per_page' => -1,
                'post_status'    => 'publish', // Only retrieve published posts
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'projects',
                    ),
                ),
            );

            $custom_query = new WP_Query($args);
            $count = 0; // Initialize count variable
            if ($custom_query->have_posts()):
                while ($custom_query->have_posts()):
                    $custom_query->the_post();
                    // Fetch and display ACF fields
                    $custom_field_value = get_field('projects');
                    // Determine the animation direction based on the count
                    $animation_direction = ($count % 2 == 0) ? 'fade-left' : 'fade-right';
                    if (!empty($custom_field_value)) {
                        ?>
                        <div class="col-md-6">

                            <div class="card mb-3" data-aos="<?php echo $animation_direction; ?>" data-aos-delay="100">
                                <div class="card-header px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3 class="h5 mb-1">
                                                <?php echo $custom_field_value['title']; ?>
                                            </h3>
                                            <!-- <div class="text-muted text-small">Designerr Inc. <small>(2012-2014)</small>
                                    </div> -->
                                        </div>
                                        <!--<img src="images/services/ui-ux.svg" width="48" height="48" alt="ui-ux" /> -->
                                    </div>
                                </div>
                                <div class="card-body px-3 py-2">
                                    <p class="text-justify">
                                        <?php echo $custom_field_value['description']; ?>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    $count++; // Increment the count
                endwhile;
            else:
                echo '';
            endif;
            wp_reset_postdata(); // Reset the query
            ?>
        </div>
    </div>
</div>

<?php get_footer();