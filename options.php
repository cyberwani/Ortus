<?php

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}


function optionsframework_options() {

	$wells_array = array(	"1" => __("Mainarea", "ortus"), 
							"2" => __("Posts", "ortus"), 
							"3" => __("Commentarea", "ortus"),
							"4" => __("Comments", "ortus"), 
							"5" => __("First Sidebar", "ortus"),
							"6" => __("Second Sidebar", "ortus"),
							"7" => __("Third Sidebar", "ortus"),
							"8" => __("First Footerwidgets", "ortus"),
							"9" => __("Second Footerwidgets", "ortus"),
							"10" => __("Third Footerwidgets", "ortus"));

	$wells_defaults = array("2"=>"1", "3" => "1","8" => "1","9" => "1","10" => "1");
	
	$nav_array = array(	"1" => __("No", "ortus"), 
						"2" => __("Top", "ortus"), 
						"3" => __("Bottom", "ortus"));

	$align_array = array(	"1" => __("Left", "ortus"), 
						"2" => __("Right", "ortus"), 
						"3" => __("Center", "ortus"));
						
	$layouts =  get_bloginfo('template_directory') . '/admin/images/layouts/';
						
	$categories = array();  
	$categories_obj = get_categories(array('hide_empty' => 0));
	foreach ($categories_obj as $category) {
    	$categories[$category->cat_ID] = $category->cat_name;
	}

	$options = array();
	
	$options[] = array( "name" => __("Basic Settings", "ortus"),
						"type" => "heading");
	
	$options[] = array( "name" => __("Blog Title", "ortus"),
						"desc" => __("Do you want to show the blog title? (Default:yes)", "ortus"),
						"id" => "blogtitle",
						"std" => "1",
						"type" => "checkbox");
	
	$options[] = array("name" => __("Logo", "ortus"),
						"desc" => __("Please upload your logo.", "ortus"),
						"id" => "logoimg",
						"class" => "hidden",
						"type" => "upload");
						
	$options[] = array( "name" => __("HeroUnit", "ortus"),
						"desc" => __("Use HeroUnit? (default:no)", "ortus"),
						"id" => "herounit",
						"std" => "0",
						"class" => "hidden",
						"type" => "checkbox");
	
	$options[] = array( "name" => __("Blog Description", "ortus"),
						"desc" => __("Do you want to show the blog description? (Default:yes)", "ortus"),
						"id" => "blogdesc",
						"std" => "1",
						"type" => "checkbox");
	
	$options[] = array("name" => __("Login Logo", "ortus"),
						"desc" => __("Please upload your login logo.", "ortus"),
						"id" => "loginimg",
						"type" => "upload");

	$options[] = array( "name" => __("Footer", "ortus"),
						"desc" => __("Change your footer informations here.", "ortus"),
						"id" => "footer_text",
						"std" => "Ortus | <a href='/impressum' title='Impressum'>Impressum</a>",
						"type" => "textarea");
		
	$options[] = array( "name" => __("Layout", "ortus"),
						"type" => "heading");
						
	$options[] = array( "name" => __("Layout", "ortus"),
						"desc" => __("Select a layout for your Page", "ortus"),
						"id" => "layout",
						"std" => "1c-r",
						"type" => "images",
						"options" => array(
							'1c-l' => $layouts . '1.png',
							'2c-l-r' => $layouts . '2.png',
							'1c-r' => $layouts . '3.png',
							'2c-r' => $layouts . '4.png',
							'2c-l' => $layouts . '5.png',
							'1c' => $layouts . '7.png')
						);

	$options[] = array( "name" => __("Sidebar Text Alignment", "ortus"),
						"desc" => __("Default:left", "ortus"),
						"id" => "sb_alignment",
						"std" => "1",
						"type" => "radio",
						"options" => $align_array);

	$options[] = array( "name" => __("Footer Widgets", "ortus"),
						"desc" => __("Do you want to use footer widgets? (Default:no)", "ortus"),
						"id" => "footerwidgets",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Wells", "ortus"),
						"desc" => __("Choose where you want to display Wells", "ortus"),
						"id" => "wells",
						"type" => "multicheck",
						"std" => $wells_defaults,
						"options" => $wells_array);
	
	$options[] = array( "name" => __("Backgrounds", "ortus"),
						"type" => "heading");
	
	$options[] = array( "name" =>  __("Main Background", "ortus"),
						"desc" => __("If nothing selected, the default image will be used.", "ortus"),
						"id" => "main_background",
						"type" => "background");
	
	$options[] = array( "name" =>  __("Well Background", "ortus"),
						"desc" => __("If nothing selected, the default image will be used.", "ortus"),
						"id" => "well_background",
						"type" => "background");
	
	$options[] = array( "name" =>  __("HeroUnit Background", "ortus"),
						"desc" => __("If nothing selected, the default image will be used.", "ortus"),
						"id" => "hero_background",
						"type" => "background");
						
	$options[] = array( "name" =>  __("Footer Background", "ortus"),
						"desc" => __("If nothing selected, the default image will be used.", "ortus"),
						"id" => "footer_background",
						"type" => "background");
	
	$options[] = array( "name" => __("Typography", "ortus"),
						"type" => "heading");
	
	$options[] = array( "name" => __("Custom Fonts", "ortus"),
						"desc" => __("Do you want to use custom fonts?", "ortus"),
						"id" => "fonts",
						"type" => "checkbox");
	
	$options[] = array( "name" => __("Webfonts", "ortus"),
						"desc" => __("Do you want to use google webfonts?", "ortus"),
						"id" => "webfonts",
						"type" => "checkbox");
	
	$options[] = array( "name" => __("Import", "ortus"),
						"desc" => __("Add your webfont import link here.", "ortus"),
						"id" => "webfonts_import",
						"std" => "http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,700,400italic",
						"class" => "hidden",
						"type" => "text");
	
	$options[] = array( "name" => __("Headings", "ortus"),
						"desc" => __("Add the headings css here.", "ortus"),
						"id" => "webfonts_headings",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");
						
	$options[] = array( "name" => __("Body", "ortus"),
						"desc" => __("Add the body css here.", "ortus"),
						"id" => "webfonts_body",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");
	
	$options[] = array( "name" => __("Pagetitle", "ortus"),
						"desc" => __("Add the title css here.", "ortus"),
						"id" => "webfonts_title",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");

	$options[] = array( "name" => __("Description", "ortus"),
						"desc" => __("Add the description css here.", "ortus"),
						"id" => "webfonts_desc",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");

	$options[] = array( "name" => __("Navbar", "ortus"),
						"desc" => __("Add the navbar css here.", "ortus"),
						"id" => "webfonts_navbar",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");

	$options[] = array( "name" => __("Post Slider", "ortus"),
						"desc" => __("Add the post slider css here.", "ortus"),
						"id" => "webfonts_slider",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");

	$options[] = array( "name" => __("Footer", "ortus"),
						"desc" => __("Add the footer css here.", "ortus"),
						"id" => "webfonts_footer",
						"std" => "font-family: 'Droid Sans', sans-serif;",
						"class" => "hidden",
						"type" => "textarea");
	
	$options[] = array( "name" => __("Headings", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "heading_typo",
						"type" => "typography");
	
	$options[] = array( "name" => __("Body", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "body_typo",
						"type" => "typography");
	
	$options[] = array( "name" => __("Pagetitle", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "title_typo",
						"type" => "typography");

	$options[] = array( "name" => __("Description", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "desc_typo",
						"type" => "typography");

	$options[] = array( "name" => __("Navbar", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "navbar_typo",
						"type" => "typography");

	$options[] = array( "name" => __("Post Slider", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "slider_typo",
						"type" => "typography");

	$options[] = array( "name" => __("Footer", "ortus"),
						"desc" => __("Default will be used, if nothing selected", "ortus"),
						"id" => "footer_typo",
						"type" => "typography");
						
	$options[] = array ("name" => __("Navbar", "ortus"),
						"type" => "heading");
						
	$options[] = array( "name" => __("Navbar", "ortus"),
						"desc" => __("Do you want to use the navbar? (Default: yes)", "ortus"),
						"id" => "navbar",
						"std" => "1",
						"type" => "checkbox");
	
	$options[] = array( "name" => __("Navbar Fixed", "ortus"),
						"desc" => __("Default not fixed.", "ortus"),
						"id" => "navbar_fixed",
						"std" => "1",
						"type" => "radio",
						"class" => "hidden",
						"options" => $nav_array);

	$options[] = array( "name" => __("Background Color", "ortus"),
						"desc" => __("Background Color for the Navbar (If you use a gradient this is the fallback color)", "ortus"),
						"id" => "navbar_bgc",
						"type" => "color",
						"class" => "hidden");

	$options[] = array( "name" => __("First Gradient Color", "ortus"),
						"desc" => __("The First Gradient Color (Top)", "ortus"),
						"id" => "navbar_gbgc1",
						"type" => "color",
						"class" => "hidden");

	$options[] = array( "name" => __("Second Gradient Color", "ortus"),
						"desc" => __("The Second Gradient Color (Bottom)", "ortus"),
						"id" => "navbar_gbgc2",
						"type" => "color",
						"class" => "hidden");
		
	$options[] = array( "name" => __("Searchfield", "ortus"),
						"desc" => __("Do you want to show the searchfield? (Default: yes)", "ortus"),
						"id" => "navbar_search",
						"class" => "hidden",
						"std" => "1",
						"type" => "checkbox");
		
	$options[] = array ("name" => __("Post Slider", "ortus"),
						"type" => "heading");

	$options[] = array( "name" => __("Post Slider", "ortus"),
						"desc" => __("Do you want to use a post slider? (Default:no)", "ortus"),
						"id" => "postslider",
						"std" => "0",
						"type" => "checkbox");
	
	$options[] = array( "name" => __("Post Category", "ortus"),
						"desc" => __("Which Category should be displayed in the slider?", "ortus"),
						"id" => "postslider_cat",
						"class" => "hidden",
						"type" => "select",
						"options" => $categories);

	$options[] = array( "name" => __("Max Posts", "ortus"),
						"desc" => __("Maximal posts to display in the slider", "ortus"),
						"id" => "postslider_max",
						"std" => "5",
						"class" => "hidden",
						"type" => "text");

	$options[] = array( "name" => __("Height", "ortus"),
						"desc" => __("Height of the slider", "ortus"),
						"id" => "postslider_height",
						"std" => "350",
						"class" => "hidden",
						"type" => "text");

	$options[] = array( "name" => __("Caption Background Color", "ortus"),
						"desc" => __("The Background color of the caption", "ortus"),
						"id" => "postslider_caption",
						"type" => "color",
						"class" => "hidden");

	$options[] = array( "name" => __("Only on home?", "ortus"),
						"desc" => __("Do you want to show the slider only at the homepage? (Default:yes)", "ortus"),
						"id" => "postslider_home",
						"std" => "1",
						"class" => "hidden",
						"type" => "checkbox");

	$options[] = array ("name" => __("Social", "ortus"),
						"type" => "heading");

	$options[] = array( "name" => "Google+",
						"desc" => __("Link to your Google+ Page.", "ortus"),
						"id" => "social_google",
						"type" => "text");
					
	$options[] = array( "name" => "Facebook",
						"desc" => __("Link to your Facebook Page.", "ortus"),
						"id" => "social_fb",
						"type" => "text");
						
	$options[] = array( "name" => "Twitter",
						"desc" => __("Link to your Twitter Page.", "ortus"),
						"id" => "social_tw",
						"type" => "text");
						
	$options[] = array( "name" => "LinkedIn",
						"desc" => __("Link to your LinkedIn Page.", "ortus"),
						"id" => "social_linkedin",
						"type" => "text");
						
	$options[] = array( "name" => "RSS",
						"desc" => __("Link to your RSS Feed.", "ortus"),
						"id" => "social_feed",
						"type" => "text");
						
	$options[] = array ("name" => __("Custom", "ortus"),
						"type" => "heading");
						
	$options[] = array( "id" => "custom_css",
						"name" => __("Custom CSS", "ortus"),
						"type" => "textarea");
						
	$options[] = array( "id" => "custom_js",
						"name" => __("Custom Javascript", "ortus"),
						"type" => "textarea");
	
	return $options;
}