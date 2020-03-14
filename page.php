
<?php get_header(); ?>

<!-- content -->
<div id="content" class="m_one">
<div class="inner">

<!-- primary -->
<main id="primary">

<!-- breadcrumb -->
<?php bcn_display(); ?>
<!-- /breadcrumb -->

<?php
if(have_posts()):
while(have_posts()):
the_post();
?>

<!-- entry -->
<article class="entry m_page">

<!-- entry-header -->
<div class="entry-header">
  <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->
  <?php if(has_post_thumbnail()): ?>
  <div class="entry-img"><?php the_post_thumbnail('large'); ?></div><!-- /entry-img -->
  <?php endif; ?>
</div><!-- /entry-header -->

<!-- entry-body -->
<div class="entry-body">
  <?php the_content(); ?>
  <?php
  wp_link_pages(array(
    'before' => '<nav class="entry-links">',
    'after' => '</nav>',
    'link_before' => '',
    'link_after' => '',
    'next_or_number' => 'number',
    'separator' => '',
  ));
  ?>
</div><!-- /entry-body -->
</article><!-- /entry -->

<?php endwhile;
endif;
?>

</main><!-- /primary -->

<!-- secondary -->
<aside id="secondary">
<?php get_sidebar(); ?>
</aside><!-- secondary -->


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>