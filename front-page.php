  <?php get_header(); ?>

  <main id="top">
    <div class="section-mv">
      <img class="section-mv__bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv.webp" alt="">
      <img class="section-mv__bg__sp" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_sp.webp" alt="">
      <img class="section-mv__bg__person person1 slide-in downAnime" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_person1.png" alt="">
      <img class="section-mv__bg__person person2 slide-in downAnime" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_person2.png" alt="">
      <img class="section-mv__bg__person person3 slide-in downAnime" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_person3.png" alt="">
      <img class="section-mv__bg__person person4 slide-in downAnime" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_person4.png" alt="">
      <img class="section-mv__bg__person person5 slide-in downAnime" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_person5.png" alt="">
      <img class="section-mv__bg__person person6 slide-in downAnime" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_person6.png" alt="">
      <img class="section-mv__sun" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_sun.png" alt="">
      <img class="section-mv__story" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_story.png" alt="">
    </div>

    <div class="slider mv_slide">
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_slide.png" alt="Fun To Try"></div>
      <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_slide.png" alt="Fun To Try"></div>
    </div>

    <div class="inner">
      <div class="section-mv__story_sp mb-100">
        <p>挑戦は一人でやるものじゃない。<br>チームで挑むから楽しいんだ。</p>
        <p>火を持ち寄り、それはやがて炎となる。</p>
        <p>時には泥臭く、そして苦楽を共にし、<br>孤独を温かく包み込む。</p>
        <p>失敗したっていいんじゃない？<br>失敗だって楽しんで糧にしちゃうから。</p>
        <p>今からでも遅くない。<br>人生を楽しみながらドラマティックに。</p>
      </div>
    </div>

    <section class="section-mvp">
      <div class="inner">
        <div class="mvp_contents radius-16">
          <img class="mvp_tech_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mvp_01.png" alt="">
          <ul>
            <li>
              <h5 class="mvp_title bold"><span class="radius-100"></span>Vision</h5>
              <div class="slide-in leftAnime mt-20">
                <p class="mvp_copy medium slide-in_inner leftAnimeInner">挑戦者の可能性を<br>最大限に発揮できる<br class="pc-none"> 世の中に</p>
              </div>
            </li>
            <li class="mt-60">
              <h5 class="mvp_title bold medium"><span class="radius-100"></span>Mission</h5>
              <div class="slide-in leftAnime mt-20">
                <p class="mvp_copy medium slide-in_inner leftAnimeInner">挑戦者が躊躇せず、<br>何度でも<br class="pc-none">挑み続けられる<br class="pc-none">居場所をつくる</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="section-system section">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>System</h1>
            <p class="sec_title_jp">システム</p>
          </div>
        </div>
        <div class="sec_contents">
          <div class="sec_contents_wrapper">
            <div class="sec_contents_left">
              <div class="slide-in leftAnime">
                <h2 class="slide-in_inner leftAnimeInner">TechHouse.Worksが<br>目指すエコシステム
                </h2>
              </div>
              <div class="slide-in leftAnime mt-24">
                <p class="slide-in_inner leftAnimeInner">挑戦の成功は、質より量。<br>
                  そして、その量の中から質が育っていく。<br>初めて挑む人でも、成功経験者と同じようにチャンスを掴めるように。<br>
                  弊社のエコシステムは、挑戦の打席を増やし、学びを重ねながら成功の確率を高めていく仕組みです。<br>失敗を恐れず挑み続ける。<br>その循環の先に、偶然ではなく“必然の成功”が生まれます。
                </p>
              </div>
            </div>
            <div class="sec_contents_right">
              <a href="<?php echo get_template_directory_uri(); ?>/assets/images/top/system.webp" rel="lightbox">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/system.webp" alt="4つのグロースファンクションと3つのシェアードサービスの図">
                <img class="zoom-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/zoom-up.png" alt="拡大ボタン">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-function section bg-gray">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>Function</h1>
            <p class="sec_title_jp">機能</p>
          </div>
        </div>
        <?php get_template_part('template-parts/function'); ?>
      </div>
    </section>

    <section class="section-service section">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>Service</h1>
            <p class="sec_title_jp">サービス</p>
          </div>
        </div>
        <div class="sec_contents">
          <?php get_template_part('template-parts/service'); ?>
        </div>
      </div>
    </section>

    <section class="section-service section bg-gray">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>R&D</h1>
            <p class="sec_title_jp">研究開発</p>
          </div>
        </div>
        <div class="sec_contents">
          <?php get_template_part('template-parts/rd'); ?>
        </div>
      </div>
    </section>

    <section class="section-style section">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>Style</h1>
            <p class="sec_title_jp">行動指針</p>
          </div>
        </div>
        <div class="sec_contents">
          <ul>
            <li class="fadein_lr radius-24">
              <img class="center" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/style_01.png" alt="">
              <h3 class="mt-20 text-center">主人公であれ</h3>
              <p class="mt-20">私たちは、常に挑戦者として、自身のWhy Meを叶えるためのチャレンジを続けます。そのために、仲間を集め、失敗を是とし、何度でも挑み続けます。</p>
            </li>
            <li class="fadein_lr radius-24">
              <img class="center" class="mb-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/style_02.png" alt="">
              <h3 class="mt-20 text-center">ギバーであれ</h3>
              <p class="mt-20">私たちは、リーダーシップの本質が、自分よりも大きなもの（共同体）への献身だと理解しています。そのために、個人の成果よりも、組織や仲間に成果やエネルギーを与えることを優先して行動します。</p>
            </li>
            <li class="fadein_lr radius-24">
              <img class="center" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/style_03.png" alt="">
              <h3 class="mt-20 text-center">同志であれ</h3>
              <p class="mt-20">私たちは、挑戦者の志に共鳴し、支援者ではなく当事者として共に戦います。そのために、自らの技能を磨き、挑戦者のパートナーとして企業価値の向上を実現します。
              </p>
            </li>
          </ul>
          <div class="mt-80">
            <a class="link_btn" href="<?php echo home_url('/style'); ?>">
              <p>行動指針を見る</p>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="media" class="section-archive section">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>Media</h1>
            <p class="sec_title_jp">メディア</p>
          </div>
        </div>
        <div class="sec_contents">
          <?php
          $media_query = new WP_Query(array(
            'post_type'      => 'media_post',
            'posts_per_page' => 4,
          ));
          ?>

          <?php if ($media_query->have_posts()) : ?>
            <ul class="archive__list">
              <?php while ($media_query->have_posts()) : $media_query->the_post(); ?>
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

            <div class="mt-60 text-center">
              <a class="link_btn" href="<?php echo esc_url(home_url('/insights/')); ?>">
                <p>すべて見る</p>
              </a>
            </div>
          <?php endif; ?>
          <div class="mt-80">
            <a class="note-btn center radius-24" href="https://note.com/techhouse_works" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/note.png" alt="note">
              <p class="bold">TechHouse.Works<span style="display: inline-block;">公式note</span></p>
            </a>
          </div>
        </div>
      </div>
    </section>

    <div class="inner">
      <div class="separator"></div>
    </div>

    <section id="news" class="section-archive section">
      <div class="inner top-sec">
        <div class="sec_title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
          <div class="sec_title_text">
            <h1>News</h1>
            <p class="sec_title_jp">お知らせ</p>
          </div>
        </div>
        <div class="sec_contents">
          <ul class="archive__list">
            <?php
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 4
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
            ?>

              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <li class="archive__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="archive__item__wrapper">
                      <?php
                      $categories = get_the_category();
                      $catname = !empty($categories) ? $categories[0]->name : '';
                      ?>
                      <!-- サムネイル -->
                      <div class="thumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-image.png" alt="">
                        <?php endif; ?>
                      </div>

                      <!-- カテゴリ -->
                      <?php if ($catname) : ?>
                        <p class="category mt-12 radius-100 font-size-xsmall line-height-1"><?php echo esc_html($catname); ?></p>
                      <?php endif; ?>

                      <!-- タイトル -->
                      <p class="title bold mt-8 line-height-15"><?php the_title(); ?></p>

                      <!-- 日付 -->
                      <p class="date mt-12 font-size-xsmall line-height-1">
                        <?php echo get_the_date('Y.n.j'); ?>
                      </p>
                    </div>
                  </a>
                </li>

              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p class="center no-post">準備中</p>
            <?php endif; ?>
          </ul>
          <div class="mt-60">
            <a class="link_btn" href="<?php echo home_url('/news'); ?>">
              <p>すべて見る</p>
            </a>
          </div>
        </div>
      </div>


    </section>

    <?php get_sidebar('contact'); ?>

  </main>

  <?php get_footer(); ?>