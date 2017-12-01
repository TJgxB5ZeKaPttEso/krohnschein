<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Krohnschein
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="article__wrap">
        <section class="project-card">
			<?php

			if ( has_post_thumbnail() ) {
				?>
                <div class="post-thumbnail project-card__image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
					<?php if ( get_the_category_list()|| get_the_tag_list() ) { ?>
                        <div class="entry-meta">
							<?php krohnschein_entry_meta() ?>
                        </div>
					<?php } ?>
                </div>
				<?php
			} else {
				?>
                <div class="post-thumbnail no-thumbnail project-card__image">
	                <?php if ( get_the_category_list()|| get_the_tag_list() ) { ?>
                        <div class="entry-meta">
			                <?php krohnschein_entry_meta() ?>
                        </div>
	                <?php } ?>

                </div>'
				<?php
			}
			?>
            <div class="project-card__content">
                <header class="entry-header">
					<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
                </header><!-- .entry-header -->


                <div class="entry-content">
					<?php
					the_excerpt( sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'krohnschein' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'krohnschein' ),
						'after'  => '</div>',
					) );
					?>
                </div><!-- .entry-content -->
                <?php if (is_user_logged_in()) : ?>
                <footer class="entry-footer"><?php krohnschein_edit_post_link(); ?></footer>
                <?php endif; ?>

            </div><!-- project-card__content -->
        </section><!-- project-card -->
    </div><!-- article__wrap -->

</article><!-- #post-<?php the_ID(); ?> -->
