<?php
/**
 * The welcome message on the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Dev_Starter
 * @since Dev Starter 1.0
 */

?>

<article class="welcome_msg portfolio" id="post-<?php echo WELCOME_MSG_POST_ID; ?>">

	<header class="entry-header">

		<div class="entry-header-inner section-inner medium">
			<h2 class="entry-title heading-size-1">
				<?php echo get_the_title( WELCOME_MSG_POST_ID ); ?>
			</h2>
		</div><!-- .entry-header-inner -->

	</header><!-- .entry-header -->

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">
			<?php echo get_the_content( null, false, WELCOME_MSG_POST_ID ); ?>
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

</article><!-- .post -->


