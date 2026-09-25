<?php get_header(); ?>

<main id="media_post_post">
  <div class="breadcrumb-trail">
    <div class="breadcrumb-trail__contents">
      <!-- <p class="breadcrumb-trail__contents__item"><a href="<?php echo home_url('/'); ?>">TOP</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印"> -->
      <p class="breadcrumb-trail__contents__item"><a href="<?php echo home_url('insights'); ?>">MEDIA</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印">

      <?php
      $categories = get_the_terms(get_the_ID(), 'media_category');
      if (!empty($categories) && !is_wp_error($categories)) :
        $category = $categories[0]; ?>
        <p class="breadcrumb-trail__contents__item">
          <a href="<?php echo home_url('insights/' . $category->slug); ?>"><?php echo esc_html($category->name); ?></a>
        </p>
        <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印">
      <?php endif; ?>
      <p class="breadcrumb-trail__contents__title"><?php the_title() ?></p>
    </div>
  </div>

  <section class="section-post section">
    <div class="inner">
      <div class="post_contents radius-24">
        <!-- タイトル -->
        <h1><?php the_title() ?></h1>

        <!-- 日付・カテゴリ -->
        <?php
        $categories = get_the_terms(get_the_ID(), 'media_category');
        if (!empty($categories) && !is_wp_error($categories)) {
          $catname = $categories[0]->name;
          $catlink = home_url('insights/' . $categories[0]->slug . '/');
        }
        ?>

        <div class="title-info mb-32">
          <!-- カテゴリ -->
          <?php if (!empty($categories)) : ?>
            <a href="<?php echo esc_url($catlink); ?>">
              <p class="category medium"><?php echo esc_html($catname); ?></p>
            </a>
          <?php endif; ?>

          <!-- 日付 -->
          <p class="date medium">
            <?php echo get_the_date('Y.n.j'); ?>
          </p>
        </div>

        <!-- サムネイル -->
        <?php if (has_post_thumbnail()) : ?>
          <div class="post_thumbnail mb-12">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php endif; ?>

        <!-- 内容 -->
        <div class="post_content"><?php the_content() ?></div>

      </div>

      <div class="mt-80">
        <a class="back_btn center line-height-1 radius-16" href="<?php echo esc_url(home_url('insights/' . $categories[0]->slug . '/')); ?>">
          <p class="text-center"><?php echo esc_html($categories[0]->name); ?> 一覧へ戻る</p>
        </a>
      </div>
    </div>
  </section>


  <!-- 関連記事 -->
  <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
    <?php
    $related_query = new WP_Query(array(
      'post_type'      => 'media_post',
      'posts_per_page' => 4,
      'post__not_in'   => array(get_the_ID()),
      'tax_query'      => array(
        array(
          'taxonomy' => 'media_category',
          'field'    => 'slug',
          'terms'    => $categories[0]->slug,
        ),
      ),
    ));
    ?>

    <?php if ($related_query->have_posts()) : ?>
      <section class="section-archive section">
        <div class="inner">
          <div class="media_section__cat-title">
            <h2 class="bold">「<?php echo esc_html($categories[0]->name); ?>」の関連記事</h2>
            <div class="sp-none">
              <a class="more_btn" href="<?php echo esc_url(home_url('/insights/' . $categories[0]->slug . '/')); ?>">
                <p class="line-height-1 medium">もっと見る</p>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
              </a>
            </div>
          </div>

          <ul class="archive__list mt-40">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
              <li class="archive__item">
                <a href="<?php the_permalink(); ?>">
                  <div class="archive__item__wrapper">
                    <div class="thumbnail">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(''); ?>
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-image.png" alt="">
                      <?php endif; ?>
                    </div>
                    <p class="title bold mt-12 line-height-15"><?php the_title(); ?></p>
                  </div>
                </a>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
          <div class="pc-none center">
            <a class="more_btn mt-60 " href="<?php echo esc_url(home_url('/insights/' . $categories[0]->slug . '/')); ?>">
              <p class="line-height-1 medium">もっと見る</p>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/more-btn_arrow.svg" alt="矢印">
            </a>
          </div>
        </div>
      </section>
    <?php endif; ?>
  <?php endif; ?>

  <div class="post_content">
    <?php get_sidebar('contact'); ?>
  </div>

</main>

<?php get_footer(); ?>