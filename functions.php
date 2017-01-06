<?php
/**
 * The functionality
 *
 * @package Octothorpe
 * @subpackage Functions
 */

add_action( 'widgets_init', function() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'octothorpe' ),
			'id'            => 'footer',
			'before_widget' => '<section>',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		)
	);
} );

add_action( 'after_setup_theme', function() {
	load_theme_textdomain( 'octothorpe' );
} );

add_action( 'after_setup_theme', function() {
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption'
		)
	);
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
} );

add_filter( 'navigation_markup_template', function() {
	return '
		<nav class="navigation %1$s" role="navigation">
			<div class="nav-links">%3$s</div>
		</nav>
	';
} );

add_action( 'after_setup_theme', function() {
	$GLOBALS['content_width'] = 1200;
} );

add_action( 'after_setup_theme', function() {
	register_nav_menu(
		'footer',
		__( 'Footer', 'octothorpe' )
	);
} );

add_action( 'wp_enqueue_scripts', function() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

add_action( 'wp_enqueue_scripts', function() {

	$fonts = array();

	/* translators: Translate this to 'off' if there are characters in your language that are not supported by Boogaloo. */
	if ( 'off' !== _x( 'on', 'Boogaloo', 'octothorpe' ) ) {
		$fonts[] = 'Boogaloo';
	}

	/* translators: Translate this to 'off' if there are characters in your language that are not supported by Source Code Pro. */
	if ( 'off' !== _x( 'on', 'Source Code Pro', 'octothorpe' ) ) {
		$fonts[] = 'Source+Code+Pro';
	}

	/* translators: Translate this to 'off' if there are characters in your language that are not supported by Noto Serif. */
	if ( 'off' !== _x( 'on', 'Noto Serif', 'octothorpe' ) ) {
		$fonts[] = 'Noto+Serif:400,400i,700,700i';
	}

	if ( $fonts ) {
		wp_enqueue_style(
			'octothorpe-fonts',
			add_query_arg(
				array(
					'family' => urlencode( implode( '|', $fonts ) ),
				),
				'https://fonts.googleapis.com/css'
			)
		);
	}
} );

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style(
		'octothorpe-style',
		get_stylesheet_uri()
	);
} );

add_filter( 'get_custom_logo', function( $html ) {
	return sprintf(
		'<div id="brand" itemscope itemtype="%1$s">%2$s</div>',
		esc_url( 'https://schema.org/Brand' ),
		$html
	);
} );

add_filter( 'the_title', function( $title ) {
	if ( $title == '' && ! is_singular() ) {
		$title = __( '#', 'octothorpe' );
	}
	return $title;
} );

add_filter( 'widget_tag_cloud_args', function( $args ) {
	$args['largest'] = 1.2;
	$args['smallest'] = 1.2;
	$args['unit'] = 'rem';
	return $args;
} );

/**
* Output a comment.
*
* @since 1.0.0
*/
function octothorpe_comment( $comment, $args, $depth ) { ?>
	<li id="comment-<?php echo esc_attr( $comment->comment_ID ); ?>" <?php comment_class(); ?>>
		<?php comment_author_link();
		printf(
			' <time datetime="%1$s">%2$s <a href="%3$s">%4$s</a></time> ',
			esc_attr( get_comment_date( 'c' ) ),
			esc_html( get_comment_date() ),
			esc_url( get_comment_link() ),
			esc_html( get_comment_time() )
		);
		edit_comment_link(
			__( 'Edit', 'octothorpe' ),
			'',
			' '
		);
		comment_reply_link(
			array(
				'depth'         => $depth,
				'max_depth'     => $args[ 'max_depth' ],
				'reply_text'    => __( 'Reply', 'octothorpe' ),
				'login_text'    => '',
				'before'        => '',
				'after'         => ' '
			),
			$comment->comment_ID,
			$comment->comment_post_ID
		);
		if ( $comment->comment_approved == '0' ) { ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'octothorpe' ); ?></em>
		<?php }
		comment_text();
}

add_filter( 'comment_reply_link', function( $link ) {
	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
		return '';
	}
	return $link;
} );

add_filter( 'comment_form_defaults', function( $defaults ) {
	$commenter = wp_get_current_commenter();

	$required = get_option( 'require_name_email' );

	$log_in_link = sprintf(
		'<a href="%1$s">%2$s</a>',
		esc_url( wp_login_url( get_permalink() ) ),
		esc_html__( 'log in', 'octothorpe' )
	);

	$defaults['cancel_reply_after'] = '';
	$defaults['cancel_reply_before'] = '';
	$defaults['cancel_reply_link'] = __( 'Cancel', 'octothorpe' );
	$defaults['comment_field'] = '<label for="comment">' . esc_html__( 'Comment ', 'octothorpe' ) . esc_html__( '*', 'octothorpe' ) . '</label><textarea name="comment" id="comment" rows="6"></textarea>';
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = '<p><code>' . allowed_tags() . '</code></p>';
	$defaults['format'] = 'html5';
	$defaults['fields']['author'] = '<label for="author">' . esc_html__( 'Name ', 'octothorpe' ) . ( $required ? esc_html__( '*', 'octothorpe' ) : '' ) . '</label> ' . '<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" maxlength="245" ' . ( $required ? 'required' : '' ) . '>';
	$defaults['fields']['email'] = '<label for="email">' . esc_html__( 'Email ', 'octothorpe' ) . ( $required ? esc_html__( '*', 'octothorpe' ) : '' ) . '</label> ' . '<input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" maxlength="100" ' . ( $required ? 'required' : '' ) . '>';
	$defaults['fields']['url'] = '<label for="url">' . esc_html__( 'Website', 'octothorpe' ) . '</label> ' . '<input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" maxlength="200">';
	$defaults['label_submit'] = __( 'Post', 'octothorpe' );
	$defaults['logged_in_as'] = '';
	$defaults['must_log_in'] = '<p>' . sprintf( esc_html__( 'You must %1$s to comment.', 'octothorpe' ), $log_in_link ) . '</p>';
	$defaults['submit_button'] = '<input type="submit" name="%1$s" value="%4$s">';
	$defaults['submit_field'] = '%1$s %2$s';
	$defaults['title_reply'] = '';
	$defaults['title_reply_after'] = '';
	$defaults['title_reply_before'] = '';
	$defaults['title_reply_to'] = '';

	return $defaults;
} );

add_filter( 'the_password_form', function() {
	global $post;
	$output = esc_html__( 'This content is password protected. To view it please enter your password.', 'octothorpe' );
	$output .= '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
	$output .= '<label for="password">' . esc_html__( 'Password', 'octothorpe' ) . '</label>';
	$output .= '<input type="password" name="post_password" id="password" size="20">';
	$output .= '<input type="submit" name="Submit" value="' . esc_attr__( 'Enter', 'octothorpe' ) . '">';
	$output .= '</form>';
	return $output;
} );
