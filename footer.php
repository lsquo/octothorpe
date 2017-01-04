<?php
/**
 * The footer template
 *
 * @package Octothorpe
 * @subpackage Templates
 */
?>

		</div>
		<?php get_sidebar();
		if ( has_nav_menu( 'footer' ) ) { ?>
			<footer>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'depth'          => 1,
						'fallback_cb'    => false
					)
				); ?>
			</footer>
		<?php }
		wp_footer(); ?>
	</body>
</html>
