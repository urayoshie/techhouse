<?php get_header(); ?>

<main id="news_post">
  <div class="breadcrumb-trail">
    <div class="breadcrumb-trail__contents">
      <!-- <p class="breadcrumb-trail__contents__item"><a href="<?php echo home_url('/'); ?>">TOP</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印"> -->
      <p class="breadcrumb-trail__contents__item"><a href="<?php echo home_url('news'); ?>">NEWS</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印">
      <!-- 追加 -->
      <?php
      $categories = get_the_category();
      if (!empty($categories)) :
        $category = $categories[0]; ?>
        <p class="breadcrumb-trail__contents__item">
          <a href="<?php echo home_url('news/' . $category->slug); ?>"><?php echo esc_html($category->name); ?></a>
        </p>
        <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印">
      <?php endif; ?>
      <!-- ここまで -->
      <p class="breadcrumb-trail__contents__title"><?php the_title() ?></p>
    </div>
  </div>

  <section class="section-post section">
    <div class="inner">
      <div class="post_contents radius-24 pt-80 pb-80">
        <!-- タイトル -->
        <h1><?php the_title() ?></h1>

        <!-- 日付・カテゴリ -->
        <?php
        $categories = get_the_category();
        if (!empty($categories)) {
          $catname = $categories[0]->name;
          $catlink = get_category_link($categories[0]->term_id);
        }
        ?>

        <div class="title-info mb-32">
          <!-- カテゴリ -->
          <?php if (!empty($categories)) : ?>
            <a href="<?php echo esc_url($catlink); ?>">
              <p class="category medium"><?php echo esc_html($catname); ?></p>
            </a>

            <!-- 日付 -->
            <p class="date medium">
              <?php echo get_the_date('Y.n.j'); ?>
            </p>
          <?php endif; ?>
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
        <a class="back_btn center line-height-1 radius-16" href="<?php echo home_url('news'); ?>">
          <p class="text-center">一覧へ戻る</p>
        </a>
      </div>

  </section>

  <div class="post_content">
    <?php get_sidebar('contact'); ?>
  </div>

</main>

<?php get_footer(); ?>