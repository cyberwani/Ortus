<? $well = of_get_option('wells'); ?>

<div id="ortus-third-sb" class="ortus-sb nav nav-list <? if($well["7"]) echo 'well'; ?>" role="complementary">

	<?php if ( ! dynamic_sidebar( 'Third Sidebar' ) ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title nav-header"><?php __( 'Archive', 'ortus' ); ?></h3>
			<ul class="nav nav-list">
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

	<?php endif; ?>
</div>