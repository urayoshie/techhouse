<?php get_header(); ?>

<main id="media_post">
  <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
        <div class="sec_title_text">
          <h1>Media</h1>
          <p class="sec_title_jp">メディア</p>
        </div>
      </div>
    </div>
  </div>

  <section class="section-archive section">
    <div class="inner">

      <div class="news_contents">
        <?php
        $current_term = get_queried_object();
        $current_term_id = isset($current_term->term_id) ? $current_term->term_id : 0;
        ?>

        <!-- タブ -->
        <div class="archive__tab sp-none">
          <ul class="archive__tab__list">
            <li class="archive__tab__item <?php if (!$current_term_id) echo 'is-active'; ?>">
              <a href="<?php echo esc_url(home_url('/insights/')); ?>">
                <p class="medium">すべて</p>
              </a>
            </li>

            <?php
            $terms = get_terms(array(
              'taxonomy' => 'media_category',
              'hide_empty' => true,
            ));

            foreach ($terms as $term) :
              $is_active = ($current_term_id == $term->term_id) ? 'is-active' : '';
            ?>
              <li class="archive__tab__item <?php echo $is_active; ?>">
                <a href="<?php echo esc_url(home_url('/insights/' . $term->slug . '/')); ?>">
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
            <?php if (!($current_term instanceof WP_Term)) : ?>
              <p class="medium">すべて</p>
            <?php else : ?>
              <p class="medium"><?php echo esc_html($current_term->name); ?></p>
            <?php endif; ?>
            <span class="archive__dropdown__arrow"></span>
          </div>

          <!-- ドロップダウンリスト -->
          <ul class="archive__dropdown__list">
            <li class="archive__tab__item <?php echo (!($current_term instanceof WP_Term)) ? 'is-active' : ''; ?>">
              <a href="<?php echo esc_url(home_url('/insights/')); ?>">
                <p>すべて</p>
              </a>
            </li>
            <?php foreach ($terms as $term) : ?>
              <li class="archive__tab__item <?php echo ($current_term instanceof WP_Term && $current_term->term_id == $term->term_id) ? 'is-active' : ''; ?>">
                <a href="<?php echo esc_url(home_url('/insights/' . $term->slug . '/')); ?>">
                  <p><?php echo esc_html($term->name); ?></p>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- カテゴリー名表示 -->
        <?php
        $term = get_queried_object();
        $current_category = ($term && isset($term->name)) ? esc_html($term->name) : '';
        ?>
        <h2 class="mt-60"><?php echo $current_category; ?></h2>

        <!-- お知らせリスト -->
        <ul class="archive__list mt-24 pb-4">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php
              $terms = get_the_terms(get_the_ID(), 'media_category');
              if (!empty($terms) && !is_wp_error($terms)) {
                $cat = $terms[0];
                $catname = $cat->name;
              }
              ?>
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

                    <!-- カテゴリ -->
                    <?php if (!empty($categories)) : ?>
                      <p class="category mt-12 font-size-small line-height-1"><?php echo esc_html($catname); ?></p>
                    <?php endif; ?>

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