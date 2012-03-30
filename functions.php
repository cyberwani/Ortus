<?
include('lib/ortus/options.php');
include('lib/ortus/ortus.php');
include('lib/ortus/pagination.php');
include('lib/ortus/shortcodes.php');

add_theme_support( 'post-thumbnails' );

/* Load Languages */

add_action('after_setup_theme', 'ortus_languages');
function ortus_languages(){
    load_theme_textdomain('ortus', get_template_directory() . '/lang');
}

/** Register the Sidebars **/

if ( function_exists('register_sidebar') ){
    register_sidebar(array(
		'name' => 'Main Sidebar',
        'before_widget' => '<ul id="%1$s" class="widget %2$s nav nav-list">',
        'after_widget' => '</ul>',
        'before_title' => '<li class="nav-header">',
        'after_title' => '</li>',
    ));
	
	register_sidebar(array(
		'name' => 'Secondary Sidebar',
	    'before_widget' => '<ul id="%1$s" class="widget %2$s nav nav-list">',
	    'after_widget' => '</ul>',
	    'before_title' => '<li class="nav-header">',
		'after_title' => '</li>',
	));

	register_sidebar(array(
		'name' => 'Third Sidebar',
	    'before_widget' => '<ul id="%1$s" class="widget %2$s nav nav-list">',
	    'after_widget' => '</ul>',
	    'before_title' => '<li class="nav-header">',
		'after_title' => '</li>',
	));
	
	if(of_get_option('footerwidgets')){
		register_sidebar(array(
			'name' => 'First Widgetarea',
	        'before_widget' => '<ul id="%1$s" class="widget %2$s nav nav-list">',
	        'after_widget' => '</ul>',
	        'before_title' => '<li class="nav-header">',
	        'after_title' => '</li>',
	    ));
		
		register_sidebar(array(
			'name' => 'Second Widgetarea',
	        'before_widget' => '<ul id="%1$s" class="widget %2$s nav nav-list">',
	        'after_widget' => '</ul>',
	        'before_title' => '<li class="nav-header">',
	        'after_title' => '</li>',
	    ));
		
		register_sidebar(array(
			'name' => 'Third Widgetarea',
	        'before_widget' => '<ul id="%1$s" class="widget %2$s nav nav-list">',
	        'after_widget' => '</ul>',
	        'before_title' => '<li class="nav-header">',
	        'after_title' => '</li>',
	    ));
	}
}

/* Register the mainmenu */

function ortus_main_nav(){
	wp_nav_menu( 
    	array( 
    		'menu' => 'main_menu',
    		'menu_class' => 'nav',
    		'theme_location' => 'main_menu',
    		'container' => 'false',
    		'depth' => '2',
			'walker' => new description_walker()
    	)
    );
}

function ortus_main_menu() {
	register_nav_menu('main_menu', __('Mainmenu', 'ortus'));
}
add_action('init', 'ortus_main_menu');

/* Admin Logo */

if(of_get_option('loginlogo')){
	add_action("login_head", "ortus_login_head");
}

function ortus_login_head() {
	echo "
	<style>
	body.login #login{
		text-align:center;
	}
	body.login #login h1 a {
		background: url('" . of_get_option('loginimg') . "') no-repeat scroll center top transparent;
		width: 320px;
		height: 130px;
	}
	</style>
	";
}

/* Comment Template */

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

/* Some Functions */

function ortus_get_social(){
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

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
			
			// If the item has children, add the dropdown class for bootstrap
			if ( $args->has_children ) {
				$class_names = "dropdown ";
			}
			
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
           
           	$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           	// if the item has children add these two attributes to the anchor tag
           	if ( $args->has_children ) {
				$attributes .= 'class="dropdown-toggle" data-toggle="dropdown"';
			}

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            // if the item has children add the caret just before closing the anchor tag
            if ( $args->has_children ) {
            	$item_output .= '<b class="caret"></b></a>';
            }
            else{
            	$item_output .= '</a>';
            }
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
            
        function start_lvl(&$output, $depth) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        }
            
      	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
      	    {
      	        $id_field = $this->db_fields['id'];
      	        if ( is_object( $args[0] ) ) {
      	            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
      	        }
      	        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
      	    }        
}