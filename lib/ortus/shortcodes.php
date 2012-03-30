<?

function buttons($atts, $content = null){
	extract( shortcode_atts( array(
	'type' => 'default',
	'size' => 'default', 
	'url'  => '',
	), $atts ) );

	if($type == 'default')
		$type = '';
	else
		$type = 'btn-' . $type;

	if($size == 'default')
		$size = '';
	else
		$size = 'btn-' . $size;

	return '<a href="' . $url . '" class="btn '. $type . ' ' . $size . '">' . $content . '</a>';
}
add_shortcode('button', 'buttons');


function labels($atts, $content = null){
	extract( shortcode_atts( array(
	'type' => 'default', //success, warning, important, info, inverse
	), $atts ) );

	if($type == 'default')
		$type = '';
	else
		$type = 'label-' . $type;

	return '<span class="label '. $type . '">' . $content . '</span>';
}
add_shortcode('label', 'labels');


function badges($atts, $content = null){
	extract( shortcode_atts( array(
	'type' => 'default', //success, warning, error, info, inverse
	), $atts ) );

	if($type == 'default')
		$type = '';
	else
		$type = 'badge-' . $type;

	return '<span class="badge '. $type . '">' . $content . '</span>';
}
add_shortcode('badge', 'badges');


function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'default',
	'heading' => '',
	), $atts ) );

	if($type == 'default')
		$type = 'alert-info';
	else
		$type = 'alert-' . $type;
	
	$return = '<div class="alert alert-block '. $type . '">';

	if($heading != '')
		$return .= '<h4 class="alert-heading">' . $heading . '</h4>';

	$return .= $content . '</div>';

	return $return;
}
add_shortcode('alert', 'alerts');


add_action('init', 'add_button');

function add_button() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin');
     add_filter('mce_buttons', 'register_button');
   }
}

function register_button($buttons) {
   array_push($buttons, "buttons");
   array_push($buttons, "labels");
   array_push($buttons, "badges");
   array_push($buttons, "alerts");
   return $buttons;
}

function add_plugin($plugin_array) {
   $plugin_array['buttons'] = get_bloginfo('template_url').'/lib/ortus/js/shortcodes.js';
   $plugin_array['labels'] = get_bloginfo('template_url').'/lib/ortus/js/shortcodes.js';
   $plugin_array['badges'] = get_bloginfo('template_url').'/lib/ortus/js/shortcodes.js';
   $plugin_array['alerts'] = get_bloginfo('template_url').'/lib/ortus/js/shortcodes.js';
   return $plugin_array;
}

?>