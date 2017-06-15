<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GSR01
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
<!-- 		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->
	</header>

	<div class="entry-content">
		<?php
			the_content();

/*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gsr-demo-theme' ),
				'after'  => '</div>',
			) );
*/
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
<!--
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'gsr-demo-theme' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer>
-->
	<?php endif; ?>
</article><!-- #post-## -->
