		</div> <!-- /container -->	
	</div> <!-- /main -->
	<div id="footer">
		<div class="container">
			<? if(of_get_option('footerwidgets')){ ?>
			<div class="row" id="footer-widgets">
				<? get_sidebar('footer'); ?>
			</div>
			<? } ?>
			<div class="row">
				<div class="span12">
					<div id="footer-info">
						<p><? echo of_get_option('footer_text'); ?></p>
					</div>
					<? wp_footer(); ?>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php bloginfo( 'template_url' ); ?>/lib/bootstrap/js/jquery.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/lib/ortus/js/scripts.js"></script>
	
  </body>
</html>