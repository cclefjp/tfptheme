<li class="searchresult-box" style="
	background: url(<?php echo tfp_get_searchresult_background(); ?>) repeat;
">
  <a class="searchresult-link" href="<?php the_permalink(); ?>">
    <div class="link-container">
      <div class="post-thumbnail">
				<?php echo tfp_get_post_thumbnail(); /*
				<?php 
			    $image = get_the_post_thumbnail( $post->ID, 'search' );
					if ( $image ) {
						echo $image;
					} */
				?>
    	</div><!-- image -->
    	<dl>
      	<dt><?php the_title(); ?></dt>
      		<dd class="description"><?php echo get_the_excerpt(); ?></dd>
    	</dl>
  	</div><!-- item-wrapper -->
  </a>
</li>