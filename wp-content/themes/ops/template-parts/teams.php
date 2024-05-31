<?php
/**
 * Template Name: template-teams
 *
 * @package WordPress
 * @subpackage ops
 * @since  1.0
 */
get_header(); ?>

<div class="page-content">
  <div id="content">
    <div class="section px-3 px-lg-4 pt-5" id="testimonials">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="marker marker-center">Expert Group</h2>
        </div>
        <div>
          <h6 class="text-center">Welcome to Expert Group, a cornerstone of OPS Group, where specialized
            knowledge and proficiency converge to propel operational excellence. Our Visionary Experts come
            together to drive transformative change. Here experts offer expert solutions, guidance and
            insights to drive innovation, efficiency, and success. Together, we navigate challenges, seize
            opportunities, and shape a brighter future. Join us in shaping tomorrow </h6>
        </div>

        <div class="row mt-4">
          <?php
          $args = array(
            'post_type' => 'teams',
            'posts_per_page' => -1,
            'post_status' => 'publish', // Only retrieve published posts
            'tax_query' => array(
              array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'teams',
              ),
            ),
            'orderby' => 'ID',   // Order by post ID
            'order' => 'ASC', // Show posts in descending order
          );

          $custom_query = new WP_Query($args);
          $count = 0; // Initialize count variable
          if ($custom_query->have_posts()):
            while ($custom_query->have_posts()):
              $custom_query->the_post();

              // Fetch and display ACF fields
              $custom_field_value = get_field('teams');
              // Determine the animation direction based on the count
              $animation_direction = ($count % 2 == 0) ? 'fade-left' : 'fade-right';
              if (!empty($custom_field_value)) {
                ?>
                <div class="col-xl-6 mb-5" data-aos="<?php echo $animation_direction; ?>" data-aos-delay="300">
                  <div class="d-flex">
                    <span><i class="fas fa-2x fa-quote-left"></i></span>
                    <span class="ms-2 my-2 quote">
                      <?php echo $custom_field_value['expert_message']; ?>
                    </span>
                  </div>
                  <div class="d-flex justify-content-end align-items-end">
                    <div class="text-end me-2">
                      <div class="fw-bolder">
                        <?php echo $custom_field_value['title']; ?>
                      </div>
                      <div class="text-small">
                        <?php echo $custom_field_value['expert_in']; ?>
                      </div>
                    </div>
                    <img class="rounded" src="<?php echo $custom_field_value['expert_image']['sizes']['medium_large']; ?>"
                      alt="<?php echo $custom_field_value['title']; ?>" />
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

        <?php
        $ar_gs = array(
          'post_type' => 'teams',
          'posts_per_page' => 1,
          'post_status' => 'publish', // Only retrieve published posts
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'founder',
            ),
          ),
        );

        $custom_que_ry = new WP_Query($ar_gs);
        if ($custom_que_ry->have_posts()):
          while ($custom_que_ry->have_posts()):
            $custom_que_ry->the_post();

            // Fetch and display ACF fields
            $custom_field_va_lue = get_field('teams');
            if (!empty($custom_field_va_lue)) {
              ?>
              <div class="section px-2 px-lg-4 pt-5" id="services">
                <div class="container">
                  <div class="card mb-3 main-ceo-card" style="">
                    <div class="row g-0">
                      <div class="img-prof col-md-3 photo-col d-flex justify-content-center align-items-center mt-2">
                        <img id="founder" src="<?php echo $custom_field_va_lue['expert_image']['sizes']['medium_large']; ?>"
                          alt="<?php echo $custom_field_va_lue['title']; ?>" class=" rounded-start  ceo-image" alt="...">
                      </div>
                      <div class="col-md-9">
                        <div class="card-body">

                          <p>
                            <?php echo $custom_field_va_lue['expert_message']; ?>
                          </p>
                          <h5 class="card-title">
                            <?php echo $custom_field_va_lue['title']; ?>
                          </h5>
                          <p class="card-text"><small class="text-body-secondary">
                              <?php echo $custom_field_va_lue['expert_in']; ?>
                            </small>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          endwhile;
        else:
          echo '';
        endif;

        wp_reset_postdata(); // Reset the query
        ?>
      </div>
    </div>

    <?php get_footer();