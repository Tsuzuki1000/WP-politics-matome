<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo bloginfo('description'); ?>"> 
  <title><?php echo bloginfo('title'); ?></title>
</head>
<body>
  <header>
    <div class="inner">
      <h1 class="site-title">
        <a href="/"><img src="<?php echo esc_url(get_theme_file_uri('img/illust.jpg')); ?>" alt="#"></a>
      </h1>
      <nav class="sns-link">
      <?php 
  wp_nav_menu( array( 
    'theme_location' => 'global_nav' 
  ) ); 
?>
      </nav>
    </div>
    <?php wp_head(); ?>
  </header>