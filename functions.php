<?php 

/*

css

*/

function my_enqueue_styles() {
  wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');

  wp_enqueue_style('style', get_stylesheet_uri(), array('ress'), false, 'all');

  if(is_single()) {
    wp_enqueue_style('single', get_theme_file_uri('css/single.css'), array('ress', 'style'), false, 'all');
  } 
  
  if(is_category()) {
    wp_enqueue_style('category', get_theme_file_uri('css/category.css'), array('ress', 'style'), false, 'all');
  } 

  if(is_page()) {
    wp_enqueue_style('page', get_theme_file_uri('css/page.css'), array('ress', 'style'), false, 'all');
}

if(is_tag()) {
  wp_enqueue_style('tag', get_theme_file_uri('css/tag.css'), array('ress', 'style'), false, 'all');
}

}

add_action('wp_enqueue_scripts', 'my_enqueue_styles');




add_action('init', function() {

  /*サムネイル */

  add_theme_support('post-thumbnails');

  /* ナビゲーション */
  register_nav_menus ([
    'global_nav' => 'グローバルナビゲーション'
  ]);

});






function theme_slug_widgets_init () {
  
  /*   アイコン */
  register_sidebar(array (
    'name' => 'アイコン画像',
    'id' => 'icon'
  ));

  /*   ヒーロー */
  register_sidebar(array (
    'name' => 'メイン画像',
    'id' => 'hero'
  ));

  /*   広告 */
  register_sidebar (array (
    'name' => '広告',
    'id' => 'ads'
  ));

  /*   販売サイト */
  register_sidebar (array (
    'name' => '販売',
    'id' => 'sell'
  ));

  /*   コンタクト */
  register_sidebar (array (
    'name' => 'コンタクト',
    'id' => 'contact'
  ));


  /*   リンク  */
  register_sidebar (array (
    'name' => 'リンク',
    'id' => 'link'
  ));

}

add_action('widgets_init', 'theme_slug_widgets_init');



 /*   ページネーション  */

function pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;

  // 現在のページ数
  global $paged;
  if(empty($paged)) {
    $paged = 1;
  }

  // 全ページ数
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }

  // ページ数が2ぺージ以上の場合のみ、ページネーションを表示
  if(1 != $pages) {
    echo '<div class="pagination">';
    echo '<ul>';
    // 1ページ目でなければ、「前のページ」リンクを表示
    if($paged > 1) {
      echo '<li class="prev"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '">前のページ</a></li>';
    }

    // ページ番号を表示（現在のページはリンクにしない）
    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
        if ($paged == $i) {
          echo '<li class="active">' .$i. '</li>';
        } else {
          echo '<li><a href="' . esc_url(get_pagenum_link($i)) . '">' .$i. '</a></li>';
        }
      }
    }

    // 最終ページでなければ、「次のページ」リンクを表示
    if ($paged < $pages) {
      echo '<li class="next"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '">次のページ</a></li>';
    }
    echo '</ul>';
    echo '</div>';
  }
}


 /*   ナビゲーションメニュー  */



