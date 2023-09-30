<?php
/**
 * Header file for the Dev Starter WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Dev_Starter
 * @since Dev Starter 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<?php if ( defined( 'GA4_PROPERTY' ) ) : ?>
			<!-- Google tag (gtag.js) -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA4_PROPERTY; ?>"></script>
			<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '<?php echo GA4_PROPERTY; ?>' );
			</script>
		<?php endif; ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75,300&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

		<?php wp_head(); ?>

		<?php
			$current_page = home_url( $_SERVER['REQUEST_URI'] );
			$share_image  = site_url('/wp-content/themes/devstarter/assets/img/leomuniz-dev-share-image.jpg');
			$title        = 'Leo Muniz - Senior Software Developer';
			$description  = get_bloginfo( 'description' );
		?>

		<!-- Open Graph / Facebook --> <!-- this is what Facebook and other social websites will draw on -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo esc_url( $current_page ); ?>">
		<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
		<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
		<meta property="og:image" content="<?php echo esc_url( $share_image ); ?>">

		<!-- Twitter --> <!-- You can have different summary for Twitter! -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="<?php echo esc_url( $current_page ); ?>">
		<meta property="twitter:title" content="<?php echo esc_attr( $title ); ?>">
		<meta property="twitter:description" content="<?php echo esc_attr( $description ); ?>">
		<meta property="twitter:image" content="<?php echo esc_url( $share_image ); ?>">

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group">

			<div class="header-inner">

				<div class="header-titles-wrapper">

					<div class="header-titles">
						<?php
							// Site title or logo.
							devstarter_site_logo();

							if ( DISPLAY_DESCRIPTION ) {
								devstarter_site_description();
							}
						?>

					</div><!-- .header-titles -->

				</div><!-- .header-titles-wrapper -->

				<div class="header-navigation-mobile-menu-toggle">
					<label class="toggle-mobile-menu" for="mobile-toggle"><?php devstarter_the_theme_svg( 'sandwich' ); ?></label>
				</div>

				<div class="header-navigation-wrapper">

					<input type="checkbox" id="mobile-toggle" />
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						?>
							<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'devstarter' ); ?>">
								<ul class="primary-menu reset-list-style">
									<?php
										wp_nav_menu(
											array(
												'container'      => '',
												'items_wrap'     => '%3$s',
												'theme_location' => 'primary',
												'walker'         => new Walker_SubMenu_Modifier(),
											)
										);
									?>
								</ul>
							</nav><!-- .primary-menu-wrapper -->
						<?php
					}
					?>

				</div><!-- .header-navigation-wrapper -->

			</div><!-- .header-inner -->
			
		</header><!-- #site-header -->
