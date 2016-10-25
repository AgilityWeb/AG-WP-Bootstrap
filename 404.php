<?php
/**
 * Template Name: 404
 * Description: Page template 404 Not found
 *
 */

	get_header();
?>

	<div id="post-0" class="content error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not found', 'bootstrap-ag' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'bootstrap-ag' ); ?></p>
			<div><?php get_search_form(); ?></div>
		</div><!-- /.entry-content -->
	</div><!-- /#post-0 -->

<?php get_footer(); ?>
