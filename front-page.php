<?php
get_header();
?>

<?php if (function_exists('have_rows') && have_rows('os_sections')) : ?>
  <?php other_side_render_sections(); ?>
<?php elseif (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <main class="page-content">
      <?php the_content(); ?>
    </main>
  <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
