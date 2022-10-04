<!-- This page is the base for the programs archive -->
<?php
get_header();
pageBanner(array(
    'title' => 'All Programs',
    'subtitle' => 'There is something for everyone. Have a look around.'
));
?>

<div class="container container--narrow page-section">
    <!-- Looping through all posts or programs in this case. First thing is to call the_post() to have access to the data. -->
    <ul class="link-list min-list">
        <?php
        while (have_posts()) {
            the_post(); ?>
            <li><a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a></li>
        <?php }
        echo paginate_links();
        ?>
    </ul>

</div>

<?php get_footer();
?>