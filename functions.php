<?php
/*----------------------------------------------------------*/
/* 管理画面：カスタム投稿タイプ登録・ラベル変更 */
/*----------------------------------------------------------*/
add_action('init', function () {
  add_theme_support('post-thumbnails');

  // メディア投稿
  register_post_type('media_post', [
    'label' => 'メディア投稿',
    'public' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-admin-post',
    'supports' => ['thumbnail', 'title', 'editor'],
    'has_archive' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'insights'],
  ]);

  // R&Dメディア投稿
  register_post_type('rd_media_post', [
    'label' => 'R&Dメディア投稿',
    'public' => true,
    'menu_position' => 7,
    'menu_icon' => 'dashicons-admin-post',
    'supports' => ['thumbnail', 'title', 'editor'],
    'has_archive' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'rd/insights'],
  ]);

  // 事例投稿専用カテゴリ
  register_taxonomy('case_category', 'case_post', [
    'label' => '事例カテゴリー',
    'hierarchical' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'case'],
  ]);

  // メディア投稿専用カテゴリ
  register_taxonomy('media_category', 'media_post', [
    'label' => 'メディアカテゴリー',
    'hierarchical' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'insights'],
  ]);

  // R&Dメディア投稿専用カテゴリ
  register_taxonomy('rd_media_category', 'rd_media_post', [
    'label' => 'R&Dメディアカテゴリー',
    'hierarchical' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'rd/insights'],
  ]);

  // お知らせラベル変更
  global $wp_post_types;
  if (isset($wp_post_types['post'])) {
    $wp_post_types['post']->labels->name = 'お知らせ投稿';
    $wp_post_types['post']->labels->singular_name = 'お知らせ投稿';
    $wp_post_types['post']->labels->add_new = '新規追加';
    $wp_post_types['post']->labels->add_new_item = '新規お知らせ追加';
    $wp_post_types['post']->labels->edit_item = 'お知らせを編集';
    $wp_post_types['post']->labels->all_items = 'お知らせ一覧';
  }
});


/*----------------------------------------------------------*/
/* 管理画面：投稿メニューを「お知らせ投稿」に変更 */
/*----------------------------------------------------------*/
add_action('admin_menu', function () {
  global $menu, $submenu;
  $menu[5][0] = 'お知らせ投稿';
  $submenu['edit.php'][5][0] = 'お知らせ投稿一覧';
  $submenu['edit.php'][10][0] = '新規お知らせ追加';
});


/*----------------------------------------------------------*/
/* 管理画面：メディア投稿一覧にカテゴリ・サムネイル・スラッグパス列を追加 */
/*----------------------------------------------------------*/
add_filter('manage_media_post_posts_columns', function($columns) {
  $new_columns = array();
  foreach ($columns as $key => $value) {
    $new_columns[$key] = $value;
    if ($key === 'cb') {
      $new_columns['thumbnail'] = 'サムネイル';
    }
    if ($key === 'title') {
      $new_columns['slug_path'] = 'スラッグパス';
      $new_columns['media_category'] = 'カテゴリー';
    }
  }
  return $new_columns;
});

add_action('manage_media_post_posts_custom_column', function($column, $post_id) {
  if ($column === 'thumbnail') {
    $thumbnail = get_the_post_thumbnail($post_id, [60, 60]);
    echo $thumbnail ? $thumbnail : '—';
  }
  if ($column === 'slug_path') {
    $terms = get_the_terms($post_id, 'media_category');
    $post  = get_post($post_id);
    if (!empty($terms) && !is_wp_error($terms) && $post) {
      echo '/insights/' . $terms[0]->slug . '/' . $post->post_name . '/';
    } else {
      echo '—';
    }
  }
  if ($column === 'media_category') {
    $terms = get_the_terms($post_id, 'media_category');
    if (!empty($terms) && !is_wp_error($terms)) {
      $term_names = array_map(function($term) {
        return $term->name;
      }, $terms);
      echo implode(', ', $term_names);
    } else {
      echo '—';
    }
  }
}, 10, 2);


/*----------------------------------------------------------*/
/* 管理画面：R&Dメディア投稿一覧にカテゴリ・サムネイル・スラッグパス列を追加 */
/*----------------------------------------------------------*/
add_filter('manage_rd_media_post_posts_columns', function($columns) {
  $new_columns = array();
  foreach ($columns as $key => $value) {
    $new_columns[$key] = $value;
    if ($key === 'cb') {
      $new_columns['thumbnail'] = 'サムネイル';
    }
    if ($key === 'title') {
      $new_columns['slug_path'] = 'スラッグパス';
      $new_columns['rd_media_category'] = 'カテゴリー';
    }
  }
  return $new_columns;
});

add_action('manage_rd_media_post_posts_custom_column', function($column, $post_id) {
  if ($column === 'thumbnail') {
    $thumbnail = get_the_post_thumbnail($post_id, [60, 60]);
    echo $thumbnail ? $thumbnail : '—';
  }
  if ($column === 'slug_path') {
    $terms = get_the_terms($post_id, 'rd_media_category');
    $post  = get_post($post_id);
    if (!empty($terms) && !is_wp_error($terms) && $post) {
      echo '/rd/insights/' . $terms[0]->slug . '/' . $post->post_name . '/';
    } else {
      echo '—';
    }
  }
  if ($column === 'rd_media_category') {
    $terms = get_the_terms($post_id, 'rd_media_category');
    if (!empty($terms) && !is_wp_error($terms)) {
      $term_names = array_map(function($term) {
        return $term->name;
      }, $terms);
      echo implode(', ', $term_names);
    } else {
      echo '—';
    }
  }
}, 10, 2);


/*----------------------------------------------------------*/
/* ニュース一覧ページ　URL変更 */
/*----------------------------------------------------------*/
// 標準投稿に /news/ のアーカイブを追加
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = ['slug' => 'news'];
    $args['has_archive'] = 'news';
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// /news/ を明示的に投稿アーカイブとして登録
function custom_news_rewrite()
{
  add_rewrite_rule(
    '^news/?$',
    'index.php?post_type=post',
  );

  // /news/カテゴリ/ のカテゴリアーカイブ
  add_rewrite_rule(
    '^news/([^/]+)/?$',
    'index.php?category_name=$matches[1]',
    'top'
  );

  // /news/カテゴリ/投稿名/ のリライトルール
  add_rewrite_rule(
    '^news/([^/]+)/([^/]+)/?$',
    'index.php?name=$matches[2]',
    'top'
  );

  // /insights/カテゴリスラッグ/投稿スラッグ/ → 個別記事
  add_rewrite_rule(
    '^insights/([^/]+)/([^/]+)/?$',
    'index.php?post_type=media_post&name=$matches[2]',
    'top'
  );

  // /insights/カテゴリスラッグ/ → カテゴリアーカイブ
  add_rewrite_rule(
    '^insights/([^/]+)/?$',
    'index.php?media_category=$matches[1]',
    'top'
  );

  // /rd/insights/カテゴリスラッグ/投稿スラッグ/ → R&Dメディア個別記事
  add_rewrite_rule(
    '^rd/insights/([^/]+)/([^/]+)/?$',
    'index.php?post_type=rd_media_post&name=$matches[2]',
    'top'
  );

  // /rd/insights/カテゴリスラッグ/ → R&Dメディアカテゴリアーカイブ
  add_rewrite_rule(
    '^rd/insights/([^/]+)/?$',
    'index.php?rd_media_category=$matches[1]',
    'top'
  );
}

add_action('init', 'custom_news_rewrite');

// 投稿URLの生成を /news/カテゴリ/投稿名/ に変更
add_filter('post_link', function ($url, $post) {
  if ($post->post_type !== 'post') return $url;
  $categories = get_the_category($post->ID);
  if (empty($categories)) return $url;
  $cat_slug = $categories[0]->slug;
  return home_url('/news/' . $cat_slug . '/' . $post->post_name . '/');
}, 10, 2);


// media_postのURLを /insights/カテゴリ/投稿名/ に変更
add_filter('post_type_link', function ($url, $post) {
  if ($post->post_type !== 'media_post') return $url;
  $terms = get_the_terms($post->ID, 'media_category');
  if (empty($terms) || is_wp_error($terms)) return $url;
  $term_slug = $terms[0]->slug;
  return home_url('/insights/' . $term_slug . '/' . $post->post_name . '/');
}, 10, 2);

// rd_media_postのURLを /rd/insights/カテゴリ/投稿名/ に変更
add_filter('post_type_link', function ($url, $post) {
  if ($post->post_type !== 'rd_media_post') return $url;
  $terms = get_the_terms($post->ID, 'rd_media_category');
  if (empty($terms) || is_wp_error($terms)) return $url;
  $term_slug = $terms[0]->slug;
  return home_url('/rd/insights/' . $term_slug . '/' . $post->post_name . '/');
}, 10, 2);


/*----------------------------------------------------------*/
/* R&Dメディア：公開記事のあるカテゴリーの取得・noindex制御 */
/*----------------------------------------------------------*/
// 公開記事が1件以上あるR&Dメディアカテゴリーを作成順（問い・機会探索 → 未来洞察・リサーチ → 仮説・実験）で取得
// R&Dページのセクション・一覧ページのタブ表示と noindex の判定で同じ条件を使い、表示と index の状態がずれないようにする
function get_rd_media_terms()
{
  $terms = get_terms(array(
    'taxonomy'   => 'rd_media_category',
    'hide_empty' => true,
    'orderby'    => 'term_id',
  ));
  return is_wp_error($terms) ? array() : $terms;
}

// AIOSEOのサイトマップ表示用スタイル（/default-sitemap.xsl）で「R&Dメディア投稿 サイトマップ」が真っ白になる対策
// AIOSEOはこのスタイルに投稿タイプ・タクソノミーの名前（singular_name）を変換せずに書き込むため、
// 名前の「&」でXMLとして読み込めずエラーになる（AIOSEO v5.0.3 時点の不具合）。
// このスタイルを生成するリクエストのときだけ「&」を「&amp;」に変換し、管理画面などの表示は変えない
function is_aioseo_sitemap_xsl_request()
{
  $path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '';
  return is_string($path) && substr($path, -strlen('/default-sitemap.xsl')) === '/default-sitemap.xsl';
}

function escape_label_for_aioseo_sitemap_xsl($labels)
{
  if (is_aioseo_sitemap_xsl_request()) {
    $labels->singular_name = esc_html($labels->singular_name);
  }
  return $labels;
}
add_filter('post_type_labels_rd_media_post', 'escape_label_for_aioseo_sitemap_xsl');
add_filter('taxonomy_labels_rd_media_category', 'escape_label_for_aioseo_sitemap_xsl');

// AIOSEOが出力する robots メタに noindex を追加する
// （AIOSEOが robots メタを出力しているため、テーマで <meta name="robots"> を直接出すと重複するので、AIOSEOのフィルターで制御する）
// ・/rd/insights/カテゴリスラッグ/：そのカテゴリーの公開記事が0件なら noindex
// ・/rd/insights/：公開記事のあるカテゴリーが1つもなければ noindex
// ・/rd/media/（R&Dの子ページ）：同上。記事0件のときは R&D Media のセクションが非表示になり中身がないため
// 記事が入ると条件から外れ、AIOSEOの通常の設定（index）に戻る
add_filter('aioseo_robots_meta', function ($attributes) {
  if (is_tax('rd_media_category')) {
    $term = get_queried_object();
    if ($term instanceof WP_Term && $term->count === 0) {
      $attributes['noindex'] = 'noindex';
    }
  } elseif (is_post_type_archive('rd_media_post') || is_page('rd/media')) {
    if (empty(get_rd_media_terms())) {
      $attributes['noindex'] = 'noindex';
    }
  }
  return $attributes;
});


// タイトルタグ出力
add_theme_support('title-tag');
function rewrite_separator($separator)
{
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'rewrite_separator');


/*----------------------------------------------------------*/
/* Contact Form 7で自動挿入されるPタグ、brタグを削除 */
/*----------------------------------------------------------*/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}


/*----------------------------------------------------------*/
/* Public Post Previewの有効期限変更（30日） */
/*----------------------------------------------------------*/
add_filter( 'ppp_nonce_life', 'my_nonce_life' );
function my_nonce_life() {
    return 60 * 60 * 24 * 30;
}

/*----------------------------------------------------------*/
/* 管理画面の投稿カテゴリー_選択を１つのみにする */
/*----------------------------------------------------------*/
function limit_category_to_one()
{
?>
  <script>
    wp.domReady(function() {

      const {
        select,
        subscribe,
        dispatch
      } = wp.data;

      let previousCategories = [];

      subscribe(function() {

        const currentCategories = select('core/editor').getEditedPostAttribute('categories');

        if (!currentCategories) return;

        // 2つ以上選択された場合
        if (currentCategories.length > 1) {

          // 最後に選択されたものだけ残す
          const lastSelected = currentCategories[currentCategories.length - 1];

          dispatch('core/editor').editPost({
            categories: [lastSelected]
          });

        }

        previousCategories = currentCategories;

      });

    });
  </script>
<?php
}
add_action('admin_footer-post.php', 'limit_category_to_one');
add_action('admin_footer-post-new.php', 'limit_category_to_one');


/*----------------------------------------------------------*/
/* 事例紹介（case）：投稿タイプ・タクソノミー登録 */
/*----------------------------------------------------------*/
// add_action('init', function () {

//   // 事例紹介
//   register_post_type('case', [
//     'label' => '事例紹介投稿',
//     'public' => true,
//     'menu_position' => 7,
//     'menu_icon' => 'dashicons-admin-post',
//     'supports' => ['thumbnail', 'title', 'editor'],
//     'has_archive' => true,
//     'show_in_rest' => true,
//     'rewrite' => ['slug' => 'case', 'with_front' => false],
//   ]);

//   // カテゴリ1
//   register_taxonomy('case_sector', 'case', [
//     'label' => 'カテゴリ1',
//     'hierarchical' => true,
//     'show_in_rest' => true,
//     'show_admin_column' => true,
//     'rewrite' => false,
//   ]);

//   // カテゴリ2
//   register_taxonomy('case_service', 'case', [
//     'label' => 'カテゴリ2',
//     'hierarchical' => true,
//     'show_in_rest' => true,
//     'show_admin_column' => true,
//     'rewrite' => false,
//   ]);

//   // カテゴリ3
//   register_taxonomy('case_program', 'case', [
//     'label' => 'カテゴリ3',
//     'hierarchical' => true,
//     'show_in_rest' => true,
//     'show_admin_column' => true,
//     'rewrite' => false,
//   ]);
// });


/*----------------------------------------------------------*/
/* 事例紹介：タームの初期登録 */
/*----------------------------------------------------------*/
// add_action('init', function () {

//   $case_sector_terms = ['startup', 'corporate', 'individual'];
//   foreach ($case_sector_terms as $slug) {
//     if (!term_exists($slug, 'case_sector')) {
//       wp_insert_term($slug, 'case_sector', ['slug' => $slug]);
//     }
//   }

//   $case_service_terms = [
//     'growth-capital',
//     'experience-design',
//     'advanced-tech',
//     'people-architect',
//     'integrate-systems',
//   ];
//   foreach ($case_service_terms as $slug) {
//     if (!term_exists($slug, 'case_service')) {
//       wp_insert_term($slug, 'case_service', ['slug' => $slug]);
//     }
//   }

//   $case_program_terms = [
//     'bootup',
//     'bootup-listingon',
//     'beyond-borders',
//     'pennyshot-club',
//   ];
//   foreach ($case_program_terms as $slug) {
//     if (!term_exists($slug, 'case_program')) {
//       wp_insert_term($slug, 'case_program', ['slug' => $slug]);
//     }
//   }
// }, 20);


/*----------------------------------------------------------*/
/* 事例紹介：パーマリンクを /case/{sector}/{service}/{program}/{投稿名}/ に変更 */
/*----------------------------------------------------------*/
// add_filter('post_type_link', function ($url, $post) {
//   if ($post->post_type !== 'case') return $url;

//   $sector_terms = get_the_terms($post->ID, 'case_sector');
//   $service_terms = get_the_terms($post->ID, 'case_service');
//   $program_terms = get_the_terms($post->ID, 'case_program');

//   if (empty($sector_terms) || is_wp_error($sector_terms)) return $url;
//   if (empty($service_terms) || is_wp_error($service_terms)) return $url;
//   if (empty($program_terms) || is_wp_error($program_terms)) return $url;

//   $sector_slug = $sector_terms[0]->slug;
//   $service_slug = $service_terms[0]->slug;
//   $program_slug = $program_terms[0]->slug;

//   return home_url('/case/' . $sector_slug . '/' . $service_slug . '/' . $program_slug . '/' . $post->post_name . '/');
// }, 10, 2);

// // /case/{sector}/{service}/{program}/{投稿名}/ のリライトルール
// function custom_case_rewrite()
// {
//   // 個別記事
//   add_rewrite_rule(
//     '^case/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$',
//     'index.php?post_type=case&name=$matches[4]',
//     'top'
//   );

//   // /case/ アーカイブ
//   add_rewrite_rule(
//     '^case/?$',
//     'index.php?post_type=case',
//     'top'
//   );

//   // /case/{sector}/ 大カテゴリ一覧
//   add_rewrite_rule(
//     '^case/([^/]+)/?$',
//     'index.php?case_sector=$matches[1]',
//     'top'
//   );

//   // /case/{sector}/{service}/ 中カテゴリ一覧
//   add_rewrite_rule(
//     '^case/([^/]+)/([^/]+)/?$',
//     'index.php?case_sector=$matches[1]&case_service=$matches[2]',
//     'top'
//   );
// }
// add_action('init', 'custom_case_rewrite');


// require_once get_template_directory() . '/inc/case-labels.php';




