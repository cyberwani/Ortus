<?
/* 
 * Loads the Options Panel
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {

	/* Set the file path based on whether we're in a child theme or parent theme */

	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/');
	}

	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#blogtitle').click(function() {
		if (jQuery('#blogtitle:checked').val() !== undefined)
		{
			if(!jQuery("#section-logoimg").is(":visible"))
				jQuery('#section-logoimg').fadeToggle(400);
				
			if(!jQuery("#section-herounit").is(":visible"))
				jQuery('#section-herounit').fadeToggle(400);
		}
		else
		{
			if(jQuery("#section-logoimg").is(":visible"))
				jQuery('#section-logoimg').fadeToggle(400);
				
			if(jQuery("#section-herounit").is(":visible"))
				jQuery('#section-herounit').fadeToggle(400);
		}
	});

	if (jQuery('#blogtitle:checked').val() !== undefined) {
		jQuery('#section-logoimg').show();
		jQuery('#section-herounit').show();
	}

	jQuery('#navbar').click(function() {
  		jQuery('#section-navbar_fixed').fadeToggle(400);
		jQuery('#section-navbar_search').fadeToggle(400);
		jQuery('#section-navbar_back').fadeToggle(400);
		jQuery('#section-navbar_bgc').fadeToggle(400);
		jQuery('#section-navbar_gradient').fadeToggle(400);
		jQuery('#section-navbar_gbgc1').fadeToggle(400);
		jQuery('#section-navbar_gbgc2').fadeToggle(400);
	});
	
	if (jQuery('#navbar:checked').val() !== undefined) {
		jQuery('#section-navbar_fixed').show();
		jQuery('#section-navbar_search').show();
		jQuery('#section-navbar_back').show();
		jQuery('#section-navbar_bgc').show();
		jQuery('#section-navbar_gradient').show();
		jQuery('#section-navbar_gbgc1').show();
		jQuery('#section-navbar_gbgc2').show();
	}
	
	jQuery('#postslider').click(function() {
  		jQuery('#section-postslider_cat').fadeToggle(400);
		jQuery('#section-postslider_max').fadeToggle(400);
		jQuery('#section-postslider_home').fadeToggle(400);
		jQuery('#section-postslider_height').fadeToggle(400);
		jQuery('#section-postslider_caption').fadeToggle(400);
	});

	if (jQuery('#postslider:checked').val() !== undefined) {
		jQuery('#section-postslider_cat').show();
		jQuery('#section-postslider_max').show();
		jQuery('#section-postslider_home').show();
		jQuery('#section-postslider_height').show();
		jQuery('#section-postslider_caption').show();
	}

	jQuery('#webfonts').click(function() {
  		jQuery('#section-webfonts_import').fadeToggle(400);
		jQuery('#section-webfonts_headings').fadeToggle(400);
		jQuery('#section-webfonts_body').fadeToggle(400);
		jQuery('#section-webfonts_title').fadeToggle(400);
		jQuery('#section-webfonts_desc').fadeToggle(400);
		jQuery('#section-webfonts_navbar').fadeToggle(400);
		jQuery('#section-webfonts_slider').fadeToggle(400);
		jQuery('#section-webfonts_footer').fadeToggle(400);
		jQuery('#section-heading_typo').fadeToggle(400);
		jQuery('#section-body_typo').fadeToggle(400);
		jQuery('#section-title_typo').fadeToggle(400);
		jQuery('#section-desc_typo').fadeToggle(400);
		jQuery('#section-navbar_typo').fadeToggle(400);
		jQuery('#section-slider_typo').fadeToggle(400);
		jQuery('#section-footer_typo').fadeToggle(400);
	});
	
	if (jQuery('#webfonts:checked').val() !== undefined) {
		jQuery('#section-webfonts_import').show();
		jQuery('#section-webfonts_headings').show();
		jQuery('#section-webfonts_body').show();
		jQuery('#section-webfonts_title').show();
		jQuery('#section-webfonts_desc').show();
		jQuery('#section-webfonts_navbar').show();
		jQuery('#section-webfonts_slider').show();
		jQuery('#section-webfonts_footer').show();
		jQuery('#section-heading_typo').hide();
		jQuery('#section-body_typo').hide();
		jQuery('#section-title_typo').hide();
		jQuery('#section-desc_typo').hide();
		jQuery('#section-slider_typo').hide();
		jQuery('#section-navbar_typo').hide();
		jQuery('#section-footer_typo').hide();
	}
	
});
</script>
<?php
}