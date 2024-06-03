<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OPS
 */

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right');
  bloginfo('name'); ?></title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preload" as="style"
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" media="print"
    onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" />
  </noscript>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
  <?php wp_body_open(); ?>
  <header class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-nav">
      <div class="container" style="padding: 5px;">
        <a class="navbar-brand site-title mb-0 d-none d-sm-block" style="width: 40%;"
          href="<?php echo esc_url(home_url('/')); ?>">
          <img class="grey-color-full-screen" style="width: 10%;"
            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/OPS%20(2).svg" alt="OPS Logo Grey">
          <img class="white-color-full-screen" style="width: 10%;"
            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/OPS.svg" alt="OPS Logo White">
          One Point Solution
        </a>
        <a class="navbar-brand site-title mb-0 d-block d-sm-none" style="width: 25%;"
          href="<?php echo esc_url(home_url('/')); ?>">
          <img class="grey-color-full-screen" style="width: 45%;"
            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/OPS%20(2).svg" alt="OPS Logo Grey">
          <img class="white-color-full-screen" style="width: 45%;"
            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/OPS.svg" alt="OPS Logo White">
          OPS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav d-flex flex-row justify-content-end">
            <li class="nav-item mx-1">
              <a class="nav-link btn btn-primary shadow-sm hover-effect menu-button"
                href="<?php echo esc_url(home_url('/home/teams')); ?>">Teams</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link btn btn-primary shadow-sm hover-effect menu-button"
                href="<?php echo esc_url(home_url('/home/projects')); ?>">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary shadow-sm hover-effect menu-button" href="https://partners.opsol.in/login">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>