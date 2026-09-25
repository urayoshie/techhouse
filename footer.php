<footer id="footer" class="footer">
  <img class="footer_team" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer.webp" alt="">
  <div class="footer_content_wrapper">
    <div class="footer_content flex pt-40">
      <div class="footer_logo">
        <a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_logo.svg" alt=""></a>
      </div>
      <div class="footer_nav_right">
        <div class="footer_nav">
          <ul>
            <li style="pointer-events: none; opacity:0.5;">
              <a href="#">
                <p>SERVICE</p>
              </a></li>
            <li><a href="<?php echo home_url('/service/bootup-listingon'); ?>">
                <p class="bold">Boot Up! / Listing On!</p>
              </a></li>
            <li><a href="<?php echo home_url('/service/beyond-borders'); ?>">
                <p class="bold">Beyond Borders</p>
              </a></li>
            <li><a href="<?php echo home_url('/service/pennyshot-club'); ?>">
                <p class="bold">PennyShot Club</p>
              </a></li>
          </ul>
          <ul class="footer_nav__menu">
            <li><a href="<?php echo home_url('/style'); ?>">
                <p class="bold">STYLE</p>
              </a></li>
            <li><a href="<?php echo home_url('/insights'); ?>">
                <p class="bold">MEDIA</p>
              </a></li>
            <li><a href="<?php echo home_url('/news'); ?>">
                <p class="bold">NEWS</p>
              </a></li>
            <li><a href="<?php echo home_url('/company'); ?>">
                <p class="bold">COMPANY</p>
              </a></li>
            <li><a href="<?php echo home_url('/contact'); ?>">
                <p class="bold">CONTACT</p>
              </a></li>
          </ul>
          <ul class="footer_nav__boot-up">
            <li><a href="<?php echo home_url('/service/bootup'); ?>">
                <p class="bold">Boot Up!</p>
              </a></li>
          </ul>
        </div>
        <ul class="footer_sns mt-40">
          <li><a href="https://www.facebook.com/TechHouse.Works/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_sns01.svg" alt="Facebook"></a></li>
          <li><a href="https://twitter.com/techhouse_works?lang=ja" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_sns02.svg" alt="X"></a></li>
          <li><a href="https://note.com/techhouse_works" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_sns03.svg" alt="Note"></a></li>
        </ul>
      </div>
    </div>
    <div class="footer_content2 bg-black pt-8 mt-16">
      <p class="footer_copyright font-size-xsmall">©2026&nbsp;TechHouse.Works inc.</p>
      <a class="footer_privacy font-size-small" href="<?php echo home_url('/privacy'); ?>">プライバシーポリシー</a>
    </div>
  </div>
</footer>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- slick -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- iScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
<!-- drawer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
<?php wp_footer(); ?>
</body>

</html>