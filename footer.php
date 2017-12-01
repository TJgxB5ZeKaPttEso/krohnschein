<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Krohnschein
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="footer-logo">
		<?php include( "images/DIST/svg/krohnschein_logo_web.svg" ) ?>
    </div>
    <div class="site-info">
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Copyright: %1$s by %2$s.', 'krohnschein' ), 'Studio Krohnschein', 'Michael Bernschein & Johannes Krohn, 2017' );

		wp_nav_menu( array(
			'container_class' => 'menu-socials-container',
			'theme_location'  => 'menu-2',
			'menu_id'         => 'social-menu',
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => false,
		) );


		?>


    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>

</body>
</html>
