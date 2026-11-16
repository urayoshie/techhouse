<?php get_header(); ?>

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

      <div class="news_contents">
        <?php
        $current_term = get_queried_object();
        // 公開記事のあるカテゴリー（functions.php の get_rd_media_terms()）
        $terms = get_rd_media_terms();
        ?>

        <?php if (!empty($terms)) : ?>
          <!-- タブ -->
          <div class="archive__tab sp-none">
            <ul class="archive__tab__list">
              <li class="archive__tab__item">
                <a href="<?php echo esc_url(home_url('/rd/insights/')); ?>">
                  <p class="medium">すべて</p>
                </a>
              </li>

              <?php foreach ($terms as $term) : ?>
                <li class="archive__tab__item <?php echo ($current_term->term_id == $term->term_id) ? 'is-active' : ''; ?>">
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
              <p class="medium"><?php echo esc_html($current_term->name); ?></p>
              <span class="archive__dropdown__arrow"></span>
            </div>

            <!-- ドロップダウンリスト -->
            <ul class="archive__dropdown__list">
              <li class="archive__tab__item">
                <a href="<?php echo esc_url(home_url('/rd/insights/')); ?>">
                  <p>すべて</p>
                </a>
              </li>
              <?php foreach ($terms as $term) : ?>
                <li class="archive__tab__item <?php echo ($current_term->term_id == $term->term_id) ? 'is-active' : ''; ?>">
                  <a href="<?php echo esc_url(home_url('/rd/insights/' . $term->slug . '/')); ?>">
                    <p><?php echo esc_html($term->name); ?></p>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- カテゴリー名表示 -->
        <h2 class="mt-60"><?php echo esc_html($current_term->name); ?></h2>

        <!-- 記事リスト -->
        <ul class="archive__list mt-24 pb-4">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
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
          <?php endif; ?>
        </ul>
      </div>

      <!-- ページネーション -->
      <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="pagenation">
          <?php
          $args = array(
            'mid_size' => 3,
            'prev_text' => ' ',
            'next_text' => ' ',
            'screen_reader_text' => ' ',
          );

          the_posts_pagination($args);
          ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>
