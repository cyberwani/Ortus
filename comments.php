<? 

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

$well = of_get_option('wells'); ?>

<?php if ( have_comments() || comments_open()) : ?>

	<div id="comments" <? if($well["3"]) echo 'class="well"'; ?>>
		<?php if ( post_password_required() ) : ?>
			<p class="nopassword"><?php __( 'This post is password protected. Enter the password to view any comments.', 'ortus' ); ?></p>
		</div>
		<?php
				return;
			endif;
		?>

		<?php if ( have_comments() ) : ?>
			<div class="page-header">
				<h1><? echo __("Comments", "ortus"); ?>
				<small><? echo __("Just leave a comment", "ortus"); ?></small></h1>
			</div>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-above">
				<h1 class="assistive-text"><?php __( 'Comment navigation', 'ortus' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'ortus' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'ortus' ) ); ?></div>
			</nav>
			<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					wp_list_comments('type=comment&callback=ortus_comments');
				?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below">
				<h1 class="assistive-text"><?php __( 'Comment navigation', 'ortus' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'ortus' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'ortus' ) ); ?></div>
			</nav>
			<?php endif; // check for comment navigation ?>

		<?php endif; ?>

		<?php if ( comments_open() ) : ?>
			<div id="respond" class="respond-form">

				<div class="page-header">
					<h3 id="comment-form-title"><?php comment_form_title( __("Leave a Reply","ortus"), __("Leave a Reply to","ortus") . ' %s' ); ?>
					<small>
						<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
					  	<div class="help">
					  		<p><?php _e("You must be","ortus"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in","ortus"); ?></a> <?php _e("to post a comment","ortus"); ?>.</p>
					  	</div>
						<?php elseif(is_user_logged_in()) : ?>

						<?php _e("Logged in as","ortus"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account","ortus"); ?>"><?php _e("Log out","ortus"); ?> &raquo;</a>
						
						<?php endif; ?>
					</small>
					</h3>
				</div>		

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-horizontal" id="commentform">

				<?php if ( !is_user_logged_in() ) : ?>
				
				<fieldset>

					<div class="control-group">
					  <label for="author"><?php _e("Name","ortus"); ?> <?php if ($req) echo __("(required)", "ortus"); ?></label>
					  <div class="input-prepend">
					  	<span class="add-on"><i class="icon-user"></i></span><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php __("Your Name","ortus"); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					  </div>
					</div>
						
					<div class="control-group">
					  <label for="email"><?php _e("Mail","ortus"); ?> <?php if ($req) echo __("(required)", "ortus"); ?></label>
					  <div class="input-prepend">
					  	<span class="add-on"><i class="icon-envelope"></i></span><input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php __("Your Email","ortus"); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					  	<span class="help-inline">(<?php _e("will not be published","ortus"); ?>)</span>
					  </div>
					</div>
					
					<div class="control-group">
					  <label for="url"><?php _e("Website","ortus"); ?></label>
					  <div class="input-prepend">
					  <span class="add-on"><i class="icon-home"></i></span><input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php __("Your Website","ortus"); ?>" tabindex="3" />
					  </div>
					</div>

				</fieldset>

				<?php endif; ?>
				
				<div class="clearfix">
					<textarea name="comment" id="comment-textarea" placeholder="<?php __("Your Comment Here...","ortus"); ?>" tabindex="4"></textarea>
				</div>
				
				<div>
				  <input class="btn btn-primary" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment","ortus"); ?>" />
				  <?php cancel_comment_reply_link( __("Cancel","ortus") ); ?>
				  <?php comment_id_fields(); ?>
				</div>
				
				<?php 
					//comment_form();
					do_action('comment_form()', $post->ID); 
				
				?>
				
				</form>
			</div>
		<?php endif; ?>

	</div><!-- #comments -->
<?php endif; ?>

<? if ( ! comments_open() ) { ?>
	<p class="nocomments alert alert-info"><? echo __( 'Comments are closed.', 'ortus' ); ?></p>
<? } ; // end ! comments_open() ?>