<?php get_header(); ?>

<main id="rd">
  <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
        <div class="sec_title_text">
          <h1>R&D</h1>
          <p class="sec_title_jp">研究開発</p>
        </div>
      </div>
      <section class="rd-hero">
        <div class="rd-hero__card radius-16 text-center mt-100">
          <h2 class="rd-hero__title">日本が先に直面する課題を<br class="rd-hero__sp-break">「世界の問い」へ</h2>
          <p class="rd-hero__text bold mt-16 mb-40">問いを探索・検証し、<br class="rd-hero__sp-break">次のVentureへつなげるR&D</p>
          <a class="link_btn" href="#rd-portfolio">
            <p>プロジェクトを見る</p>
          </a>
        </div>
      </section>
    </div>
  </div>

  <!-- About_テンプレートパーツ呼び出し -->
  <?php get_template_part('template-parts/rd/about'); ?>

  <!-- Portfolio_テンプレートパーツ呼び出し -->
  <?php get_template_part('template-parts/rd/portfolio'); ?>

  <!-- Process_テンプレートパーツ呼び出し -->
  <?php get_template_part('template-parts/rd/process'); ?>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>
