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
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
              <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 12) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
            <!-- <?php 
            wp_nav_menu(array(
              'theme_location' => 'headerMenuLocation'
            ));
            ?> -->
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>

    <!-- IMPORTANT: we do not close the html and body tags here in the header. They will be closed in the footer file as
    our page ends there... -->
    