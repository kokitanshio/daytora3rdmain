<?php get_header(); ?>

<?php get_template_part('template-parts/pickup_by_tag'); ?>

	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

      <?php
      //記事があればentriesブロック以下を表示
      if(have_posts()):
      ?>

				<!-- entries -->
				<div class="entries">
        <?php
        //記事の数ぶんループ
        while(have_posts()):
          the_post();?>

					<!-- entry-item -->
					<a href="<?php the_permalink(); ?>" class="entry-item">
						<!-- entry-item-img -->
						<div class="entry-item-img">
            <?php if(has_post_thumbnail()){
              //アイキャッチ画像が設定されてれば大サイズで表示
              the_post_thumbnail('large');
            }else{
              //なければnoimage画像をデフォルトで表示
              echo '<img src="'.esc_url(get_template_directory_uri()).'/img/noimg.png" alt="">';
            } ?>
						</div><!-- /entry-item-img -->

						<!-- entry-item-body -->
						<div class="entry-item-body">
							<div class="entry-item-meta">
              <div class="entry-item-tag"><?php my_the_post_category(false); ?></div><!--/entry-item-tag-->

                <!--公開日時を動的に表示する-->
								<time class="entry-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /entry-item-published -->
							</div><!-- /entry-item-meta -->
							<h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
							<div class="entry-item-excerpt">
								<p><?php the_excerpt(); ?></p>
							</div><!-- /entry-item-excerpt -->
						</div><!-- /entry-item-body -->
					</a><!-- /entry-item -->

        <?php endwhile; ?>
				</div><!-- /entries -->
        <?php endif; ?>
        <?php get_template_part('template-parts/pagenation'); ?>
			</main><!-- /primary -->

      <!-- secondary -->
      <?php get_sidebar(); ?>
      <!-- secondary -->


		</div><!-- /inner -->
	</div><!-- /content -->

	<?php get_footer(); ?>