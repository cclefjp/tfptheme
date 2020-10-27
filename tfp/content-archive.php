<!-- 投稿一覧ページ内での各投稿の表示を記載 -->


  <li class="post-box" style="
    background: url(<?php echo tfp_get_post_background(); ?>) repeat;
    ">
    <a class="post-link" href="<?php the_permalink(); ?>">
    <div class="link-container">
    <p class="post-thumbnail">
    <?php echo tfp_get_post_thumbnail(); ?>
    </p>
    <span class="post-line">
        <span  class="title"><?php the_title(); ?></span>
        <time class="release">(<?php the_time('Y.m.d'); ?>)</time>
    </span>
  </div>
  </a>
</li>


