<!-- Here we start with a normal HTML template as this is the first thing that will appear in our page -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!-- Instead of entering all scripts (like fonts, icons, etc) directly here, we open PHP and use a function
    that connects to the functions.php file -->

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left">
        <!-- We open PHP to access the site url function. If no argument is passed it goes to the home page, otherwise it session_destroy
          us to the desired page. For example '/about-us'   -->
        <a href="<?php echo site_url(); ?>"><strong>Fictional</strong> University</a>
      </h1>
      <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul>
            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 12) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('program'); ?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event' or is_page('past-events')) echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
            <li><a href="#">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"'; ?>><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
          </ul>
          <!-- <?php
                wp_nav_menu(array(
                  'theme_location' => 'headerMenuLocation'
                ));
                ?> -->
        </nav>
        <!-- Logic to display login and signin button if no user is logged in or remove them and add a logout button if we have a user -->
        <div class="site-header__util">
          <?php if (is_user_logged_in()) { ?>
            <!-- MyNotes section is only available for registered users -->
            <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn--small btn--orange float-left push-right">My Notes</a>
            <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small btn--dark-orange float-left btn--with-photo">
              <!-- We display a small avatar for logged in users. Check gravatar.com for attaching an avatar globally to an email address -->
              <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
              <span class="btn__text">Log Out</span>
            </a>
          <?php } else { ?>
            <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
          <?php } ?>

          <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </header>

  <!-- IMPORTANT: we do not close the html and body tags here in the header. They will be closed in the footer file as
    our page ends there... -->