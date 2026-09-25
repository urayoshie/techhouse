<?php
require_once get_template_directory() . '/inc/case-labels.php';
get_header();
?>

<main id="case">
    <div class="p_header">
    <?php get_template_part('template-parts/p-header'); ?>
    <div class="inner">
      <div class="sec_title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/title.png" alt="">
        <div class="sec_title_text">
          <h1>Case</h1>
          <p class="sec_title_jp">事例紹介</p>
        </div>
      </div>
    </div>
  </div>

  <section class="section-archive section">
    <div class="inner">

      <?php
      $current_term = get_queried_object();
      $terms = get_terms(array(
        'taxonomy' => 'case_sector',
        'hide_empty' => true,
      ));
      ?>

      <!-- タブ -->
      <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <div class="archive__tab sp-none">
          <ul class="archive__tab__list">
            <!-- すべて -->
            <li class="archive__tab__item <?php echo (!($current_term instanceof WP_Term)) ? 'is-active' : ''; ?>">
              <a href="<?php echo esc_url(home_url('/case/')); ?>">
                <p class="medium">すべて</p>
              </a>
            </li>

            <?php foreach ($terms as $term) : ?>
              <li class="archive__tab__item <?php echo ($current_term instanceof WP_Term && $current_term->term_id == $term->term_id) ? 'is-active' : ''; ?>">
                <a href="<?php echo esc_url(home_url('/case/' . $term->slug . '/')); ?>">
                  <p class="medium"><?php echo esc_html($term->name); ?></p>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- 記事一覧 -->
      <?php
      $tax_query = [
        'relation' => 'AND',
        [
          'taxonomy' => 'case_sector',
          'field'    => 'slug',
          'terms'    => $current_term->slug,
        ],
      ];

      // case_service の絞り込み
      if (!empty($_GET['case_service'])) {
        $service_slugs = explode(',', sanitize_text_field($_GET['case_service']));
        $tax_query[] = [
          'taxonomy' => 'case_service',
          'field'    => 'slug',
          'terms'    => $service_slugs,
          'operator' => 'IN',
        ];
      }

      // case_program の絞り込み
      if (!empty($_GET['case_program'])) {
        $program_slugs = explode(',', sanitize_text_field($_GET['case_program']));
        $tax_query[] = [
          'taxonomy' => 'case_program',
          'field'    => 'slug',
          'terms'    => $program_slugs,
          'operator' => 'IN',
        ];
      }

      $query = new WP_Query([
        'post_type'      => 'case',
        'posts_per_page' => 12,
        'tax_query'      => $tax_query,
      ]);
      ?>

      <div class="case_section__cat-title mt-60">
        <h2 class="bold"><?php echo esc_html($current_term->name); ?></h2>
        <button class="filter_btn radius-9999" type="button">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon_filter.svg" alt="絞り込み">
          <p class="medium">絞り込み</p>
        </button>
      </div>

      <div class="filter_modal" id="filterModal">
        <div class="filter_modal__overlay"></div>
        <div class="filter_modal__content radius-16">
          <div class="filter_modal__header">
            <h4 class="bold">絞り込み</h4>
            <button class="filter_modal__close" type="button">✕</button>
          </div>

          <div class="filter_modal__body">
          <?php
          // 現在のsectorに紐づく記事IDを取得
          $current_sector_post_ids = get_posts([
            'post_type'      => 'case',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => [[
              'taxonomy' => 'case_sector',
              'field'    => 'slug',
              'terms'    => $current_term->slug,
            ]],
          ]);

          // 該当記事が存在するcase_serviceのタームのみ取得
          $filtered_service_terms = !empty($current_sector_post_ids)
            ? get_terms([
                'taxonomy'   => 'case_service',
                'hide_empty' => true,
                'object_ids' => $current_sector_post_ids,
              ])
            : [];

          // 該当記事が存在するcase_programのタームのみ取得
          $filtered_program_terms = !empty($current_sector_post_ids)
            ? get_terms([
                'taxonomy'   => 'case_program',
                'hide_empty' => true,
                'object_ids' => $current_sector_post_ids,
              ])
            : [];

          $current_sector_map = isset($case_label_map[$current_term->slug])
            ? $case_label_map[$current_term->slug] : [];
          ?>

          <!-- サービス -->
          <div class="filter_modal__group">
            <p class="filter_modal__group__title bold mt-32 mb-16">サービス</p>
            <ul class="filter_modal__list">
              <?php foreach ($filtered_program_terms as $pt) :
                $label = '';
                foreach ($current_sector_map as $service_slug => $service_data) {
                  if (isset($service_data['programs'][$pt->slug])
                    && $service_data['programs'][$pt->slug] !== null) {
                    $label = $service_data['programs'][$pt->slug];
                    break;
                  }
                }
                if (empty($label)) $label = $pt->name;
              ?>
                <li>
                  <button class="filter_tag radius-9999" type="button" data-type="program" data-slug="<?php echo esc_attr($pt->slug); ?>">
                    <p><?php echo esc_html($label); ?></p>
                  </button>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- 機能・領域 -->
          <div class="filter_modal__group mt-32">
            <p class="filter_modal__group__title bold mb-16">機能・領域</p>
            <ul class="filter_modal__list">
              <?php foreach ($filtered_service_terms as $st) :
                $label = '';
                if (isset($case_label_map[$current_term->slug][$st->slug]['label'])) {
                  $label = $case_label_map[$current_term->slug][$st->slug]['label'];
                }
                if (empty($label)) $label = $st->name;
              ?>
                <li>
                  <button class="filter_tag radius-9999" type="button" data-type="service" data-slug="<?php echo esc_attr($st->slug); ?>">
                   <p><?php echo esc_html($label); ?></p>
                  </button>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          </div>

          <div class="filter_modal__footer mt-32">
            <button class="filter_clear_btn radius-16 line-height-1" type="button"><p>クリア</p></button>
            <button class="filter_apply_btn radius-16 line-height-1" type="button"><p>適用</p></button>
          </div>
        </div>
      </div>

      <?php if ($query->have_posts()) : ?>
        <ul class="archive__list archive__list mt-24 pb-4">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $post_sector_terms  = get_the_terms(get_the_ID(), 'case_sector');
            $post_service_terms = get_the_terms(get_the_ID(), 'case_service');
            $post_program_terms = get_the_terms(get_the_ID(), 'case_program');

            $post_sector  = (!empty($post_sector_terms)  && !is_wp_error($post_sector_terms))  ? $post_sector_terms[0]  : null;
            $post_service = (!empty($post_service_terms) && !is_wp_error($post_service_terms)) ? $post_service_terms[0] : null;
            $post_program = (!empty($post_program_terms) && !is_wp_error($post_program_terms)) ? $post_program_terms[0] : null;

            $service_label = '';
            $program_label = '';

            if ($post_sector && $post_service && isset($case_label_map[$post_sector->slug][$post_service->slug]['label'])) {
                $service_label = $case_label_map[$post_sector->slug][$post_service->slug]['label'];
            }

            if ($post_sector && $post_service && $post_program && isset($case_label_map[$post_sector->slug][$post_service->slug]['programs'][$post_program->slug])) {
                $program_label = $case_label_map[$post_sector->slug][$post_service->slug]['programs'][$post_program->slug];
            }
            ?>
            <li class="archive__item">
              <a href="<?php the_permalink(); ?>">
                <div class="archive__item__wrapper">
                  <!-- サムネイル -->
                  <div class="thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(''); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-image.png" alt="">
                    <?php endif; ?>
                  </div>

                  <!-- タイトル -->
                  <p class="title bold mt-8 pb-12 line-height-15"><?php the_title(); ?></p>

                  <!-- カテゴリ -->
                  <?php if (!empty($service_label)) : ?>
                    <p class="category mt-12 font-size-small line-height-1">
                      <?php echo esc_html($service_label); ?>
                    </p>
                  <?php endif; ?>

                  <?php if (!empty($program_label)) : ?>
                    <p class="category mt-8 font-size-small line-height-1">
                      <?php echo esc_html($program_label); ?>
                    </p>
                  <?php endif; ?>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php endif; ?>

    </div>
  </section>

  <?php get_sidebar('contact'); ?>

</main>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const activeServices = urlParams.get('case_service')
    ? urlParams.get('case_service').split(',') : [];
  const activePrograms = urlParams.get('case_program')
    ? urlParams.get('case_program').split(',') : [];

  document.querySelectorAll('.filter_tag').forEach(function(btn) {
    if (btn.dataset.type === 'service' && activeServices.includes(btn.dataset.slug)) {
      btn.classList.add('is-selected');
    }
    if (btn.dataset.type === 'program' && activePrograms.includes(btn.dataset.slug)) {
      btn.classList.add('is-selected');
    }
  });

  const filterBtn    = document.querySelector('.filter_btn');
  const filterModal  = document.getElementById('filterModal');
  const closeBtn     = document.querySelector('.filter_modal__close');
  const overlay      = document.querySelector('.filter_modal__overlay');
  const clearBtn     = document.querySelector('.filter_clear_btn');

  // モーダルを開く
  filterBtn.addEventListener('click', function() {
    filterModal.classList.add('is-open');
  });

  // モーダルを閉じる（×ボタン・オーバーレイ）
  closeBtn.addEventListener('click', function() {
    filterModal.classList.remove('is-open');
  });
  overlay.addEventListener('click', function() {
    filterModal.classList.remove('is-open');
  });

  // タグの選択トグル
  document.querySelectorAll('.filter_tag').forEach(function(btn) {
    btn.addEventListener('click', function() {
      this.classList.toggle('is-selected');
    });
  });

  // クリアボタン
  clearBtn.addEventListener('click', function() {
    document.querySelectorAll('.filter_tag').forEach(function(btn) {
      btn.classList.remove('is-selected');
    });
  });

  // 適用ボタン
  document.querySelector('.filter_apply_btn').addEventListener('click', function() {
    const selectedServices = [];
    const selectedPrograms = [];

    document.querySelectorAll('.filter_tag.is-selected').forEach(function(btn) {
      if (btn.dataset.type === 'service') {
        selectedServices.push(btn.dataset.slug);
      } else if (btn.dataset.type === 'program') {
        selectedPrograms.push(btn.dataset.slug);
      }
    });

    const params = new URLSearchParams();
    if (selectedServices.length > 0) {
      params.set('case_service', selectedServices.join(','));
    }
    if (selectedPrograms.length > 0) {
      params.set('case_program', selectedPrograms.join(','));
    }

    const baseUrl = window.location.pathname;
    const queryString = params.toString();
    window.location.href = baseUrl + (queryString ? '?' + queryString : '');
  });
</script>

<?php get_footer(); ?>
