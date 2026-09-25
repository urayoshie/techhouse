<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />

  <?php if (is_404()) : ?>
    <title>404 not found | TechHouse.Work</title>
    <meta name="description" content="TechHouse.Worksの404 not foundページです。">
  <?php endif; ?>

  <!--css-->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css?<?php echo date('YmdHis'); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/customize.css?<?php echo date('YmdHis'); ?>">
  <!--font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body class="drawer drawer--right top">

  <header id="header" class="header">
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <h1><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" alt="TechHouse.Works株式会社"></a></h1>
    <nav class="drawer-nav" role="navigation">
      <div class="drawer-nav__box">
        <div>
          <h1 class="nav_logo"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/nav_logo.svg" alt="TechHouse.Works株式会社"></a></h1>
          <ul class="drawer-menu">
            <!-- SERVICE（親） -->
            <li class="has-children">
              <a href="#" class="drawer-menu-item service js-accordion">
                <p>SERVICE</p>
              </a>

              <!-- 子メニュー -->
              <ul class="sub-menu">
                <li>
                  <a href="<?php echo home_url('/service//bootup-listingon'); ?>" class="drawer-menu-item">
                    <p>Boot Up! / Listing On!</p>
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url('/service//beyond-borders'); ?>" class="drawer-menu-item">
                    <p>Beyond Borders</p>
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url('/service//pennyshot-club'); ?>" class="drawer-menu-item">
                    <p>PennyShot Club</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- 既存メニュー -->
            <li><a class="drawer-menu-item" href="<?php echo home_url('/style'); ?>">
                <p>STYLE</p>
              </a></li>
            <li><a class="drawer-menu-item" href="<?php echo home_url('/insights'); ?>">
                <p>MEDIA</p>
              </a></li>
            <li><a class="drawer-menu-item" href="<?php echo home_url('/news'); ?>">
                <p>NEWS</p>
              </a></li>
            <li><a class="drawer-menu-item" href="<?php echo home_url('/company'); ?>">
                <p>COMPANY</p>
              </a></li>
            <li><a class="drawer-menu-item" href="<?php echo home_url('/contact'); ?>">
                <p>CONTACT</p>
              </a></li>
            <li><a class="drawer-menu-item drawer-menu-item--boot-up" href="<?php echo home_url('/service//bootup'); ?>">
                <p class="text-center">Boot Up!</p>
              </a></li>
          </ul>
        </div>
        <div class="drawer_sp_wrapper">
          <ul class="sns">
            <li><a href="https://www.facebook.com/TechHouse.Works/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_sns01.svg" alt="Facebook"></a></li>
            <li><a href="https://twitter.com/techhouse_works?lang=ja" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_sns02.svg" alt="X"></a></li>
            <li><a href="https://note.com/techhouse_works" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/footer_sns03.svg" alt="Note"></a></li>
          </ul>
          <p class="nav_privacy"><a href="<?php echo home_url('/privacy/'); ?>"><?php _e('プライバシーポリシー', 'WPML'); ?></a></p>
          <p class="nav_copyright">©2024&nbsp;TechHouse.Works inc.</p>
        </div>
      </div>
    </nav>
  </header>