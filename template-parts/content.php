<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Dev_Starter
 * @since Dev Starter 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'summary' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'devstarter' ) );
			}
			?>

		</div><!-- .entry-content -->

		<div class="entry-content footer-content">
		<div class="entry-content tags">
			<div class="tags-container">
		<?php
			$tags = get_the_terms( get_the_ID(), 'tag' );

			if ( ! empty( $tags ) ) : 
				foreach ( $tags as $tag ) : ?>
					<span class="portfolio_tag"><?php echo $tag->name; ?></span>
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>

		<div class="cta-container">
		<?php if ( is_home() ) : ?>
			<a href="<?php echo esc_url( get_permalink() ) ?>" class="button cta">Read more about this project</a>
		<?php endif; ?>
		</div>
		</div>
	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'devstarter' ) . '"><span class="label">' . __( 'Pages:', 'devstarter' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		if ( ! is_search() ) {
			get_template_part( 'template-parts/featured-image' );
		}

		// Single bottom post meta.
		devstarter_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

	<?php if ( is_home() ) : ?>
		<hr class="article-sep">
	<?php endif; ?>

</article><!-- .post -->
