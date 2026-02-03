<?php
get_header();
?>

<main class="page-content">
  <div class="w-layout-blockcontainer container w-container">
    <?php while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </div>
</main>

<?php
get_footer();
