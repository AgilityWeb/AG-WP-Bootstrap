<?php
/**
 * The default template for displaying content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() ) : ?>
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bootstrap-ag' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Featured', 'bootstrap-ag' ); ?></h3>
			</hgroup>
		<?php else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bootstrap-ag' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php bootstrap_ag_article_posted_on(); ?>
			</div><!-- /.entry-meta -->
		<?php endif; ?>
	</header><!-- /.entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- /.entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bootstrap-ag' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bootstrap-ag' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- /.entry-content -->
	<?php endif; ?>
		
	<footer class="entry-meta">
		<?php
			$show_sep = false;
			if ( 'post' === get_post_type() ) : // Hide category and tag text for pages on Search

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'bootstrap-ag' ) );
				if ( $categories_list ) :
			?>
					<span class="cat-links">
						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'bootstrap-ag' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
						$show_sep = true; ?>
					</span>
			<?php
				endif; // End if $categories_list

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'bootstrap-ag' ) );
				if ( $tags_list ) :
					if ( $show_sep ) :
			?>
					<span class="sep"> | </span>
				<?php
					endif; // End if $show_sep
				?>
					<span class="tag-links">
						<?php
							printf( __( '<span class="%1$s">Tagged</span> %2$s', 'bootstrap-ag' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
							$show_sep = true;
						?>
					</span>
				<?php
				endif; // End if $tags_list
			endif; // End if 'post' == get_post_type()
		?>
	
		<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
				<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bootstrap-ag' ) . '</span>', __( '<b>1</b> Reply', 'bootstrap-ag' ), __( '<b>%</b> Replies', 'bootstrap-ag' ) ); ?></span>
		<?php endif; // End if comments_open() ?>
		
		<a href="<?php echo get_permalink(); ?>" class="btn btn-default"><?php _e( 'more', 'bootstrap-ag' ); ?></a>
		
		<?php edit_post_link( __( 'Edit', 'bootstrap-ag' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- /.entry-meta -->
</article><!-- /#post-<?php the_ID(); ?> -->
