<sidebar-right>
        <div id="popular-section">
          <h3 class="sidebar-title">おすすめ記事</h3>
          <div id="popular-article">
            <img src="<?php echo esc_url(get_theme_file_uri('img/illust.jpg')); ?>" alt="#">
            <div class="text">
              あああああああああああああああああああああああああああああああああ
            </div>
          </div>
          <?php if(is_active_sidebar('')); ?>
          <div class="popular-article">
            <img src="img/illust.jpg" alt="#">
            <div class="text">
              あああああああああああああああああああああああああああああああああ
            </div>
          </div>
          <div class="popular-article">
            <img src="img/illust.jpg" alt="#">
            <div class="text">
              あああああああああああああああああああああああああああああああああ
            </div>
          </div>
        </div>
        <div id="contact">
          <h3 class="sidebar-title">コンタクト</h3>
          <?php if(is_active_sidebar('contact')): ?>
          <?php dynamic_sidebar('contact'); ?>
          <?php endif; ?>
        </div>
        <div id="site-link">
          <h3 class="sidebar-title">リンク</h3>
          <?php if(is_active_sidebar('link')): ?>
            <?php dynamic_sidebar('link'); ?>
            <?php endif; ?>
        </div>
      </sidebar-right>