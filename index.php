<?php
get_header();
?>

<main class="page-content">
  <div class="w-layout-blockcontainer container w-container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p>No posts found.</p>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
