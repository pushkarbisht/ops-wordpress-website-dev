<?php
/**
 * Template Name: template-registrationform
 *
 * @package WordPress
 * @subpackage ops
 * @since  1.0
 */
get_header(); ?>
<section class="gradient-custom py-5">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="shadow-2-strong card-registration">
          <div class="">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form (Professional Network)</h3>
            <form action="#" method="post" id="registrationForm">
              <div class=" row">
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" id="name" name="name" class="form-control form-control-lg" required />
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="dob" class="form-label">Date of Birth:</label>
                  <input type="date" id="dob" name="dob" class="form-control form-control-lg" required />
                </div>
               
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="contact" class="form-label">Contact:</label>
                  <input type="tel" id="contact" name="contact" class="form-control form-control-lg" required />
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <label for="position" class="form-label">Position (current or last held):</label>
                  <input type="text" id="position" name="position" class="form-control form-control-lg" required />
                </div>
              </div>
              <div class="row">

              <div class="col-lg-4 col-md-6 mb-4">
                  <label for="address" class="form-label">Permanent Address:</label>
                  <textarea id="address" name="address" class="form-control form-control-lg" rows="1" required></textarea>
                </div>
              </div>
              <input type="hidden" id="purpose" name="purpose"  value="Professional Network" class="form-control form-control-lg" required />
              <div class="form-group" id="otp_section_custom" style="display: none;">
                <label for="otp_custom" class="form-label fw-bolder">OTP</label>
                <input class="form-control" type="text" id="otp" name="otp">
              </div>
              <div class="form-group my-2" id="random_error_custom" style="color: red; display: none;">
                <p>Error!! Please try again.</p>
              </div>
              <div class="mt-4 pt-2">
                <button type="button" class="btn btn-primary btn-lg" id="get_otp_button">Get OTP</button>
                <button type="submit" class="btn btn-primary btn-lg" id="enabled_submit_button_custom" style="display: none;">Submit</button>
                <button type="button" class="btn btn-primary btn-lg" id="disabled_submit_button_custom" disabled style="display: none;">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                </button>
              </div>
            </form>
            <div id="success_message_custom"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
