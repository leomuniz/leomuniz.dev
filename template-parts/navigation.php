<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Dev_Starter
 * @since Dev Starter 1.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {

	$pagination_classes = '';

	if ( ! $next_post ) {
		$pagination_classes = ' only-one only-prev';
	} elseif ( ! $prev_post ) {
		$pagination_classes = ' only-one only-next';
	}

	?>

	<nav class="pagination-single section-inner<?php echo esc_attr( $pagination_classes ); ?>" aria-label="<?php esc_attr_e( 'Post', 'devstarter' ); ?>">

		<hr class="styled-separator is-style-wide" aria-hidden="true" />

		<div class="related-work-title">
			<h3>Other work</h3>
		</div>

		<div class="pagination-single-inner">

			<?php
			if ( $prev_post ) {
				?>
				<div class="column">
					<a class="previous-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
						<?php echo get_the_post_thumbnail( $prev_post->ID, 'post-small-thumbnail' ); ?>
					</a>
					
					<div class="post_date">
						<?php echo get_the_time( get_option( 'date_format' ), $prev_post->ID ); ?>
					</div>
					
					<a class="previous-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
						<span class="title-inner"><?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?></span>
					</a>

					<div class="excerpt">
						<?php echo get_the_excerpt( $prev_post->ID ); ?>
					</div>
				</div>

				<?php
			}

			if ( $next_post ) {
				?>
				<div class="column">
					<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
						<?php echo get_the_post_thumbnail( $next_post->ID, 'post-small-thumbnail' ); ?>
					</a>

					<div class="post_date">
						<?php echo get_the_time( get_option( 'date_format' ), $next_post->ID ); ?>
					</div>

					<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
						<span class="title-inner"><?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?></span>
					</a>
					
					<div class="excerpt">
						<?php echo get_the_excerpt( $next_post->ID ); ?>
					</div>
				</div>
				<?php
			}
			?>

		</div><!-- .pagination-single-inner -->

		<hr class="styled-separator is-style-wide" aria-hidden="true" />

	</nav><!-- .pagination-single -->

	<?php
}
