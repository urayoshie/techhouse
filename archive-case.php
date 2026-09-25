<?php get_header(); ?>

<main id="case">
  <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title.png" alt="">
        <div class="sec_title_text">
          <h1>Case</h1>
          <p class="sec_title_jp">活動実績</p>
        </div>
      </div>
    </div>
  </div>

  <section class="section-case section">
    <div class="inner">
      <div class="case_contents">
        <!--  tab上部 -->
        <ul class="tab-area mb_60">
          <li class="case_tab active">
            <p>All</p>
          </li>
          <li class="case_tab">
            <p><?php _e('社外共創', 'WPML'); ?></p>
          </li>
          <li class="case_tab">
            <p><?php _e('社内起業', 'WPML'); ?></p>
          </li>
          <li class="case_tab">
            <p><?php _e('事業承継', 'WPML'); ?></p>
          </li>
          <li class="case_tab">
            <p><?php _e('自社プロダクト', 'WPML'); ?></p>
          </li>
          <li class="case_tab">
            <p><?php _e('受託開発', 'WPML'); ?></p>
          </li>
        </ul>
        <!-- /tab上部 -->
        <!--  一つ目のタブメニュー -->
        <div class="panel-area">
          <div class="panel active">
            <h2 class="mb_60">All</h2>
            <ul class="article-list">
              <?php
              global $post;
              $args = array(
                'post_type' => 'case',
                'posts_per_page' => 12,
                'paged' => $paged
              );
              $myposts = get_posts($args);

              if ($myposts) :
                foreach ($myposts as $post) : setup_postdata($post);
              ?>
                  <li class="article-list__item slide-in downAnime load">
                    <a href="<?php the_permalink() ?>" class="article-link">
                      <div class="article-list__thumb mb_8">
                        <?php the_post_thumbnail() ?>
                      </div>

                      <div class="article-list__body">
                        <h4 class="article-list__title mb_8"><?php the_title() ?></h4>
                      </div>
                      <div class="article-list__excerpt mb_8"><?php the_excerpt(); ?></div>
                      <div class="article-list__info-wrap">
                        <p class="article-list__cat">
                          <?php
                          $category = get_the_category();
                          $cat_name = $category[0]->cat_name;
                          $cat_slug = $category[0]->category_nicename;
                          $index = 0;

                          if ($cat_slug == "external-co-creation") {
                            $index = "1";
                          } else if ($cat_slug == "inhouse-entrepreneurship") {
                            $index = "2";
                          } else if ($cat_slug == "uccession") {
                            $index = "3";
                          } else if ($cat_slug == "inhouse-product") {
                            $index = "4";
                          } else if ($cat_slug == "contract-development") {
                            $index = "5";
                          } else {
                            $index = "0";
                          }
                          ?>
                          <a href="<?php echo home_url('/case/'); ?>?=<?php echo $index ?>">
                            <?php echo $cat_name ?>
                          </a>
                        </p>
                      </div>
                    </a>
                  </li>
                <?php endforeach; // ループの終了
                wp_reset_postdata();
              else : ?>
                <p class="center no-post"><?php _e('準備中', 'WPML'); ?></p>
              <?php endif; ?>
            </ul>
            
            <!-- ページネーション　記事増えるまで非表示 -->
            <!-- <div class="pagenation">
              <?php
              $args = array(
                'mid_size' => 3, /* 現在のページの左右に表示するページ数 */
                'prev_text' => ' ', /* 「前へ」にあたるページ用テキスト */
                'next_text' => ' ', /* 「次へ」にあたるページ用テキスト */
                'screen_reader_text' => ' ', /* 「投稿ナビゲーションのテキストを変更 */
              );

              the_posts_pagination($args);
              ?>
            </div> -->
          </div>
          <!--  /一つ目のタブメニュー -->

          <!--  二つ目のタブメニュー -->
          <div class="panel-area">
            <div class="panel">
              <h2 class="mb_60"><?php _e('社外共創', 'WPML'); ?></h2>

              <?php
              // カテゴリーIDの配列
              $categories = array(2);
              ?>
              <?php
              foreach ($categories as $category_id) {
                // 現在のページ番号を取得
                $paged = (get_query_var('category_' . $category_id . '_paged')) ? get_query_var('category_' . $category_id . '_paged') : 1;

                // カスタムクエリの引数を設定
                $args = array(
                  'post_type' => 'case',
                  'category_name' => 'external-co-creation',
                  'cat' => $category_id,
                  'paged' => $paged,
                );

                $custom_query = new WP_Query($args);

                // 記事がある場合のループ
                if ($custom_query->have_posts()) {
                  echo '<ul class="article-list">';
                  while ($custom_query->have_posts()) {
                    $custom_query->the_post();
              ?>
                    <li class="article-list__item lide-in downAnime load">
                      <a href="<?php the_permalink(); ?>" class="article-link">
                        <div class="article-list__thumb mb_8">
                          <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="article-list__body">
                          <h4 class="article-list__title mb_8">
                            <?php the_title(); ?>
                          </h4>
                        </div>
                        <div class="article-list__excerpt mb_8">
                          <?php the_excerpt(); ?>
                        </div>
                        <div class="article-list__info-wrap">
                          <p class="article-list__cat">
                            <a href="<?php echo home_url('/case/'); ?>"><?php _e('社外共創', 'WPML'); ?></a>
                          </p>
                        </div>
                      </a>
                    </li>
              <?php
                  }
                  echo '</ul>';
                } else {
                  echo '<p class="center no-post">準備中</p>';
                }

                // クエリをリセット
                wp_reset_postdata();
              }
              ?>
            </div>
            <!--  /二つ目のタブメニュー -->

            <!--  三つ目のタブメニュー -->
            <div class="panel-area">
              <div class="panel">
                <h2 class="mb_60"><?php _e('社内起業', 'WPML'); ?></h2>

                <?php
                // カテゴリーIDの配列
                $categories = array(3);
                ?>
                <?php
                foreach ($categories as $category_id) {
                  // 現在のページ番号を取得
                  $paged = (get_query_var('category_' . $category_id . '_paged')) ? get_query_var('category_' . $category_id . '_paged') : 1;

                  // カスタムクエリの引数を設定
                  $args = array(
                    'post_type' => 'case',
                    'category_name' => 'inhouse-entrepreneurship',
                    'cat' => $category_id,
                    'paged' => $paged,
                  );

                  $custom_query = new WP_Query($args);

                  // 記事がある場合のループ
                  if ($custom_query->have_posts()) {
                    echo '<ul class="article-list">';
                    while ($custom_query->have_posts()) {
                      $custom_query->the_post();
                ?>
                      <li class="article-list__item lide-in downAnime load">
                        <a href="<?php the_permalink(); ?>" class="article-link">
                          <div class="article-list__thumb mb_8">
                            <?php the_post_thumbnail(); ?>
                          </div>
                          <div class="article-list__body">
                            <h4 class="article-list__title mb_8">
                              <?php the_title(); ?>
                            </h4>
                          </div>
                          <div class="article-list__excerpt mb_8">
                            <?php the_excerpt(); ?>
                          </div>
                          <div class="article-list__info-wrap">
                            <p class="article-list__cat">
                              <a href="<?php echo home_url('/case/'); ?>"><?php _e('社内起業', 'WPML'); ?></a>
                            </p>
                          </div>
                        </a>
                      </li>
                <?php
                    }
                    echo '</ul>';
                  } else {
                    echo '<p class="center no-post">準備中</p>';
                  }

                  // クエリをリセット
                  wp_reset_postdata();
                }
                ?>
              </div>
              <!--  /三つ目のタブメニュー -->

              <!--  四つ目のタブメニュー -->
              <div class="panel-area">
                <div class="panel">
                  <h2 class="mb_60"><?php _e('事業承継', 'WPML'); ?></h2>

                  <?php
                  // カテゴリーIDの配列
                  $categories = array(4);
                  ?>
                  <?php
                  foreach ($categories as $category_id) {
                    // 現在のページ番号を取得
                    $paged = (get_query_var('category_' . $category_id . '_paged')) ? get_query_var('category_' . $category_id . '_paged') : 1;

                    // カスタムクエリの引数を設定
                    $args = array(
                      'post_type' => 'case',
                      'category_name' => 'uccession',
                      'cat' => $category_id,
                      'paged' => $paged,
                    );

                    $custom_query = new WP_Query($args);

                    // 記事がある場合のループ
                    if ($custom_query->have_posts()) {
                      echo '<ul class="article-list">';
                      while ($custom_query->have_posts()) {
                        $custom_query->the_post();
                  ?>
                        <li class="article-list__item lide-in downAnime load">
                          <a href="<?php the_permalink(); ?>" class="article-link">
                            <div class="article-list__thumb mb_8">
                              <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="article-list__body">
                              <h4 class="article-list__title mb_8">
                                <?php the_title(); ?>
                              </h4>
                            </div>
                            <div class="article-list__excerpt mb_8">
                              <?php the_excerpt(); ?>
                            </div>
                            <div class="article-list__info-wrap">
                              <p class="article-list__cat">
                                <a href="<?php echo home_url('/case/'); ?>"><?php _e('事業承継', 'WPML'); ?></a>
                              </p>
                            </div>
                          </a>
                        </li>
                  <?php
                      }
                      echo '</ul>';
                    } else {
                      echo '<p class="center no-post">準備中</p>';
                    }

                    // クエリをリセット
                    wp_reset_postdata();
                  }
                  ?>
                </div>
              </div>
              <!--  /四つ目のタブメニュー -->

              <!--  五つ目のタブメニュー -->
              <div class="panel-area">
                <div class="panel">
                  <h2 class="mb_60"><?php _e('自社プロダクト', 'WPML'); ?></h2>

                  <?php
                  // カテゴリーIDの配列
                  $categories = array(5); // 例: カテゴリーID 1, 2, 3
                  ?>
                  <?php
                  foreach ($categories as $category_id) {
                    // 現在のページ番号を取得
                    $paged = (get_query_var('category_' . $category_id . '_paged')) ? get_query_var('category_' . $category_id . '_paged') : 1;

                    // カスタムクエリの引数を設定
                    $args = array(
                      'post_type' => 'case',
                      'category_name' => 'inhouse-product',
                      'cat' => $category_id,
                      'paged' => $paged,
                    );

                    $custom_query = new WP_Query($args);

                    // 記事がある場合のループ
                    if ($custom_query->have_posts()) {
                      echo '<ul class="article-list">';
                      while ($custom_query->have_posts()) {
                        $custom_query->the_post();
                  ?>
                        <li class="article-list__item lide-in downAnime load">
                          <a href="<?php the_permalink(); ?>" class="article-link">
                            <div class="article-list__thumb mb_8">
                              <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="article-list__body">
                              <h4 class="article-list__title mb_8">
                                <?php the_title(); ?>
                              </h4>
                            </div>
                            <div class="article-list__excerpt mb_8">
                              <?php the_excerpt(); ?>
                            </div>
                            <div class="article-list__info-wrap">
                              <p class="article-list__cat">
                                <a href="<?php echo home_url('/case/'); ?>"><?php _e('自社プロダクト', 'WPML'); ?></a>
                              </p>
                            </div>
                          </a>
                        </li>
                  <?php
                      }
                      echo '</ul>';
                    } else {
                      echo '<p class="center no-post">準備中</p>';
                    }

                    // クエリをリセット
                    wp_reset_postdata();
                  }
                  ?>
                </div>
                <!--  /五つ目のタブメニュー -->

                <!--  六つ目のタブメニュー -->
                <div class="panel-area">
                  <div class="panel">
                    <h2 class="mb_60"><?php _e('受託開発', 'WPML'); ?></h2>

                    <?php
                    // カテゴリーIDの配列
                    $categories = array(6); // 例: カテゴリーID 1, 2, 3
                    ?>

                    <?php
                    foreach ($categories as $category_id) {
                      // 現在のページ番号を取得
                      $paged = (get_query_var('category_' . $category_id . '_paged')) ? get_query_var('category_' . $category_id . '_paged') : 1;

                      // カスタムクエリの引数を設定
                      $args = array(
                        'post_type' => 'case',
                        'category_name' => 'contract-development',
                        'cat' => $category_id,
                        'paged' => $paged,
                      );

                      $custom_query = new WP_Query($args);

                      // 記事がある場合のループ
                      if ($custom_query->have_posts()) {
                        echo '<ul class="article-list">';
                        while ($custom_query->have_posts()) {
                          $custom_query->the_post();
                    ?>
                          <li class="article-list__item lide-in downAnime load">
                            <a href="<?php the_permalink(); ?>" class="article-link">
                              <div class="article-list__thumb mb_8">
                                <?php the_post_thumbnail(); ?>
                              </div>
                              <div class="article-list__body">
                                <h4 class="article-list__title mb_8">
                                  <?php the_title(); ?>
                                </h4>
                              </div>
                              <div class="article-list__excerpt mb_8">
                                <?php the_excerpt(); ?>
                              </div>
                              <div class="article-list__info-wrap">
                                <p class="article-list__cat">
                                  <a href="<?php echo home_url('/case/'); ?>"><?php _e('受託開発', 'WPML'); ?></a>
                                </p>
                              </div>
                            </a>
                          </li>
                    <?php
                        }
                        echo '</ul>';
                      } else {
                        echo '<p class="center no-post">準備中</p>';
                      }

                      // クエリをリセット
                      wp_reset_postdata();
                    }
                    ?>
                  </div>
                </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>