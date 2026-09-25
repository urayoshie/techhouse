<?php get_header(); ?>

<main id="contact">
  <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
        <div class="sec_title_text">
          <h1>Contact</h1>
          <p class="sec_title_jp">お問い合わせ</p>
        </div>
      </div>
    </div>
  </div>

  <section class="p-contact section-contact section">
    <div class="inner">
      <div class="p-contact-width">
        <?php echo do_shortcode('[contact-form-7 id="5c22dc7" title="お問い合わせ"]'); ?>
      </div>
    </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>