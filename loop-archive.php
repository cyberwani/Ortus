<? $well = of_get_option('wells'); ?>

	<div id="content" <? if($well["1"]) echo 'class="well"'; ?>>

		<div class="page-header">
			<h1 class="page-title">
				<? if ( is_day() ) { ?>
					<? echo get_the_date(); ?>
					<small><? echo __("Daily Archives","ortus"); ?></small>
				<? } elseif ( is_month() ) { ?>
					<? echo get_the_date('F Y'); ?>
					<small><? echo __("Monthly Archives","ortus"); ?></small>
				<? } elseif ( is_year() ) { ?>
					<? echo get_the_date('Y'); ?>
					<small><? echo __("Yearly Archives","ortus"); ?></small>
				<? } elseif(is_tag()) { ?>
					<? echo single_tag_title( '', false ); ?>
				<? } elseif(is_category()) { ?>
					<? echo single_cat_title( '', false ); ?>
					<small>
						<?php
							$categories = get_the_category();
							$category_description = $categories[0]->category_description;
							if ( ! empty( $category_description ) )
								echo $category_description;
						?>
					</small>
				<? } else { ?>
					<? echo __( 'Blog Archives', 'ortus' ); ?>
				<? } ?>
			</h1>
		</div>
		
		<? if(have_posts()){ ?>
			<?php while ( have_posts() ) : the_post(); 
			
				$classes = 'clearfix article';
				if($well["2"]) $classes .= ' well'; ?>
					
				<div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?> role="article">
						
					<div class="article-meta">
						<? ortus_commentcount(get_the_ID()); ?>						
					</div>
						
					<div class="article-header">	
						<div class="page-header">
							<h2>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								<small><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php __("by", "ortus"); ?> <?php the_author_posts_link(); ?></small>
							</h2>								
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
		<? } else { ?>
		
			<div id="post-0" class="post no-results not-found">
				<div class="page-header">
					<h1 class="entry-title"><?php __( 'Nothing Found', 'ortus' ); ?></h1>
				</div><!-- .entry-header -->

				<div class="entry-content">
					<p><?php __( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'ortus' ); ?></p>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
		
		<? } ?>
			
	</div>