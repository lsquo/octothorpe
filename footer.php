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
						'fallback_cb'    => false,
						'container'      => false,
						'items_wrap'     => '<nav role="navigation"><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
					)
				); ?>
			</footer>
		<?php }
		wp_footer(); ?>
	</body>
</html>
