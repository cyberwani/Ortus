<? $well = of_get_option('wells'); ?>

	<div id="content" <? if($well["1"]) echo 'class="well"'; ?>>
		<?php while ( have_posts() ) : the_post(); 
			
			$classes = 'clearfix article';
			if($well["2"]) $classes .= ' well'; ?>
				
			<div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?> role="article">
						
				<div class="article-content-home post_content clearfix">
						
					<?php if(has_post_thumbnail()) { ?>
						<div class="article-img">
							<? $thumbUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/timthumb.php?src=<?php echo $thumbUrl[0]; ?>&amp;w=100" title="<?php the_title(); ?>"/>	
						</div>
					<? } ?>
							
					<?php the_content( __("more &raquo;","ortus") ); ?>

				</div>
							
			</div> <!-- end article -->
						
		<?php endwhile; ?>
			
	</div>