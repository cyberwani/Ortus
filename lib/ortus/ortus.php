<?  /***************************

	Some template functions for the theme

	****************************/

function ortus_navbar(){ ?>
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
<? } ?>