<?php get_header(); ?>

<main id="pennyshot-club">

    <!-- MV・こんなこんな感覚ないですか？・ペニーショットクラブとは・こんな人が参加しています_テンプレートパーツ呼び出し -->
    <?php get_template_part('template-parts/pennyshot/about'); ?>

    <!-- 3つのフェーズで、事業が生まれる・修了証について・プログラムの運営・伴走_テンプレートパーツ呼び出し -->
    <?php get_template_part('template-parts/pennyshot/program'); ?>

    <!-- まずは小さく試し、誰か1人を動かす(参加申込)_テンプレートパーツ呼び出し -->
    <?php get_template_part('template-parts/pennyshot/entry'); ?>

    <!-- 事例_テンプレートパーツ呼び出し　※2026/6/3時点では非表示 -->
    <?php get_template_part('template-parts/pennyshot/case'); ?>

    <!-- 関連記事 -->
    <?php
    $related_query = new WP_Query(array(
        'post_type'      => 'media_post',
        'posts_per_page' => 4,
        'tax_query'      => array(
            array(
                'taxonomy' => 'media_category',
                'field'    => 'slug',
                'terms'    => array('startup', 'career', 'technology'),
                'operator' => 'IN',
            ),
        ),
    ));
    ?>

    <?php if ($related_query->have_posts()) : ?>
        <section class="section-archive section" style="margin-top: 0;">
            <div class="inner">
                <h2 class="bold center line-height-1">関連記事</h2>
                <ul class="archive__list mt-60">
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
            </div>
        </section>
    <?php endif; ?>


    <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>