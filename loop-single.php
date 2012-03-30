<? $well = of_get_option('wells'); ?>

	<div id="content" <? if($well["1"]) echo 'class="well"'; ?>>
		<?php while ( have_posts() ) : the_post(); 
			
			$classes = 'clearfix article';
			if($well["2"]) $classes .= ' well'; ?>
				
			<div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?> role="article">
					
				<div class="article-meta">
					<? ortus_commentcount(get_the_ID()); ?>						
				</div>
					
				<div class="article-header">	
					<div class="page-header">
						<h1>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							<small><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php __("by", "ortus"); ?> <?php the_author_posts_link(); ?></small>
						</h1>								
					</div>
							
				</div>
						
				<div class="article-content post_content clearfix">
						
					<?php if(has_post_thumbnail()) { ?>
						<div class="article-img">
							<? $thumbUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/ortus/timthumb.php?src=<?php echo $thumbUrl[0]; ?>&amp;w=100" title="<?php the_title(); ?>"/>	
						</div>
					<? } ?>
							
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div>' . __("Pages:" , "ortus"), 'after' => '</div>' ) ); ?>
				</div>
				
				<div class="clear"></div>
						
				<div class="article-footer">
					<? ortus_categories(); ?>
					<? ortus_tags(); ?>	
					<div class="clear"></div>
				</div> <!-- end article footer -->
							
			</div> <!-- end article -->
			
			<!-- If is_single() display the comments -->		
			<?php if(is_single()) comments_template( '', true ); ?>
						
		<?php endwhile; ?>
			
	</div>