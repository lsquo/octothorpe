<?php
/**
 * The header template
 *
 * @package Octothorpe
 * @subpackage Templates
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'octothorpe' ); ?></a>
		<?php if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		} ?>
		<div id="content" class="site-content">
