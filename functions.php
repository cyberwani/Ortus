<?
include('admin/options.php');
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

if(of_get_option('loginimg')){
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