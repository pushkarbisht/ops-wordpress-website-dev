<?php
/**
 * 
 *
 * @package WordPress
 * @subpackage ops
 * @since  1.0
 */
get_header(); ?>

<?php
// Check if there are posts available
if (have_posts()) {
    // Loop through each post (there should be only one in this context)
    while (have_posts()) {
        the_post();

        // Display custom fields using Advanced Custom Fields (ACF) plugin
        $custom_field_value = get_field('services'); // Assuming 'services' is your custom field name
        if ($custom_field_value) {
            ?>

            <main class="container mt-2">
                <div class="row">
                    <div class="col-md-8">
                        <header class="header">
                            <h2 class="heading">
                                <?php echo esc_html($custom_field_value['title']) ?>
                            </h2>
                        </header>
                        <section class="content">
                            <img class="img-fluid" src="<?php echo $custom_field_value['image']['sizes']['medium_large']; ?>"
                                alt="<?php echo esc_html($custom_field_value['title']); ?>" />
                            <p>
                                <?php the_content(); // Output content from the WordPress editor ?>
                            </p>
                        </section>
                    </div>
                    <?php
        }
    }
}
?>

        <div class="col-md-4">
            <aside class="aside">
                <h4 class="heading">Other Services</h4>
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 2,
                    'post_status' => 'publish', // Only retrieve published posts
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'services',
                        ),
                    ),
                    'orderby' => 'rand', // Order posts randomly
                );

                $custom_query = new WP_Query($args);

                if ($custom_query->have_posts()):
                    while ($custom_query->have_posts()):
                        $custom_query->the_post();

                        // Fetch and display ACF fields
                        $custom_field_value = get_field('services');
                        if (!empty($custom_field_value)) {
                            ?>
                            <a class="text-decoration-none" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <div class="card">
                                    <img class="mb-2" src="<?php echo $custom_field_value['image']['sizes']['medium_large']; ?>"
                                        alt="<?php echo esc_html($custom_field_value['title']); ?>" width="96" height="96" />
                                    <div>
                                        <p class="heading title"><?php echo esc_html($custom_field_value['title']); ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    endwhile;
                else:
                    echo '';
                endif;

                wp_reset_postdata(); // Reset the query
                ?>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>