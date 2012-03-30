<? $well = of_get_option('wells'); ?>

<div class="span3 offset1 <? if($well["8"]) echo 'well'; ?>">
	<?php if ( ! dynamic_sidebar( 'First WidgetArea' ) ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title nav-header"><?php __( 'Archive', 'ortus' ); ?></h3>
			<ul class="nav nav-list">
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>
</div>

<div class="span3 <? if($well["9"]) echo 'well'; ?>">
	<?php if ( ! dynamic_sidebar( 'Second WidgetArea' ) ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title nav-header"><?php __( 'Archive', 'ortus' ); ?></h3>
			<ul class="nav nav-list">
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->

<div class="span3 <? if($well["10"]) echo 'well'; ?>">
	<?php if ( ! dynamic_sidebar( 'Third WidgetArea' ) ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title nav-header"><?php __( 'Archive', 'ortus' ); ?></h3>
			<ul class="nav nav-list">
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

	<?php endif; ?>
</div>