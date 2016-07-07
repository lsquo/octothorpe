<?php
/**
 * The 404 template
 *
 * @package Octothorpe
 * @subpackage Templates
 */

get_header(); ?>
<main role="main">
	<header>
		<h1><?php esc_html_e( 'Eek!', 'octothorpe' ); ?></h1>
	</header>
	<p><?php esc_html_e( 'This isn\'t the page you\'re looking for.', 'octothorpe' ); ?></p>
</main>
<?php get_footer();
