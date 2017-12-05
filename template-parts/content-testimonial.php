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
         <div class="entry-content">

            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'krohnschein'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'krohnschein'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

	    <?php if (is_user_logged_in()) : ?>
        <footer class="entry-footer"><?php krohnschein_edit_post_link(); ?></footer>
	    <?php endif; ?><!-- .entry-footer -->
    </div><!-- article__wrap -->

</article><!-- #post-<?php the_ID(); ?> -->
