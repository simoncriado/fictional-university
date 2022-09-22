<!-- This page is the base for the events archive -->
<?php
get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our World.'
));
?>

<div class="container container--narrow page-section">
  <!-- Looping through all posts or events in this case. First thing is to call the_post() to have access to the data. -->
  <?php
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/content-event');
  }
  echo paginate_links();
  ?>

  <hr class="section-break">

  <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a></p>

</div>

<?php get_footer();
?>