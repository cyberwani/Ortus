<?
####################################################################################
#
#		Some template functions
#
####################################################################################

function ortus_navbar($head_span){ ?>
	<div class="row">
		<? if(of_get_option('navbar')) {
			
			if(of_get_option('navbar_fixed') == 2) $fixed = 'navbar-fixed-top'; 
			elseif(of_get_option('navbar_fixed') == 3) $fixed = 'navbar-fixed-bottom'; ?>
			
			<div class="navbar <? if(isset($fixed)) echo $fixed; else echo $head_span; ?> ">
				<div class="navbar-inner">
					<div class="container">
									
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
									
						<div class="nav-collapse">
						<? ortus_main_nav(); ?>

						<? if(of_get_option('navbar_search')) {?>
							<form class="navbar-search pull-right" role="search" method="get" id="searchform" action="<? echo home_url( '/' ); ?>">
								<input name="s" id="s" type="text" class="search-query" placeholder="<? echo __('Search','ortus'); ?>">
							</form>
						<? } ?>

						</div>								
					</div>
				</div>
			</div>
		<? } ?>
	</div>
<? }

function ortus_slider($head_span, $span_count){

	$posts = new WP_Query( array ( 'cat' => of_get_option('postslider_cat'), 'posts_per_page' => of_get_option('postslider_max') ) ); ?>
	<div class="row">
	<div id="ortus_postslider" class="carousel <?=$head_span?>">
    	<div class="carousel-inner">
	    	<?
	    	$first = true;
	    	while ( $posts->have_posts() ) : $posts->the_post(); ?>

	    		<div class="item <? if($first) { echo 'active'; $first=false; } ?>">
	    			<? $thumbUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/lib/ortus/timthumb.php?src=<?php echo $thumbUrl[0]; ?>&amp;w=<?= ($span_count - 1) * 100 + 70?>&amp;h=<?=of_get_option('postslider_height') ?>" title="<?php the_title(); ?>"/></a>
					<div class="carousel-caption">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
						<p><? the_excerpt(); ?></p>
					</div>
				</div>
			<? endwhile; ?>
    	</div>
    <a class="carousel-control left" href="#ortus_postslider" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#ortus_postslider" data-slide="next">&rsaquo;</a>
    </div>
	</div>
<? } 

function ortus_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="single-comment clearfix">
			<div class="comment-author vcard row-fluid clearfix">
				<div class="avatar span2">
					<?php echo get_avatar($comment,$size='75',$default='<path_to_url>' ); ?>					
				</div>
				<div class="span10 comment-text">
					<div class="page-header">
						<?php 
						$time = '<time datetime=' . get_comment_date() . '"><a href="' . htmlspecialchars( get_comment_link( $comment->comment_ID ) ) . '">' . get_comment_date() . '</a></time>';
						printf('<h3>%s<small> ' . __("at", "ortus") . " " . $time . '</small></h3>', get_comment_author_link()) ?>
                    </div>
                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.','ortus') ?></p>
          				</div>
					<?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <div class="comment-options" style="float:right;">
                    	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    	<?php edit_comment_link(__('Edit','ortus')) ?>
                    </div>
                </div>
			</div>
		</div>
    <!-- </li> is added by wordpress automatically -->
<?php
} 

function ortus_social(){
	echo '<div id="ortus-social"><ul>';
	
	if(of_get_option('social_google') != ""){
		echo '<li><a target="_blank" href="' . of_get_option('social_google') . '" title="Google+">' .
				'<img src="' . get_bloginfo('stylesheet_directory') . '/lib/ortus/img/googleplus.png" alt="Google+"/></a></li>';
	}
	if(of_get_option('social_fb') != ""){
		echo '<li><a target="_blank" href="' . of_get_option('social_fb') . '" title="Facebook">' .
				'<img src="' . get_bloginfo('stylesheet_directory') . '/lib/ortus/img/facebook.png" alt="Facebook"/></a></li>';
	}
	if(of_get_option('social_tw') != ""){
		echo '<li><a target="_blank" href="' . of_get_option('social_tw') . '" title="Twitter">' .
				'<img src="' . get_bloginfo('stylesheet_directory') . '/lib/ortus/img/twitter.png" alt="Twitter"/></a></li>';
	}
	if(of_get_option('social_linkedin') != ""){
		echo '<li><a target="_blank" href="' . of_get_option('social_linkedin') . '" title="LinkedIn">' .
				'<img src="' . get_bloginfo('stylesheet_directory') . '/lib/ortus/img/linkedin.png" alt="LinkedIn"/></a></li>';
	}
	if(of_get_option('social_feed') != ""){
		echo '<li><a target="_blank" href="' . of_get_option('social_feed') . '" title="RSS">' .
				'<img src="' . get_bloginfo('stylesheet_directory') . '/lib/ortus/img/rss.png" alt="RSS"/></a></li>';
	}
	
	echo '</ul></div>';
}

function ortus_commentcount($id){
	$count = get_comments_number();
	
	echo '<div class="article-comments">';
	
	if(!comments_open($id)){
		echo '<a class="btn btn-danger disabled" href="' . get_permalink($id) . '#comments"><i class="icon-comment"></i> -</a>';
	}
	else if($count == 0){
		echo '<a class="btn btn-warning" href="' . get_permalink($id) . '#comments"><i class="icon-comment"></i> 0</a>';
	}
	else if($count == 1){
		echo '<a class="btn btn-success" href="' . get_permalink($id) . '#comments"><i class="icon-comment"></i> ' . $count . '</a>';
	}
	else{
		echo '<a class="btn btn-success" href="' . get_permalink($id) . '#comments"><i class="icon-comment"></i> ' . $count . '</a>';
	}
	
	echo '</div>';
}

function ortus_categories(){
	echo '<div class="article-categories">';
	$categories_list = get_the_category();
	if(is_array($categories_list) && count($categories_list) > 0){ ?>
		<div class="btn-group">
			<a class="btn btn-info btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
				<? echo '<i class="icon-bookmark"></i> ' . count($categories_list); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<? foreach($categories_list  as $category){
					echo '<li><a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a></li>';
				} ?>
			</ul>
		</div>
	<? }
	echo '</div>';
}

function ortus_tags(){
	$categories_list = get_the_category();
	
	echo '<div class="article-tags ">';

	$tag_list = get_the_tags();
	if(is_array($tag_list)){ ?>
		<div class="btn-group">
			<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
				<? echo '<i class="icon-tag"></i> ' . count($tag_list); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<? foreach($tag_list  as $tag){
					echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
				} ?>
			</ul>
		</div>
	<? }
	echo '</div>';
}

function ortus_customcss(){
	$user_styles = '';		

	//If we want to use custom fonts but no webfonts
	if(!of_get_option('webfonts') && of_get_option('fonts')){
		$heading_typo = of_get_option('heading_typo');
		if ($heading_typo) {
			$user_styles .= '
			h1, h2, h3, h4, h5, h6{ 
				font-family: ' . $heading_typo['face'] . '; 
				font-style: ' . $heading_typo['style'] . '; 
				font-weight: ' . $heading_typo['style'] . '; 
				color: ' . $heading_typo['color'] . '; 
			}';
		}
						
		$body_typo = of_get_option('body_typo');
		if ($body_typo) {
			$user_styles .= '
			body, p{ 
				font-family: ' . $body_typo['face'] . '; 
				font-style: ' . $body_typo['style'] . '; 
				font-weight: ' . $body_typo['style'] . '; 
				color: ' . $body_typo['color'] . '; 
				font-size: ' . $body_typo['size'] . '; 
			}';
		}
					
		$title_typo = of_get_option('title_typo');
		if ($title_typo) {
			$user_styles .= '
			#ortus-pagetitle{ 
				font-family: ' . $title_typo['face'] . '; 
				font-style: ' . $title_typo['style'] . '; 
				font-weight: ' . $title_typo['style'] . '; 
				color: ' . $title_typo['color'] . '; 
				font-size: ' . $title_typo['size'] . '; 
			}';
		}

		$desc_typo = of_get_option('desc_typo');
		if ($desc_typo) {
			$user_styles .= '
			#ortus-pagedescription{ 
				font-family: ' . $desc_typo['face'] . '; 
				font-style: ' . $desc_typo['style'] . '; 
				font-weight: ' . $desc_typo['style'] . '; 
				color: ' . $desc_typo['color'] . '; 
				font-size: ' . $desc_typo['size'] . '; 
			}';
		}

		$navbar_typo = of_get_option('navbar_typo');
		if ($navbar_typo) {
			$user_styles .= '
			.navbar .nav > li > a{ 
				font-family: ' . $navbar_typo['face'] . '; 
				font-style: ' . $navbar_typo['style'] . '; 
				font-weight: ' . $navbar_typo['style'] . '; 
				color: ' . $navbar_typo['color'] . '; 
				font-size: ' . $navbar_typo['size'] . '; 
			}';
		}

		$slider_typo = of_get_option('slider_typo');
		if ($slider_typo) {
			$user_styles .= '
			.carousel-caption h4, .carousel-caption p{ 
				font-family: ' . $slider_typo['face'] . '; 
				font-style: ' . $slider_typo['style'] . '; 
				font-weight: ' . $slider_typo['style'] . '; 
				color: ' . $slider_typo['color'] . '; 
				font-size: ' . $slider_typo['size'] . '; 
			}';
		}

		$footer_typo = of_get_option('footer_typo');
		if ($footer_typo) {
			$user_styles .= '
			#footer p{ 
				font-family: ' . $footer_typo['face'] . '; 
				font-style: ' . $footer_typo['style'] . '; 
				font-weight: ' . $footer_typo['style'] . '; 
				color: ' . $footer_typo['color'] . '; 
				font-size: ' . $footer_typo['size'] . '; 
			}';
		}
	}
	//We use webfonts
	else{
		$user_styles .= '@import url(' . of_get_option('webfonts_import') . ');';
		$user_styles .= '
			h1, h2, h3, h4, h5, h6{ 
				' . of_get_option('webfonts_headings') . ' 
			}';
		$user_styles .= '
			body, p{ 
				' . of_get_option('webfonts_body') . ' 
			}';
		$user_styles .= '
			#ortus-pagedescription{ 
				' . of_get_option('webfonts_desc') . ' 
			}';
		$user_styles .= '
			.navbar .nav > li > a{ 
				' . of_get_option('webfonts_navbar') . ' 
			}';
		$user_styles .= '
			.carousel-caption h4, .carousel-caption p{ 
				' . of_get_option('webfonts_slider') . ' 
			}';					
		$user_styles .= '
			#footer p{ 
				' . of_get_option('webfonts_footer') . ' 
			}';
		$user_styles .= '
			#ortus-pagetitle{ 
				' . of_get_option('webfonts_title') . ' 
			}';
	}
			
	//The Page Background
	if(of_get_option('main_background')){
		$main_background = of_get_option('main_background');
		if ($main_background) {
			$style = "";
			if($main_background['image'] != "") {
				$style .= "url('" . $main_background['image'] . "') " . $main_background['repeat'] . " " . $main_background['position'] . " " . $main_background['scroll'];
			}
			if($main_background['color'] != "") {
				$style .= $main_background['color'];
			}
			$style .= ";";

			$user_styles .= "
			body{
				background:" . $style  . "
			}";
		}
	}

	//The Footer Background
	if(of_get_option('footer_background')){
		$footer_background = of_get_option('footer_background');
		if ($footer_background) {

			$style = "";
			if($footer_background['image'] != "") {
				$style .= "url('" . $footer_background['image'] . "') " . $footer_background['repeat'] . " " . $footer_background['position'] . " " . $footer_background['scroll'];
			}
			if($footer_background['color'] != "") {
				$style .= $footer_background['color'];
			}
			$style .= ";";

			$user_styles .= "
				#footer{
					background:" . $style  . "
				}";
		}
	}

	//The Wells Background
	if(of_get_option('well_background')){
		$well_background = of_get_option('well_background');
		if ($well_background) {

			$style = "";
			if($well_background['image'] != "") {
				$style .= "url('" . $well_background['image'] . "') " . $well_background['repeat'] . " " . $well_background['position'] . " " . $well_background['scroll'];
			}
			if($well_background['color'] != "") {
				$style .= $well_background['color'];
			}
			$style .= ";";

			$user_styles .= "
				.well{
					background:" . $style  . "
				}";
		}
	}

	//The Navbar Background
	if(of_get_option('navbar_bgc')){
		$style = 'background-color:' . of_get_option('navbar_bgc') . ';';
		
		if(of_get_option('navbar_gbgc1') && of_get_option('navbar_gbgc2')){
			$style .= 'background-image:-moz-linear-gradient(center top , ' . of_get_option('navbar_gbgc1') . ',' . of_get_option('navbar_gbgc2') . ');';
		}
		$user_styles .= "
			.navbar-inner{
				" . $style  . "
			}
			.navbar .nav .active > a, .navbar .nav .active > a:hover{
				background-color:" . of_get_option('navbar_bgc') . ';
			}';
	}

	//The Caption Background
	if(of_get_option('postslider_caption')){
		$rgb = ortus_hextorgb(of_get_option('postslider_caption'));

		$user_styles .= "
			.carousel-caption{
				background:none repeat scroll 0 0 rgba(" . $rgb['r'] . ", " . $rgb['g'] . ", " . $rgb['b'] . ", 0.75)
			}";
	}
	
	//The HeroUnit
	if(of_get_option('herounit')){
		$hero_background = of_get_option('hero_background');
		if ($hero_background) {

			$style = "";
			if($hero_background['image'] != "") {
				$style .= "url('" . $hero_background['image'] . "') " . $hero_background['repeat'] . " " . $hero_background['position'] . " " . $hero_background['scroll'];
			}
			if($hero_background['color'] != "") {
				$style .= $hero_background['color'];
			}
			$style .= ";";

			$user_styles .= "
				.hero-unit{
					background:" . $style  . "
				}";
		}
	}
	
	//Sidebar Text Alignment
	$sb_align = of_get_option('sb_alignment');
	if($sb_align == 2){
		$user_styles .= "
			.ortus-sb{
				text-align:right;
			}";
	}
	elseif($sb_align == 3){
		$user_styles .= "
			.ortus-sb{
				text-align:center;
			}";
	}

	//Custom Css
	if(of_get_option('custom_css') != "")
		$user_styles .= of_get_option('custom_css');
	
	if($user_styles){
		echo '<style>' . $user_styles . '</style>';
	}

	//Custom JS
	if(of_get_option('custom_js') != ""){
		echo '<script type="text/javascript">' . of_get_option('custom_js') . '</script>';
	}
}

####################################################################################
#
#		Some functions
#
####################################################################################

function ortus_hextorgb($hex) {
	$hex = ereg_replace("#", "", $hex);
	$color = array();
	 
	if(strlen($hex) == 3) {
		$color['r'] = hexdec(substr($hex, 0, 1) . $r);
		$color['g'] = hexdec(substr($hex, 1, 1) . $g);
		$color['b'] = hexdec(substr($hex, 2, 1) . $b);
	}
	else if(strlen($hex) == 6) {
		$color['r'] = hexdec(substr($hex, 0, 2));
		$color['g'] = hexdec(substr($hex, 2, 2));
		$color['b'] = hexdec(substr($hex, 4, 2));
	}
	 
	return $color;
} ?>