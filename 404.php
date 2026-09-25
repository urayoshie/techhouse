<?php
/*
Template Name: Custom 404 Page
*/
get_header(); ?>

<main id="404">
  <section class="section-post section">
    <div class="inner">
      <div class="404_contents mt-32">
        <h2 class="404_contents__title text-center">404 Not Found</h2>
        <p class="404_contents__description text-center">申し訳ございません。<br>お探しのページは見つかりませんでした。</p>
      </div>
      <div class="mt-40">
        <a class="link_btn" href="<?php echo home_url('/'); ?>">
          <p>ホームへ戻る</p>
        </a>
      </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>