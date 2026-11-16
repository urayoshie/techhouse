<?php
// 公開記事のあるカテゴリー（functions.php の get_rd_media_terms()）
$rd_media_terms = get_rd_media_terms();
?>

<?php if (!empty($rd_media_terms)) : ?>
  <!-- R&D Media -->
  <section class="rd-media section-archive section">
    <div class="inner">
      <span class="rd-label bold">
        <span class="rd-label__bar"></span>
        R&D Media
      </span>
      <h2 class="rd-media__title mb-20">問いを、前に進めるための実践知</h2>
      <p>不確実な未来を、問いから仮説・検証・意思決定へつなげるための実践知を蓄積します。</p>

      <!-- カテゴリごとのセクション -->
      <?php foreach ($rd_media_terms as $term) : ?>
        <?php
        // 各カテゴリーの最新投稿4件
        $query = new WP_Query(array(
          'post_type'      => 'rd_media_post',
          'posts_per_page' => 4,
          'orderby'        => 'date',
          'order'          => 'DESC',
          'tax_query'      => array(
            array(
              'taxonomy' => 'rd_media_category',
              'field'    => 'slug',
              'terms'    => $term->slug,
            ),
          ),
        ));
        ?>

        <?php if ($query->have_posts()) : ?>
          <div class="media_section mt-60">
            <!-- カテゴリ名 + もっと見るボタン -->
            <div class="media_section__cat-title">
              <h3 class="rd-media__cat_title bold"><?php echo esc_html($term->name); ?></h3>
              <div class="sp-none">
                <a class="more_btn" href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                  <p class="line-height-1 medium">もっと見る</p>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
                </a>
              </div>
            </div>

            <ul class="archive__list mt-24">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="archive__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="archive__item__wrapper">
                      <!-- サムネイル -->
                      <div class="thumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail(''); ?>
                        <?php else : ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-image.png" alt="">
                        <?php endif; ?>
                      </div>

                      <!-- タイトル -->
                      <p class="title bold mt-12 line-height-15"><?php the_title(); ?></p>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </ul>

            <div class="pc-none center">
              <a class="more_btn mt-60" href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                <p class="line-height-1 medium">もっと見る</p>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
              </a>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

      <div class="mt-60 text-center">
        <a class="link_btn" href="<?php echo esc_url(home_url('/rd/insights/')); ?>">
          <p>すべて見る</p>
        </a>
      </div>
    </div>
  </section>
<?php endif; ?>
