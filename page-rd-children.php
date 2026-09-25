<?php
/*
Template Name: R&D 配下 共通テンプレート
*/
get_header();

function get_slug_path($post_id) {
    $slugs = array();
    $current_id = $post_id;

    while ($current_id) {
        $slugs[] = get_post_field('post_name', $current_id);
        $current_id = wp_get_post_parent_id($current_id);
    }

    return array_reverse($slugs);
}

$slug_path = get_slug_path(get_the_ID());

// 'rd' より後ろの階層だけをテンプレートパートのパスとして使う
$root_index = array_search('rd', $slug_path);
$relative_slugs = ($root_index !== false) ? array_slice($slug_path, $root_index + 1) : $slug_path;
$relative_path = implode('/', $relative_slugs);
$part_path = 'template-parts/rd/' . $relative_path;

// パスをクラス名として使えるように、スラッシュをハイフンに変換
$page_class = 'page-' . str_replace('/', '-', $relative_path);
?>

<div class="rd-children <?php echo esc_attr($page_class); ?>">
    <?php
    if (locate_template($part_path . '.php')) {
        get_template_part($part_path);
    } else {
        echo '<p>コンテンツが見つかりません</p>';
    }
    ?>
</div>

<?php get_footer(); ?>