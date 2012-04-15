<!DOCTYPE html>
<html lang="en">
 	<head>
		<meta charset="<? bloginfo( 'charset' ); ?>">
    	<title><? echo wp_title( '|', true, 'right' ) . bloginfo( 'name' ); ?></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Add Bootstrap and Ortus Css !-->
	    <!-- Required here for correct responsive behaviour! !-->
	    <style> 
	    	body{
	    		padding-top: 60px;
	    	}
	    </style>
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
			ortus_customcss();
		?>
	</head>
	<body>

		<?

		//$head_span
		if(of_get_option('layout') == '1c-l' || of_get_option('layout') == '1c-r' || of_get_option('layout') == '1c'){ $head_span = 'span10 offset1'; $span_count = 10; } 
		else { $head_span = 'span12'; $span_count = 12; } ?>

		<div id="main">
			<div class="container">	

				<? if(of_get_option('navbar') && (of_get_option('navbar_fixed') == 2 || of_get_option('navbar_fixed') == 3)) ortus_navbar(); ?>

				<div class="row">	
					<div id="header" class="<? echo $head_span; ?>">
						
						<? ortus_social(); ?>	
						
						<? if(of_get_option('blogtitle')) { ?>																	<!-- If the blogtitle is enabled -->
							<div <? if(of_get_option('herounit')) echo 'class="hero-unit"'; ?>>				<!-- If the herounit is enabled -->			
								<? if(of_get_option('logoimg')){ ?> 															<!-- If the logo is enabled -->	
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

				<? if(of_get_option('navbar') && of_get_option('navbar_fixed') == 1) ortus_navbar($head_span); ?>
				
				<?
					if(of_get_option('postslider')){
						if(is_front_page() || !of_get_option('postslider_home'))
							ortus_slider($head_span, $span_count);
					} ?>

