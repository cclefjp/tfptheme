<?php get_header(); ?>
<div class="page-inner">
  <div class="page-main" id="pg-search">
    <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url() ); ?>">
      <div class="search-box">
        <input type="text" name="s" class="search-input" placeholder="キーワードを入力してください" value="<?php the_search_query(); ?>" />
        <button type="submit" class="button button-submit">検索</button>
      </div><!-- search-box -->
    </form>
    <div class="searchResult-wrapper">
			<?php if ( get_search_query() ): ?>		    
      <div class="searchResult-head">
        <h3 class="title">「<?php the_search_query(); ?>」の検索結果</h3>
          <div class="total">全<?php echo $wp_query->found_posts; ?>件</div>
      </div><!-- searchResult-head -->
			<?php endif; ?>		    
    	<ul class="searchResultLlist">
			<?php		      
 				if ( have_posts() && get_search_query() ) :
 				while ( have_posts() ) : the_post();
			?>	      
        <li class="searchResultLlist-item">
        <a href="<?php the_permalink(); ?>">
        <div class="item-wrapper">
          <div class="image">
						<?php 
							$image = get_the_post_thumbnail( $post->ID, 'search' );
							if ( $image ):
								echo $image;
							else:
								echo '<img src="'. get_template_directory_uri(). '/assets/images/img-noImage.png" />';
							endif;
						?>
    			</div><!-- image -->
    			<dl>
      			<dt><?php the_title(); ?></dt>
      			<dd class="description"><?php echo get_the_excerpt(); ?></dd>
    			</dl>
  			</div><!-- item-wrapper -->
        </a>
        </li>
				<?php endwhile; ?>		      
      </ul>
      <div class="pager">
        <ul class="pagerList">
				<?php
					if ( function_exists( 'tfp_pagenavi' ) ):
						tfp_pagenavi( $wp_query );
					endif;
				?>			
        </ul>
      </div><!-- pager -->
		<?php elseif( ! get_search_query() ): ?>
			<p> 検索ワードが入力されていません</p>
		<?php else: ?>
			<p>該当する記事は見つかりませんでした。</p>
		<?php endif; ?>
  	</div><!-- searchResult-wrapper -->
	</div><!-- page-main -->
</div><!-- page-inner -->
<?php  get_footer(); ?>
