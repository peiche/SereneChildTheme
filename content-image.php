<?php
/**
 * @package Serene
 * @since Serene 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-image">
		<a href="<?php the_permalink(); ?>"><?php echo serene_child_get_image_in_content(); ?></a>
		<?php serene_post_meta_info(); ?>
	</div>
	
	<div class="post-content clearfix"<?php echo serene_get_post_background(); ?>>
		<?php if ( is_single() ) : ?>
		<h1 class="title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		
		<?php et_postinfo_meta(); ?>
		
		<div class="entry-content clearfix">
		<?php
		if ( is_single() ) {
			the_content();

			wp_link_pages( array(
				'before'         => '<p><strong>' . esc_attr__( 'Pages', 'Serene' ) . ':</strong> ',
				'after'          => '</p>',
				'next_or_number' => 'number',
			) );

			the_tags( '<ul class="et-tags clearfix"><li>', '</li><li>', '</li></ul>' );

			edit_post_link( esc_attr__( 'Edit this post', 'Serene' ) );
		} else {
			the_content('Read more &rarr;', FALSE);
		}
		?>
		</div>
	</div>
</article>