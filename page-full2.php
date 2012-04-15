<?php
/*
Template Name: Full Width (No Title, Tags, Cats, Comments)
*/
?>

<? get_header(); ?>

<div class="row">
	<div class="span10 offset1">
		<? get_template_part('loop', 'full2'); ?>
	</div>
</div>

<? get_footer(); ?>