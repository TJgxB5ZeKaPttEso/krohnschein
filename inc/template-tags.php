<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Krohnschein
 */

if ( ! function_exists( 'krohnschein_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function krohnschein_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'krohnschein' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'krohnschein' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'krohnschein_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function krohnschein_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'krohnschein' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Client: %1$s', 'krohnschein' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'krohnschein' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<br><span class="tags-links">' . esc_html__( ' Role: %1$s', 'krohnschein' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'krohnschein' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'krohnschein' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'krohnschein_edit_post_link' ) ) :
	function krohnschein_edit_post_link() {


		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'krohnschein' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);


	}
endif;

if ( ! function_exists( 'all_rev_sliders_in_array' ) ) :

	function all_rev_sliders_in_array() {
		if ( class_exists( 'RevSlider' ) ) {
			$theslider  = new RevSlider();
			$arrSliders = $theslider->getArrSliders();
			$arrA       = array();
			$arrT       = array();
			foreach ( $arrSliders as $slider ) {
				$arrA[] = $slider->getAlias();
				$arrT[] = $slider->getTitle();
			}
			if ( $arrA && $arrT ) {
				$result = array_combine( $arrA, $arrT );
			} else {
				$result = false;
			}

			return $result;
		}
	}

endif;


function krohnschein_header_thumbnail_before() {
	$thumb_id  = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src( $thumb_id, 'large-thumb', true );
	echo '<header class="entry-header">' .
	     '<div class="slider-fallback"  style="background-image: url(' .
	     $thumb_url[0] . ')"><div class="slider-fallback-title-wrapper">' .
	     '<h1 class="slider-fallback-title entry-title">';
}

function krohnschein_no_header_thumbnail_before() {
	echo
		'<div class="slider-fallback no-thumbnail"><div class="slider-fallback-title-wrapper">' .
		'<h1 class="slider-fallback-title entry-title">';
}


function krohnschein_header_thumbnail_after() {
	echo
		'</h1>' .
		'</div></div>' .
		'</header><!-- .entry-header -->';
}

if ( ! function_exists( 'krohnschein_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function krohnschein_entry_meta() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'krohnschein' ) );
			if ( $categories_list && krohnschein_categorized_blog() ) {
				printf( '<p class="cat-links">' . esc_html__( 'Client: %1$s', 'krohnschein' ) . '.</p>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'krohnschein' ) );
			if ( $tags_list ) {
				printf( '<p class="tags-links">' . esc_html__( 'Job/Role: %1$s', 'krohnschein' ) . '.</p>', $tags_list ); // WPCS: XSS OK.
			}
		}

	}
endif;

// img unautop
function img_unautop( $content ) {
	$pattern     = '/' . '<p>.*?(<img.*?class=")(.*?)\s*?(wp-image.*?".*?>)<\/p>' . '/i';
	$replacement = '<figure class="$2">$1$3</figure>';
	$content     = preg_replace( $pattern, $replacement, $content );

	return $content;
}

add_filter( 'the_content', 'img_unautop', 99999 );

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function krohnschein_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'krohnschein_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'krohnschein_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so krohnschein_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so krohnschein_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in krohnschein_categorized_blog.
 */
function krohnschein_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'krohnschein_categories' );
}
add_action( 'edit_category', 'krohnschein_category_transient_flusher' );
add_action( 'save_post',     'krohnschein_category_transient_flusher' );

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');


/**
 * Theme shortcodes
 */

// [bartag foo="foo-value"]

function invison_embed_function( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'url' => '//invis.io/RS2U5B1BA',
		),
		$atts,
		'invision_embed'
	);
	return '<div class="proto-wrapper">' .
		'<div class="proto-prototype">' .
			'<div class="proto-prototype-frame">' .
				'<iframe width="456" height="940" src="' . esc_attr($atts['url']) . '" frameborder="0" allowfullscreen></iframe>' .
			'</div>'.
		'</div>'.
	'</div>';



	return ob_get_clean();
}
add_shortcode( 'invision_embed', 'invison_embed_function' );

function pab( $atts , $content = null ) {

	return '<p class="abstract">' . $content . '</p>';

}
add_shortcode( 'pab', 'pab' );

/**
 * Gallery shortcode adjustment to work with lightbox
 */

add_filter( 'post_gallery', 'wpse_gallery_shortcode', 10, 3 );
/**
 * Filters the default gallery shortcode output.
 *
 * @see gallery_shortcode()
 *
 * @param string $output   The gallery output. Default empty.
 * @param array  $attr     Attributes of the gallery shortcode.
 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
 */
function wpse_gallery_shortcode( $output, $attr, $instance ) {
	// Temporarily remove our filter to prevent infinite loop.
	remove_filter( 'post_gallery', 'wpse_gallery_shortcode', 10, 3 );

	// Use WordPress' native function for generating gallery output.
	$gallery_html = gallery_shortcode( $attr );

	// Create an instance of DOMDocument.
	$dom = new \DOMDocument();

	// Supress errors due to malformed HTML.
	// See http://stackoverflow.com/a/17559716/3059883
	$libxml_previous_state = libxml_use_internal_errors( true );

	// Populate $dom with $gallery_html, making sure to handle UTF-8, otherwise
	// problems will occur with UTF-8 characters.
	// Also, make sure that the doctype and HTML tags are not added to our HTML fragment. http://stackoverflow.com/a/22490902/3059883
	$dom->loadHTML( mb_convert_encoding( $gallery_html, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

	// Restore previous state of libxml_use_internal_errors() now that we're done.
	// Again, see http://stackoverflow.com/a/17559716/3059883
	libxml_use_internal_errors( $libxml_previous_state );

	// Create an instance of DOMXpath.
	$xpath = new \DOMXpath( $dom );

	// Match elements with the class gallery-icon (these can be <div> or <dt> depending on whether the theme has support for HTML5.
	// See http://stackoverflow.com/a/26126336/3059883
	$gallery_icons = $xpath->query( "//*[contains(concat(' ', normalize-space(@class), ' '), ' gallery-icon ')]" );

	// Iterate over the the gallery icons.
	foreach ( $gallery_icons as $gallery_icon ) {
		// Find the <a> tags and add our custom attribute and value.
		$gallery_icon_child_node_link = $xpath->query( "//a", $gallery_icon );
		foreach ( $gallery_icon_child_node_link as $node_link ) {
			$gallery_icon_data_featherlight = $dom->createAttribute( 'data-featherlight' );
			$gallery_icon_data_featherlight->value = 'image';

			$node_link->appendChild( $gallery_icon_data_featherlight );
		}
	}

	// Save the updated HTML.
	$gallery_html = $dom->saveHTML();

	// Add our filter back so that it will run the next time that the gallery shortcode is used.
	add_filter( 'post_gallery', 'wpse_gallery_shortcode', 10, 3 );

	// Return the modified HTML.
	return $gallery_html;
}