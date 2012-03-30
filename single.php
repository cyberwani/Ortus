<? get_header();

if(of_get_option('layout') == '1c-l'){ ?>
	<div class="row">
		<div class="span3 offset1">
			<? get_sidebar(); ?>
		</div>
		<div class="span7">
			<? get_template_part('loop', 'single'); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '1c-r'){ ?>
	<div class="row">
		<div class="span7 offset1">
			<? get_template_part('loop', 'single'); ?>
		</div>
		<div class="span3">
			<? get_sidebar(); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '2c-l-r'){ ?>
	<div class="row">
		<div class="span3">
			<? get_sidebar(); ?>
		</div>
		<div class="span6">
			<? get_template_part('loop', 'single'); ?>
		</div>
		<div class="span3">
			<? get_sidebar('second'); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '2c-r'){ ?>
	<div class="row">		
		<div class="span6">
			<? get_template_part('loop', 'single'); ?>
		</div>
		<div class="span3">
			<? get_sidebar(); ?>
		</div>
		<div class="span3">
			<? get_sidebar('second'); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '2c-l'){ ?>
	<div class="row">		
		<div class="span3">
			<? get_sidebar(); ?>
		</div>
		<div class="span3">
			<? get_sidebar('second'); ?>
		</div>
		<div class="span6">
			<? get_template_part('loop', 'single'); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '3c'){ ?>
	<div class="row">		
		<div class="span4">
			<? get_sidebar(); ?>
		</div>
		<div class="span4">
			<? get_sidebar('second'); ?>
		</div>
		<div class="span4">
			<? get_sidebar('third'); ?>
		</div>
	</div>
<? }

get_footer(); ?>