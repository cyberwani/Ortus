<!DOCTYPE html>
<html lang="en">
 	<head>
		<meta charset="<? bloginfo( 'charset' ); ?>">
    	<title><? echo wp_title( '|', true, 'right' ) . bloginfo( 'name' ); ?></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Add Bootstrap and Ortus Css !-->
		<link href="<? bloginfo( 'template_url' ); ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<? bloginfo( 'template_url' ); ?>/lib/ortus/css/style.css" rel="stylesheet">

	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->

	    <!-- The fav and touch icons -->
	    <link rel="shortcut icon" href="<? bloginfo( 'template_url' ); ?>/lib/ortus/ico/favicon.ico">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<? bloginfo( 'template_url' ); ?>/lib/ortus/ico/apple-touch-icon-114-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<? bloginfo( 'template_url' ); ?>/lib/ortus/ico/apple-touch-icon-72-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" href="<? bloginfo( 'template_url' ); ?>/lib/ortus/ico/apple-touch-icon-57-precomposed.png">
		
		<!-- Now add the custom css from the admin panel -->
		<?   
			wp_head(); 
		
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
						#main{
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
						body{
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
		?>
	</head>
	<body>

		<?

		//$head_span
		if(of_get_option('layout') == '1c-l' || of_get_option('layout') == '1c-r') $head_span = 'span10 offset1'; else $head_span = 'span12'; ?>

		<div id="main">
			<div class="container">	
				<div class="row">	
					<div id="header" class="<? echo $head_span; ?>">
						
						<? ortus_get_social(); ?>	
						
						<? if(of_get_option('blogtitle')) { ?>																	<!-- If the blogtitle is enabled -->
							<div <? if(of_get_option('herounit')) echo 'class="hero-unit"'; ?>>									<!-- If the herounit is enabled -->			
								<? if(of_get_option('logo')){ ?> 																<!-- If the logo is enabled -->	
									<? if(of_get_option('blogdesc')) { ?>														<!-- If the description is enabled -->	
										<div id="ortus-pagedescription">					
											<? bloginfo( 'description' ); ?>
										</div>
									<? } ?>
									<a href="/" id="logo"><img src="<? echo of_get_option('logoimg'); ?>" alt="Logo"/></a>
								<? } else { ?>
									<? if(of_get_option('blogdesc')) { ?>
										<div id="ortus-pagedescription">
											<? bloginfo( 'description' ); ?>
										</div>
									<? } ?>
									<a href="/" id="title"><h1 id="ortus-pagetitle"><? bloginfo( 'name' ); ?></h1></a>
								<? } ?>
							</div>
						<? } else { ?>						
							<? if(of_get_option('blogdesc')) { ?>
								<div id="ortus-pagedescription">
									<? bloginfo( 'description' ); ?>
								</div>
							<? }
						} ?>
					</div>	
				</div>

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
										<input name="s" id="s" type="text" class="search-query" placeholder="<? __('Search','ortus'); ?>">
									</form>
								<? } ?>

								</div>
								
							</div>
						</div>
					</div>
					<? } ?>
				</div>
			