<?php get_header(); ?>

<main id="service-all" class="service-all">
  <div class="inner">
    <section class="section">
      <div class="service-all__content center mt-100 radius-40">
        <h4 class="text-center semi-bold">シードからEXITまで切れ目のない<br class="pc-none">総合支援<br>
          2つのスタートアップ向けプログラム</h4>
        <img class="img img--pc center" src="<?php echo get_template_directory_uri(); ?>/assets/images/thanks-download_program.svg" alt="Boot UP!(シード期〜アーリー期) → Listing On!(アーリー期〜EXIT) ">
        <img class="img img--sp center" src="<?php echo get_template_directory_uri(); ?>/assets/images/thanks-download_program-sp.svg" alt="Boot UP!(シード期〜アーリー期) → Listing On!(アーリー期〜EXIT) ">
        <a class="link_btn" href="<?php echo home_url('/bootup-listingon'); ?>">
          <p class="semi-bold">詳しく見る</p>
        </a>
      </div>
    </section>
  </div>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>