<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Dev_Starter
 * @since Dev Starter 1.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>

<header class="entry-header <?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php

		// Default to displaying the post meta.
		devstarter_the_post_meta( get_the_ID(), 'single-top' );

		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

		$intro_text_width = '';

		if ( is_singular() ) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		}

		if ( get_post_type() === 'portfolio' ) {
			$custom_link          = get_field( 'custom_link' );
			$custom_link_no_https = str_replace( 'https://', '' , $custom_link );

			if ( ! empty( $custom_link ) ) :
			?>
				<div class="portfolio_custom_link">
					<a href="<?php echo esc_url( $custom_link ); ?>" target="_blank"><?php echo $custom_link_no_https; ?></a>
				</div>
			<?php
			endif;
		}


		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @since Dev Starter 1.0
		 *
		 * @param bool Whether to show the categories in header. Default true.
		 */
		$show_categories = apply_filters( 'devstarter_show_categories_in_entry_header', true );

		if ( true === $show_categories && has_category() ) {
			?>

			<div class="entry-categories">
				<span class="screen-reader-text">
					<?php
					/* translators: Hidden accessibility text. */
					_e( 'Categories', 'devstarter' );
					?>
				</span>
				<div class="entry-categories-inner">
					<?php the_category( ' ' ); ?>
				</div><!-- .entry-categories-inner -->
			</div><!-- .entry-categories -->

			<?php
		}

		?>

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->
