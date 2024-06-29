<?php
/**
 * Template Name: template-home
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
                alt="hello" /></div>
            <div class="col-lg-6">
              <div class="mt-5 d-none d-sm-block text-center">

                <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">The best way out is always
                  through
                </h1>

                <p class="" style="font-size: xx-large;">One Point Solution</p>
              </div>
              <div class="mb-5 d-block d-sm-none text-center">

                <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">The best way out is always
                  through
                </h1>
                <p class="" style="font-size: xx-large;">One Point Solution</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>

    <div class="section px-2 px-lg-4 pt-5" id="services">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="marker marker-center">Our Services</h2>
        </div>
        <div class="text-center">
          <p class="mx-auto mb-3">OPS GROUP carry on the business of Providing Support Services whether information
            technology enabled
            or otherwise, including but not limited to providing back office services, enterprise content and data
            services, job portal development, accounting, legal services, business analysis, business intelligence ,
            advertising, public relations, business, commercial and administrative services in India and abroad. </p>
          <p class="mx-auto mb-3">
            The One Point Solution (OPS) Group is a leading Research Center dedicated to
            conducting cutting-edge Research Projects. OPS Group is a multidisciplinary team
            of social scientists, engineers, and researchers who are committed to making a
            positive impact on the world through our Research Projects. Our research and
            analysis is focused on solving some of the most pressing challenges our nation is
            facing today in social, economical, technical, legal and public policy domain . We
            use a variety of cutting-edge techniques and technologies to conduct our research,
            and we collaborate with leading experts from around the world. We are also
            committed to training the next generation students. We offer a variety of vocational
            and training programs and opportunities for students and learners.
          </p>
        </div>
      </div>
    </div>

    <!-- end banner img section here -->
    <div class="section px-2 px-lg-4 pt-2 pt-md-5" id="services">
      <div class="container">
        <div class="block">
          <div class="row py-3 ">
            <?php
            $services_args = array(
              'post_type' => 'services',
              'posts_per_page' => -1,
              'post_status' => 'publish', // Only retrieve published posts
              'tax_query' => array(
                array(
                  'taxonomy' => 'category',
                  'field' => 'slug',
                  'terms' => 'services',
                ),
              ),
            );

            $services_query = new WP_Query($services_args);

            if ($services_query->have_posts()):
              while ($services_query->have_posts()):
                $services_query->the_post();

                // Fetch and display ACF fields
                $service_fields = get_field('services');
                if (!empty($service_fields)) {
                  ?>
                  <div class="col-md-4 pt-2 pt-md-0">
                    <a class="text-decoration-none" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                      <div class=" text-center" data-aos="fade-up" data-aos-delay="100">
                        <img class="mb-2" src="<?php echo $service_fields['image']['sizes']['medium_large']; ?>"
                          alt="<?php echo $service_fields['title']; ?>" width="96" height="96" />
                        <div class="h5">
                          <?php echo $service_fields['title']; ?>
                        </div>
                      </div>
                    </a>
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
      </div>
    </div>
    <!-- start banner img section here -->
    <div class="cover bg-light banner_bg_sec mt-4">
      <?php
      $professional_args = array(
        'post_type' => 'services',
        'posts_per_page' => 1,
        'post_status' => 'publish', // Only retrieve published posts
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => 'professional-network',
          ),
        ),
      );

      $professional_query = new WP_Query($professional_args);

      if ($professional_query->have_posts()):
        while ($professional_query->have_posts()):
          $professional_query->the_post();

          // Fetch and display ACF fields
          $professional_fields = get_field('services');
          if (!empty($professional_fields)) {
            ?>
            <div class="container px-3 h-100">
              <div class="row p-3 h-100">
                <div class="col-lg-6 d-flex align-items-center">
                  <div class="d-flex flex-column d-lg-block justify-content-center align-items-center h-1000">
                    <div lass="d-flex justify-content-center">
                      <img class="img-fluid" src="<?php echo $professional_fields['image']['sizes']['medium_large']; ?>"
                        alt="<?php echo $professional_fields['title']; ?>" alt="hello" width="200" />
                    </div>
                    <h4 class="pt-2 d-none d-md-block"><?php echo $professional_fields['title']; ?></h4>
                    <h4 class="pt-2 h6 d-block d-md-none"><?php echo $professional_fields['title']; ?></h4>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="d-flex justify-content-center justify-content-lg-end align-items-center h-100">
                    <button class="border-0 rounded px-4 py-2 nav-link btn btn-primary shadow-sm' hover-effect menu-button"><a
                        href="<?php echo esc_url(home_url('/home/registration-form')); ?>" class='text-decoration-none'>JOIN
                        NOW</a></button>
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
    <div class="section px-2 px-lg-4 pb-4 pt-5 mb-5" id="contact">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="marker marker-center">Contact Us</h2>
        </div>
        <div class="row">
          <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
            <div class="mt-3 px-1">
              <div class="h5">Hello, I am ARYA, your Personal AI
                Assistant….</div>
              <p>Everyone has faced problems at some
                point in life and it’s not always easy to
                find the right Solution. </p>
              <p>Finding the right
                solution can be incredibly empowering,
                as it can help us look beyond the current
                situation. Let’s discover new solutions.</p>
            </div>
          </div>
          <div class="col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="bg-light my-2 p-3 pt-2">
              <div class="" id="success_message_custom">
                <!-- Success message will be updated here -->
              </div>
              <form id="contactusform_custom" method="POST">
                <div class="form-group my-2">
                  <label for="email_custom" class="form-label fw-bolder">Email</label>
                  <input class="form-control" type="email" id="registration_email_custom" name="email_custom" required
                    placeholder="xyz@gmail.com">
                </div>
                <div class="form-group my-2">
                  <label for="purpose_custom" class="form-label fw-bolder">Purpose</label>
                  <select class="form-control" required id="purpose_custom" name="purpose_custom">
                    <option value="">----Select----</option>
                    <option value="Professional Network">Professional Network</option>
                    <option value="IT Solution">IT Solution</option>
                    <option value="Business Solution">Business Solution</option>
                    <option value="R&D">R&D</option>
                    <option value="Marketing Solution">Marketing Solution</option>
                  </select>
                </div>
                <div class="form-group my-2">
                  <label for="type_custom" class="form-label fw-bolder">Type</label>
                  <select class="form-control" required id="type_custom" name="type_custom">
                    <option value="">----Select----</option>
                    <option value="Individual">Individual</option>
                    <option value="Company">Company</option>
                  </select>
                </div>
                <div class="form-group my-2" id="otp_section_custom" style="display: none;">
                  <label for="otp_custom" class="form-label fw-bolder">OTP</label>
                  <input class="form-control" type="text" id="registration_otp_custom" name="otp_custom">
                </div>
                <div class="form-group my-2" id="resend_otp_custom" style="display: none;">
                  <p>The last OTP was expired. Please enter the new OTP sent to your email address.</p>
                </div>
                <div class="form-group my-2" id="wrong_otp_custom" style="color: red; display: none;">
                  <p>OTP not matched</p>
                </div>
                <div class="form-group my-2" id="random_error_custom" style="color: red; display: none;">
                  <p>Error!! Please try again.</p>
                </div>
                <div class="form-group my-2" id="already_registered_custom" style="color: red; display: none;">
                  <p>This email is already registered</p>
                </div>
                <button class="btn btn-primary mt-2" id="get_otp_button" type="button">Get OTP</button>
                <button class="btn btn-primary mt-2" id="enabled_submit_button_custom" type="submit"
                  style="display: none;">Register</button>
                <button class="btn btn-primary mt-2" id="reset_button_custom" type="reset">Reset</button>
                <button class="btn btn-primary mt-2" id="disabled_submit_button_custom" type="button" disabled
                  style="display: none;">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>