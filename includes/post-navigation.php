<?php
/**
 * @package Serene
 * @since Serene 1.0
 */

if ( function_exists( 'wp_pagenavi' ) ) {
	wp_pagenavi();
	return;
}
?>

<div class="et-pagination clearfix">
	<div class="alignleft">
		<?php next_post_link( '%link', esc_html__( '&lt;', 'Serene' ) ); ?>
		<span class="plain"><?php next_post_link( '%link', esc_html__( '%title', 'Serene' ) ); ?></span>
	</div>
	<div class="alignright">
		<span class="plain"><?php previous_post_link( '%link', esc_html__( '%title', 'Serene' ) ); ?></span>
		<?php previous_post_link( '%link', esc_html__( '&gt;', 'Serene' ) ); ?>
	</div>
</div>