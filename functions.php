<?php

$content_width = 1280;

function remove_serene_actions() {
	remove_action( 'wp_head', 'serene_add_customizer_css' );
	remove_action( 'customize_controls_print_styles', 'serene_add_customizer_css' );
}

add_action('init','remove_serene_actions');

function et_setup_theme(){
	$template_directory = get_template_directory();

	load_theme_textdomain( 'Serene', $template_directory . '/languages' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-formats', array(
		'image', 'gallery', 'video', 'audio', 'quote', 'link'
	) );

	add_image_size( 'serene-featured-image', 1280, 540, true );

	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'Serene' ),
		)
	);
}
add_action( 'after_setup_theme', 'et_setup_theme' );

/** add the user-defined accent color as the mobile menu's background **/
function serene_child_add_customizer_css() {

?>

<style>
	.meta-post-date, .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-handle, .footer-widget li:before, #mobile_menu ul li:before, #et_active_menu_item, .comment-reply-link, .form-submit input, .et-tags li { background-color: <?php echo esc_html( get_theme_mod( 'accent_color', '#fbad18' ) ); ?>; }
	.post-content > header p, .mobile_menu_bar { color: <?php echo esc_html( get_theme_mod( 'accent_color', '#fbad18' ) ); ?>; }
	blockquote { border-color: <?php echo esc_html( get_theme_mod( 'accent_color', '#fbad18' ) ); ?>; }
	.nav li ul, .et_mobile_menu, #mobile_menu { background: <?php echo esc_html( get_theme_mod( 'accent_color', '#fbad18' ) ); ?>; }
</style>

<?php

}

add_action( 'wp_head', 'serene_child_add_customizer_css' );
add_action( 'customize_controls_print_styles', 'serene_child_add_customizer_css' );

/**
 * Extract and return the first image from content.
 */
if ( ! function_exists( 'serene_child_get_image_in_content' ) ) :
function serene_child_get_image_in_content() {
	remove_filter( 'the_content', 'serene_child_remove_image_from_content' );

	$content = apply_filters( 'the_content', get_the_content() );

	add_filter( 'the_content', 'serene_child_remove_image_from_content' );

	if ( preg_match( '/\[caption .+?\[\/caption\]|\< *[img][^\>]*[.]*\>/i', $content, $matches ) )
		return $matches[0];
	else
		return false;
}
endif;

function serene_child_remove_image_from_content( $content ) {
	if ( 'image' !== get_post_format() )
		return $content;

	$content = preg_replace( '/\[caption .+?\[\/caption\]|\< *[img][^\>]*[.]*\>/i', '', $content, 1 );

	return $content;
}
add_filter( 'the_content', 'serene_remove_blockquote_from_content' );

?>