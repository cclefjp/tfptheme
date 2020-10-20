<!-- 個別の投稿ページの表示 -->
<div class="postdetail">
    <time class="time"><?php the_time( 'Y.m.d' ); ?></time>
    <div class="post_body"><?php the_content(); ?></div>
</div><!-- postdetail -->
<div class="adjacent-posts">

<?php
$next_post = get_next_post();
$prev_post = get_previous_post();
if ( $next_post ):
?>
  
    <div class="prev">
    <a class="another-link" href="<?php echo get_permalink( $next_post->ID ); ?>">NEXT</a>
    </div><!-- prev -->
<?php
endif;
if ($prev_post ):
?>  

    <div class="next">
    <a class="another-link" href="<?php echo get_permalink( $prev_post->ID ); ?>">PREV</a>
    </div><!-- next -->
<?php endif; ?>  
</div><!-- adjacent-posts -->
