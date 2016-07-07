<?php
/**
 * The comments template
 *
 * @package Octothorpe
 * @subpackage Templates
 */

if ( post_password_required() ) {
	return;
} ?>
<h2 id="comments"><?php esc_html_e( 'Comments', 'octothorpe' ); ?></h2>
<p><?php printf(
	esc_html(
		_n(
			'%1$s comment so far.',
			'%1$s comments so far.',
			get_comments_number(),
			'octothorpe'
		)
	),
	number_format_i18n( get_comments_number() )
); ?></p>
<?php if ( have_comments() ) { ?>
	<ul class="comment-list">
		<?php wp_list_comments(
			array(
				'style'    => 'ul',
				'callback' => 'octothorpe_comment'
			)
		); ?>
	</ul>
	<?php get_template_part( 'template-parts/pag', 'comments' );
}
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
	<p><?php esc_html_e( 'Comments are closed.', 'octothorpe' ); ?></p>
<?php }
comment_form();
