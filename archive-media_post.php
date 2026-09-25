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

      <?php
      $terms = get_terms(array(
        'taxonomy'   => 'media_category',
        'hide_empty' => true,
      ));
      ?>

      <!-- タブ -->
      <?php
      $current_term = get_queried_object();
      $terms = get_terms(array(
        'taxonomy' => 'media_category',
        'hide_empty' => true,
      ));
      ?>
      <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <div class="archive__tab sp-none">
          <ul class="archive__tab__list">
            <!-- すべて -->
            <li class="archive__tab__item is-active">
              <a href="<?php echo esc_url(home_url('/insights/')); ?>">
                <p class="medium">すべて</p>
              </a>
            </li>

            <?php foreach ($terms as $term) : ?>
              <li class="archive__tab__item <?php echo ($current_term->term_id == $term->term_id) ? 'is-active' : ''; ?>">
                <a href="<?php echo esc_url(home_url('/insights/' . $term->slug . '/')); ?>">
                  <p class="medium"><?php echo esc_html($term->name); ?></p>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

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

      <!-- カテゴリごとのセクション -->
      <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <?php foreach ($terms as $term) : ?>

          <?php
          $query = new WP_Query(array(
            'post_type'      => 'media_post',
            'posts_per_page' => 4,
            'tax_query'      => array(
              array(
                'taxonomy' => 'media_category',
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
                  <a class="more_btn sp-none" href="<?php echo esc_url(home_url('/insights/' . $term->slug . '/')); ?>">
                    <p class="line-height-1 medium">もっと見る</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
                  </a>
                </div>
              </div>

              <ul class="archive__list mt-24 pb-4">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <?php
                  $post_terms = get_the_terms(get_the_ID(), 'media_category');
                  $term_name  = (!empty($post_terms) && !is_wp_error($post_terms)) ? $post_terms[0]->name : '';
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

                        <!-- タイトル -->
                        <p class="title bold mt-12 line-height-15"><?php the_title(); ?></p>
                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="pc-none center">
            <a class="more_btn mt-60 text-center" href="<?php echo esc_url(home_url('/insights/' . $term->slug . '/')); ?>">
              <p class="line-height-1 medium">もっと見る</p>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
            </a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>