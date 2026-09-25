<?php get_header(); ?>

<main id="news">
  <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
        <div class="sec_title_text">
          <h1>News</h1>
          <p class="sec_title_jp">お知らせ</p>
        </div>
      </div>
    </div>
  </div>

  <section class="section-archive section">
    <div class="inner">

      <div class="news_contents">
        <?php $current_cat_id = get_query_var('cat'); ?>

        <!-- タブ -->
        <div class="archive__tab">
          <ul class="archive__tab__list">
            <li class="archive__tab__item <?php if (!$current_cat_id) echo 'is-active'; ?>">
              <a href="<?php echo esc_url(home_url('/news/')); ?>">
                <p class="medium">すべて</p>
              </a>
            </li>

            <?php
            $categories = get_categories(array(
              'hide_empty' => true,
            ));

            foreach ($categories as $category) :
              $is_active = ($current_cat_id == $category->term_id) ? 'is-active' : '';
            ?>
              <li class="archive__tab__item <?php echo $is_active; ?>">
                <!-- <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"> -->
                <a href="<?php echo esc_url(home_url('/news/' . $category->slug . '/')); ?>">
                  <p class="medium"><?php echo esc_html($category->name); ?></p>
                </a>
              </li>
            <?php endforeach; ?>

          </ul>
        </div>

        <!-- お知らせリスト -->
        <ul class="archive__list mt-40">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php
              $categories = get_the_category();
              if (!empty($categories)) {
                $cat = $categories[0];
                $catname = $cat->name;
                $catlink = get_category_link($cat->term_id);
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
                      <p class="category radius-100 mt-12 font-size-xsmall line-height-1"><?php echo esc_html($catname); ?></p>
                    <?php endif; ?>

                    <!-- タイトル -->
                    <p class="title bold mt-8 line-height-15"><?php the_title(); ?></p>

                    <!-- 日付 -->
                    <p class="date mt-12 font-size-xsmall line-height-1">
                      <?php echo get_the_date('Y.n.j'); ?>
                    </p>
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