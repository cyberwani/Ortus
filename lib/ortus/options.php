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
			if(!jQuery("#section-logo").is(":visible"))
				jQuery('#section-logo').fadeToggle(400);
			if(!jQuery("#section-logoimg").is(":visible") && jQuery('#logo:checked').val() !== undefined)
				jQuery('#section-logoimg').fadeToggle(400);
				
			if(!jQuery("#section-herounit").is(":visible"))
				jQuery('#section-herounit').fadeToggle(400);
		}
		else
		{
			if(jQuery("#section-logo").is(":visible"))
				jQuery('#section-logo').fadeToggle(400);
			if(jQuery("#section-logoimg").is(":visible"))
				jQuery('#section-logoimg').fadeToggle(400);
				
			if(jQuery("#section-herounit").is(":visible"))
				jQuery('#section-herounit').fadeToggle(400);
		}
	});

	if (jQuery('#blogtitle:checked').val() !== undefined) {
		jQuery('#section-logo').show();
		jQuery('#section-herounit').show();
		
		if (jQuery('#logo:checked').val() !== undefined && jQuery("#section-logo").is(":visible")) {
			jQuery('#section-logoimg').show();
		}
	}
	
	jQuery('#loginlogo').click(function() {
  		jQuery('#section-loginimg').fadeToggle(400);
	});
	
	if (jQuery('#loginlogo:checked').val() !== undefined) {
		jQuery('#section-loginimg').show();
	}
	
	jQuery('#logo').click(function() {
  		jQuery('#section-logoimg').fadeToggle(400);
	});
	
	if (jQuery('#logo:checked').val() !== undefined && jQuery('#blogtitle:checked').val() !== undefined) {
		jQuery('#section-logoimg').show();
	}

	jQuery('#navbar').click(function() {
  		jQuery('#section-navbar_fixed').fadeToggle(400);
		jQuery('#section-navbar_search').fadeToggle(400);
	});
	
	if (jQuery('#navbar:checked').val() !== undefined) {
		jQuery('#section-navbar_fixed').show();
		jQuery('#section-navbar_search').show();
	}
	
	jQuery('#webfonts').click(function() {
  		jQuery('#section-webfonts_import').fadeToggle(400);
		jQuery('#section-webfonts_headings').fadeToggle(400);
		jQuery('#section-webfonts_body').fadeToggle(400);
		jQuery('#section-webfonts_title').fadeToggle(400);
		jQuery('#section-webfonts_desc').fadeToggle(400);
		jQuery('#section-webfonts_footer').fadeToggle(400);
		jQuery('#section-heading_typo').fadeToggle(400);
		jQuery('#section-body_typo').fadeToggle(400);
		jQuery('#section-title_typo').fadeToggle(400);
		jQuery('#section-desc_typo').fadeToggle(400);
		jQuery('#section-footer_typo').fadeToggle(400);
	});
	
	if (jQuery('#webfonts:checked').val() !== undefined) {
		jQuery('#section-webfonts_import').show();
		jQuery('#section-webfonts_headings').show();
		jQuery('#section-webfonts_body').show();
		jQuery('#section-webfonts_title').show();
		jQuery('#section-webfonts_desc').show();
		jQuery('#section-webfonts_footer').show();
		jQuery('#section-heading_typo').hide();
		jQuery('#section-body_typo').hide();
		jQuery('#section-title_typo').hide();
		jQuery('#section-desc_typo').hide();
		jQuery('#section-footer_typo').hide();
	}
	
});
</script>
<?php
}