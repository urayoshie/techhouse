<?php get_header(); ?>

<main id="case_post">

  <div class="breadcrumb-trail">
    <div class="breadcrumb-trail__contents">
      <p class="breadcrumb-trail__contents__item"><a href="<?php echo home_url('/'); ?>">TOP</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="">
      <p class="breadcrumb-trail__contents__item"><a href="<?php echo home_url('/case/'); ?>">CASE</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="">

      <p class="category-tag breadcrumb-trail__contents__item">
        <?php
        $category = get_the_category(); //get_the_category関数を$catに代入（カテゴリ情報を取得）
        $cat_name = $category[0]->cat_name; //カテゴリー名取得
        $cat_slug = $category[0]->category_nicename; //スラッグ取得
        $index = 0;

        if ($cat_slug == "external-co-creation") {
          //社外共創_external-co-creation
          $index = "1";
        } else if ($cat_slug == "inhouse-entrepreneurship") {
          //社内起業_inhouse-entrepreneurship
          $index = "2";
        } else if ($cat_slug == "uccession") {
          //事業継承_uccession
          $index = "3";
        } else if ($cat_slug == "inhouse-product") {
          //自社プロダクト_inhouse-product
          $index = "4";
        } else if ($cat_slug == "contract-development") {
          //受託開発_contract-development
          $index = "5";
        } else {
          //All
          $index = "0";
        }
        ?>
        <!--  -->
        <a href="<?php echo home_url('/case/'); ?>?=<?php echo $index ?>">
          <?php echo $cat_name ?>
        </a>
      </p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="">
      <p class="breadcrumb-trail__contents__title"><?php the_title() ?></p>
    </div>
  </div>

  <section class="section-post section">
    <div class="inner">
      <div class="post_thumbnail mb_32"><?php the_post_thumbnail() ?></div>
      <div class="post_contents">
        <div class="post_contents_left">
          <div class="post_contents_left__wrapper">
            <div class="post_contents_left__category mb_20">
              <p class="post_contents_left__title">Case category : </p>
              <ul class="post_contents_left__cat">
                <li>
                  <p class="article-list__cat">
                    <!--  -->
                    <?php
                    $category = get_the_category(); //get_the_category関数を$catに代入（カテゴリ情報を取得）
                    // print_r($cat)->$slug; //カテゴリ情報の出力
                    // var_dump($cat);
                    $cat_name = $category[0]->cat_name; //カテゴリー名取得
                    $cat_slug = $category[0]->category_nicename; //スラッグ取得
                    $index = 0;

                    if ($cat_slug == "external-co-creation") {
                      //社外共創_external-co-creation
                      $index = "1";
                    } else if ($cat_slug == "inhouse-entrepreneurship") {
                      //社内起業_inhouse-entrepreneurship
                      $index = "2";
                    } else if ($cat_slug == "uccession") {
                      //事業継承_uccession
                      $index = "3";
                    } else if ($cat_slug == "inhouse-product") {
                      //自社プロダクト_inhouse-product
                      $index = "4";
                    } else if ($cat_slug == "contract-development") {
                      //受託開発_contract-development
                      $index = "5";
                    } else {
                      //All
                      $index = "0";
                    }
                    ?>
                    <!--  -->
                    <a href="<?php echo home_url('/case/'); ?>?=<?php echo $index ?>">
                      <?php echo $cat_name ?>
                    </a>
                  </p>
                </li>
              </ul>
            </div>
            <div class="post_contents_left__service mb_20">
              <p class="post_contents_left__title">Service : </p>
              <ul class="post_contents_left__tag">
                <p><?php the_tags('<li><p>', '</p></li><li><p>', '</p></li>'); ?></p>
              </ul>
            </div>
            <div class="post_contents_left__url">
              <p class="post_contents_left__title">URL : </p>
              <?php $url = get_field('url'); ?>
              <a href="<?php echo $url['url']; ?>" target="_blank" rel="noopener noreferrer">
                <p><?php echo $url['url']; ?>
              </a>
            </div>
          </div>
        </div>
        <div class="post_contents_right">
          <h2 class="mb_32"><?php the_title() ?></h2>
          <div><?php the_content() ?></div>
        </div>
      </div>
      <div class="post_contents">
        <div class="post_contents_left"></div>
        <div class="post_contents_right">
          <a class="link_btn" href="<?php echo home_url('/case/'); ?>">
            <p>一覧へ戻る</p>
          </a>
        </div>
      </div>
    </div>
  </section>
  <div>
    <section id="case" class="section post_related">
      <div class="inner">
        <h2>関連する活動実績</h2>

        <ul class="article-list">
          <?php
          $categories = get_the_category($post->ID); // 表示している記事のカテゴリーを取得
          $category_ID = [];

          foreach ($categories as $category) :
            array_push($category_ID, $category->cat_ID);
          endforeach;

          $args = [
            'post_type' => 'case',
            'post__not_in' => [$post->ID], // 今読んでいる記事を除く
            'posts_per_page' => 3, // 表示させたい記事数
            'category__in' => $category_ID, // カテゴリーIDを使って、そのカテゴリーに属する記事を表示:
            'orderby' => 'desc', // ランダムに表示、降順の場合は'desc'
          ];
          $wp_query = new WP_Query($args);
          if ($wp_query->have_posts()) : ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
              <li class="article-list__item slide-in downAnime">
                <a href="<?php the_permalink() ?>" class="article-link">
                  <div class="article-list__thumb mb_8">
                    <?php the_post_thumbnail() ?>
                  </div>
                  <h4 class="article-list__title mb_8"><?php the_title() ?></h4>
                </a>
                <p class="article-list__cat">
                  <?php echo $cat_name ?>
                </p>
              </li>
            <?php endwhile;
          else : ?>
            <p class="center no-post">関連する活動実績はありません</p>
        </ul>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
      </div>
      <a class="link_btn" href="<?php echo home_url('/case/'); ?>">
        <p>一覧へ戻る</p>
      </a>
    </section>
  </div>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>