<?php

/**
* Theme shortcodes
*/

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
}
add_shortcode( 'invision_embed', 'invison_embed_function' );



/**
 *  Abstract paragraph
 **/

function pab( $atts , $content = null ) {

return '<p class="abstract">' . $content . '</p>';

}
add_shortcode( 'pab', 'pab' );


/**
 * shortcode to create a svg container
 */

function svg_include_function( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'url' => '',
		),
		$atts,
		'svg_embed'
	);

	return '<div class="svg-viz">' . file_get_contents($atts['url']) . '</div>';
}
add_shortcode( 'svg_embed', 'svg_include_function' );