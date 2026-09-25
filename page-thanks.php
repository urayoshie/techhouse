<?php get_header(); ?>

<main id="thanks">

  <section class="section-thanks section">
    <div class="inner">
      <div class="thanks_contents mt-32">
        <h4 class="bold text-center mb-32">送信が完了しました</h4>
        <p class="text-center">ご入力いただいた内容は無事送信されました。<br>担当者が確認の上、ご連絡差し上げますので<br class="pc-none">今しばらくお待ちください。</p>
        <a class="link_btn" href="<?php echo home_url('/'); ?>">
          <p class="mt-32">TOPページへ戻る</p>
        </a>
      </div>
    </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<?php get_footer(); ?>