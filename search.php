
<?php get_header(); ?>

	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

				<!-- breadcrumb -->
				<div class="breadcrumb">
        <?php bcn_display(); ?>
				</div><!-- /breadcrumb -->

				<div class="archive-head">
					<div class="archive-lead">SEARCH</div>
					<h1 class="archive-title m_search"><span>"<?php the_search_query(); ?>"</span>の検索結果：<?php echo $wp_query->found_posts; ?>件</h1><!-- /archive-title -->
				</div><!-- /archive-head -->

        <?php
        //記事があればentriesブロック以下を表示
        if(have_posts()):
        ?>
				<!-- entries -->
				<div class="entries m_horizontal">
        <?php
        //記事の数分だけループ
        while(have_posts()):
          the_post();
        ?>

					<!-- entry-item -->
					<a href="<?php the_permalink(); ?>" class="entry-item">
            <!-- entry-item-img -->
						<div class="entry-item-img">
            <?php
            if(has_post_thumbnail()){
              //アイキャッチ画像が設定されていれば大サイズで表示
              the_post_thumbnail('large');
            }else{
              //なければnoimg画像をでフォルトで表示
              echo '<img src="'.esc_url(get_template_directory_uri()).'/img/noimg/png" alt="">';
            }
            ?>
						</div><!-- /entry-item-img -->

						<!-- entry-item-body -->
						<div class="entry-item-body">
							<div class="entry-item-meta">
                <?php
                //カテゴリー１つ目の名前を表示
                $category = get_the_category();
                if($category[0]):
                ?>
                <div class="entry-item-tag"><?php echo $category[0]->cat_name; ?></div><!-- /entry-item-tag -->
                <?php endif; ?>
								<time class="entry-item-published" datetime="<?php the_time('c') ?>"><?php the_time('Y/n/j'); ?></time><!-- /entry-item-published -->
							</div><!-- /entry-item-meta -->
							<h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
							<div class="entry-item-excerpt">
								<?php the_excerpt(); ?>
							</div><!-- /entry-item-excerpt -->
						</div><!-- /entry-item-body -->
          </a><!-- /entry-item -->
          <?php endwhile; ?>

        </div><!-- /entries -->
        <?php endif; ?>

        <!-- pagenation -->
        <?php get_template_part('template-parts/pagenation'); ?>
        <!-- /pagenation -->

			</main><!-- /primary -->

      <!-- secondary -->
      <?php get_sidebar(); ?>
      <!-- secondary -->


		</div><!-- /inner -->
	</div><!-- /content -->

  <?php get_footer(); ?>