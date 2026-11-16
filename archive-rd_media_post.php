<?php get_header(); ?>

<!-- メディア一覧（archive-media_post.php）と同じ見た目にするため、id はメディア一覧と共通の media_post を使用 -->
<main id="media_post" class="rd-insights">
  <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
        <div class="sec_title_text">
          <h1>R&D Media</h1>
          <p class="sec_title_jp">研究開発メディア</p>
        </div>
      </div>
    </div>
  </div>

  <section class="section-archive section">
    <div class="inner">

      <?php
      // 公開記事のあるカテゴリー（functions.php の get_rd_media_terms()）
      $terms = get_rd_media_terms();
      ?>

      <!-- タブ -->
      <?php if (!empty($terms)) : ?>
        <div class="archive__tab sp-none">
          <ul class="archive__tab__list">
            <!-- すべて -->
            <li class="archive__tab__item is-active">
              <a href="<?php echo esc_url(home_url('/rd/insights/')); ?>">
                <p class="medium">すべて</p>
              </a>
            </li>

            <?php foreach ($terms as $term) : ?>
              <li class="archive__tab__item">
                <a href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                  <p class="medium"><?php echo esc_html($term->name); ?></p>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- SP用カスタムドロップダウン -->
        <div class="archive__dropdown">
          <!-- 選択中のタブ -->
          <div class="archive__dropdown__selected archive__tab__item is-active">
            <p class="medium">すべて</p>
            <span class="archive__dropdown__arrow"></span>
          </div>

          <!-- ドロップダウンリスト -->
          <ul class="archive__dropdown__list">
            <li class="archive__tab__item is-active">
              <a href="<?php echo esc_url(home_url('/rd/insights/')); ?>">
                <p>すべて</p>
              </a>
            </li>
            <?php foreach ($terms as $term) : ?>
              <li class="archive__tab__item">
                <a href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                  <p><?php echo esc_html($term->name); ?></p>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- カテゴリごとのセクション -->
        <?php foreach ($terms as $term) : ?>

          <?php
          $query = new WP_Query(array(
            'post_type'      => 'rd_media_post',
            'posts_per_page' => 4,
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
                <!-- カテゴリ名 -->
                <h2 class="bold"><?php echo esc_html($term->name); ?></h2>
                <!-- もっと見るボタン -->
                <div class="sp-none">
                  <a class="more_btn" href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                    <p class="line-height-1 medium">もっと見る</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
                  </a>
                </div>
              </div>

              <ul class="archive__list mt-24 pb-4">
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
                <a class="more_btn mt-60 text-center" href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                  <p class="line-height-1 medium">もっと見る</p>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
                </a>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>
