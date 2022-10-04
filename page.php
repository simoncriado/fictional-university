<!-- File for our single pages. We also import here the header and footer -->
<?php
get_header();

while (have_posts()) {
  the_post();
  pageBanner();
?>

  <div class="container container--narrow page-section">

    <!-- We enter php for the if statement, then we close it to write html and then we open it again to finish the 
    if statement.
    IMPORTANT: Instead of closing it like this it is better practice to use the "endif" or "endforeach" approach! -->
    <?php
    // Get the parent post id based on the current page id. If there is no parent it will return 0 which is false
    // and then the html wont be displayed. If there is a parent we will get its id (whatever number) which is true
    $theParent = wp_get_post_parent_id(get_the_ID());
    if ($theParent) { ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>
    <?php }
    ?>

    <?php
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));

    if ($theParent or $testArray) { ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
        <ul class="min-list">
          <?php
          if ($theParent) {
            $findChildrenOf = $theParent;
          } else {
            $findChildrenOf = get_the_ID();
          }

          wp_list_pages(array(
            'title_li' => null,
            'child_of' => $findChildrenOf,
            'sort_column' => 'menu_order'
          ));
          ?>
        </ul>
      </div>
    <?php } ?>


    <div class="generic-content">
      <?php the_content(); ?>
    </div>
  </div>

<?php }

get_footer();

?>