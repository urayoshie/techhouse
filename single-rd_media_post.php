<?php get_header(); ?>

<?php
$categories = get_the_terms(get_the_ID(), 'rd_media_category');
$category   = (!empty($categories) && !is_wp_error($categories)) ? $categories[0] : null;
?>

<!-- メディア記事（single-media_post.php）と同じ見た目にするため、id はメディア記事と共通の media_post_post を使用 -->
<main id="media_post_post" class="rd-insights">
  <div class="breadcrumb-trail">
    <div class="breadcrumb-trail__contents">
      <p class="breadcrumb-trail__contents__item"><a href="<?php echo esc_url(home_url('/rd/insights/')); ?>">R&D MEDIA</a></p>
      <img class="breadcrumb-trail__contents__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/breadcrumb_arrow.png" alt="矢印">

      <?php if ($category) : ?>
        <p class="breadcrumb-trail__contents__item">
          <a href="<?php echo esc_url(home_url('/rd/insights/' . $category->slug . '/')); ?>"><?php echo esc_html($category->name); ?></a>
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
        <div class="title-info mb-32">
          <!-- カテゴリ -->
          <?php if ($category) : ?>
            <a href="<?php echo esc_url(home_url('/rd/insights/' . $category->slug . '/')); ?>">
              <p class="category medium"><?php echo esc_html($category->name); ?></p>
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

      <?php if ($category) : ?>
        <div class="mt-80">
          <a class="back_btn center line-height-1 radius-16" href="<?php echo esc_url(home_url('/rd/insights/' . $category->slug . '/')); ?>">
            <p class="text-center"><?php echo esc_html($category->name); ?> 一覧へ戻る</p>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>


  <!-- 関連記事 -->
  <?php if ($category) : ?>
    <?php
    $related_query = new WP_Query(array(
      'post_type'      => 'rd_media_post',
      'posts_per_page' => 4,
      'post__not_in'   => array(get_the_ID()),
      'tax_query'      => array(
        array(
          'taxonomy' => 'rd_media_category',
          'field'    => 'slug',
          'terms'    => $category->slug,
        ),
      ),
    ));
    ?>

    <?php if ($related_query->have_posts()) : ?>
      <section class="section-archive section">
        <div class="inner">
          <div class="media_section__cat-title">
            <h2 class="bold">「<?php echo esc_html($category->name); ?>」の関連記事</h2>
            <div class="sp-none">
              <a class="more_btn" href="<?php echo esc_url(home_url('/rd/insights/' . $category->slug . '/')); ?>">
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
            <a class="more_btn mt-60" href="<?php echo esc_url(home_url('/rd/insights/' . $category->slug . '/')); ?>">
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
