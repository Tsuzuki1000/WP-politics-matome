<?php get_header(); ?>


<div class="container">
  <?php get_sidebar('left'); ?>
      <main>
        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
        <article>
          <h2 class="article-title">
            <?php the_title(); ?>
          </h2>
          <div class="meta">
            <div class="time"><?php the_time('Y/m/d'); ?></div>
            <div class="category">
            <?php $categories = get_the_category(); 
            if ( ! empty( $categories ) ) {
              echo '<span><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
            }
            ?>
          </div>
          <div class="tag">
  <?php 
  $posttags = get_the_tags();
  if ( $posttags ) {
    foreach( $posttags as $tag ) {
      echo '<span><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></span>';
    }
  }
  ?>
</div>
          </div>
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="サムネイル">
          <div class="text">
            <?php the_excerpt(); ?>
          </div>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
        <div class="pagination">
        <?php if (function_exists("pagination")) :
        pagination($wp_query->max_num_pages); ?>
        <?php endif; ?>
        </div>
      </main>
      <?php get_sidebar('right'); ?>
    </div>


<?php get_footer(); ?>