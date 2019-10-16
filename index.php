<!-- Header -->
<?php get_header(); ?>

<!-- Content & Sidebar -->
<div class="content-wrapper">
  <?php get_template_part( 'content', get_post_format() ); ?>
  <?php get_sidebar(); ?>
</div>

<!-- Footer -->
<?php get_footer(); ?>