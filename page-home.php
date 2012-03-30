<?php
/*
Template Name: Homepage (3Sidebars)
*/
?>

<? get_header(); 

if(of_get_option('layout') == '1c-l' || of_get_option('layout') == '1c-r') $span = 'span10 offset1'; else $span = 'span12'; ?>

<div class="row">
	<div class="<? echo $span ?>">
		<? get_template_part('loop', 'home'); ?>
	</div>
</div>

<? if($span == 'span12'){
		$childspan1 = 'span4';
		$childspan2 = 'span4';
		$childspan3 = 'span4';
	} else {

		$childspan1 = 'span3 offset1';
		$childspan2 = 'span4';
		$childspan3 = 'span3';

	} ?>

<div class="row">
	<div class="<? echo $childspan1 ?>">
		<? get_sidebar(); ?>
	</div>
	<div class="<? echo $childspan2 ?>">
		<? get_sidebar('second'); ?>
	</div>
	<div class="<? echo $childspan3 ?>">
		<? get_sidebar('third'); ?>
	</div>
</div>

<? get_footer(); ?>