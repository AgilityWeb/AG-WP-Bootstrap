<?php
/**
 * The template for displaying image attachments
 *
 */

	get_header();
?>

<div class="container">
	<div class="row">
		
		<div class="col-lg-12">
			<p class="lead">
				<?php
					echo nl2br( get_post_field('post_content', $page_id) );// = Page content

					edit_post_link( __( 'Edit', 'bootstrap-ag' ), '<span class="edit-link">', '</span>', $page_id );
				?>
			</p>

			<?php bootstrap_ag_content_nav( 'nav-above' ); ?>

				<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
						the_post();
				?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<nav id="image-navigation" class="navigation image-navigation">
							<div class="nav-links">
								<div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'bootstrap-ag' ) ); ?></div>                                   <div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'bootstrap-ag' ) ); ?></div>
							</div><!-- .nav-links -->
						</nav><!-- .image-navigation -->
						
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						
						<div class="entry-content">
							
							<div class="entry-attachment">
								<?php
									echo wp_get_attachment_image( get_the_ID(), 'large', false, array( 'class' => 'img-responsive' )  );
								?>
								
								<?php if ( has_excerpt() ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div><!-- .entry-caption -->
								<?php endif; ?>
								
							</div><!-- .entry-attachment -->
							
							<?php
								the_content();
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bootstrap-ag' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bootstrap-ag' ) . ' </span>%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
							?>
						</div><!-- .entry-content -->
						
						<footer class="entry-footer">
							<?php edit_post_link( __( 'Edit', 'bootstrap-ag' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-footer -->
						
					</article><!-- #post-## -->
					
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					
					// Previous/next post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span> <span class="post-title">%title</span>', 'Parent post link', 'bootstrap-ag' ),
					) );
				?>
				
				<?php
					endwhile;
				endif;
				wp_reset_postdata(); // end of the loop.
				?>
				
			<?php bootstrap_ag_content_nav( 'nav-below' ); ?>

		</div><!-- /.col -->
		
	</div><!-- /.row -->

	<?php get_sidebar(); ?>

</div><!-- /.container -->

<?php get_footer(); ?>
