<? get_header();

if(of_get_option('layout') == '1c-l'){ ?>
	<div class="row">
		<div class="span3 offset1">
			<? get_sidebar(); ?>
		</div>
		<div class="span7">
			<? if(is_archive())
				get_template_part('loop', 'archive');
			else
				get_template_part('loop', 'index'); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '1c-r'){ ?>
	<div class="row">
		<div class="span7 offset1">
			<? if(is_archive())
				get_template_part('loop', 'archive');
			else
				get_template_part('loop', 'index'); ?>
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
			<? if(is_archive())
				get_template_part('loop', 'archive');
			else
				get_template_part('loop', 'index'); ?>
		</div>
		<div class="span3">
			<? get_sidebar('second'); ?>
		</div>
	</div>
<? } elseif(of_get_option('layout') == '2c-r'){ ?>
	<div class="row">		
		<div class="span6">
			<? if(is_archive())
				get_template_part('loop', 'archive');
			else
				get_template_part('loop', 'index'); ?>
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
			<? if(is_archive())
				get_template_part('loop', 'archive');
			else
				get_template_part('loop', 'index'); ?>
		</div>
	</div>
<? } 

get_footer(); ?>