<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Krohnschein
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
	/** replace
	 *
	 * url("Fonts/
	 *
	 * with
	 *
	 * url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts **/
	?>


    <style type="text/css">
        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp_n4";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/c34970a0-5fd3-4c92-b10d-b8dbd145f0e6.eot?#iefix") format("eot")
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/c34970a0-5fd3-4c92-b10d-b8dbd145f0e6.eot?#iefix");
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/c34970a0-5fd3-4c92-b10d-b8dbd145f0e6.eot?#iefix") format("eot"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/1d2142cb-3e68-48df-b188-f1ac45a47a8b.woff2") format("woff2"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/9dc6c76b-0260-4292-af1d-0bc9eecbded2.woff") format("woff"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/ed18aa48-557e-4d1f-a53c-58399a7c1bc4.ttf") format("truetype"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/5b9068b3-d518-4b0a-a5a2-1aa25714df22.svg#5b9068b3-d518-4b0a-a5a2-1aa25714df22") format("svg");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp_i4";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/016417eb-25bd-4b80-a60d-2dacbb7f648b.eot?#iefix") format("eot")
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/016417eb-25bd-4b80-a60d-2dacbb7f648b.eot?#iefix");
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/016417eb-25bd-4b80-a60d-2dacbb7f648b.eot?#iefix") format("eot"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/a28c06ea-8829-467a-a7be-4ffdfba4247b.woff2") format("woff2"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/3293834c-c7fe-4d69-a914-f94198711fe4.woff") format("woff"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/65b936e2-311a-4b71-bf88-b03362853c0f.ttf") format("truetype"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/8ab5cb54-50ea-4912-8521-79357a3b8131.svg#8ab5cb54-50ea-4912-8521-79357a3b8131") format("svg");
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp_n7";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/83d6b8f7-bd47-4e8d-a359-27b74d3100f6.eot?#iefix") format("eot")
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/83d6b8f7-bd47-4e8d-a359-27b74d3100f6.eot?#iefix");
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/83d6b8f7-bd47-4e8d-a359-27b74d3100f6.eot?#iefix") format("eot"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/75e1af8f-1a4c-475a-8b53-f27e52822b6b.woff2") format("woff2"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/2ba6fbd5-9c17-4733-af15-f49fbecc5c15.woff") format("woff"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/7dcf6c37-4fb4-4211-9808-6a39bfa89e0d.ttf") format("truetype"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/1baaf9ba-feec-45ca-a826-7bcf9f8e5b21.svg#1baaf9ba-feec-45ca-a826-7bcf9f8e5b21") format("svg");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp_i7";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/48906e2a-bd50-495b-b01c-e197d63ffa16.eot?#iefix") format("eot")
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/48906e2a-bd50-495b-b01c-e197d63ffa16.eot?#iefix");
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/48906e2a-bd50-495b-b01c-e197d63ffa16.eot?#iefix") format("eot"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/57974581-bbc7-4288-9512-600df67cfe32.woff2") format("woff2"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/071a68ca-9b4b-44c3-a81f-5e63580800b8.woff") format("woff"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/3465d745-f731-442a-bd61-8749897a3002.ttf") format("truetype"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/bbe56dc8-c447-42aa-84e4-389e6d84e264.svg#bbe56dc8-c447-42aa-84e4-389e6d84e264") format("svg");
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp_n8";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/4a1d2048-47ef-4ea3-bf10-15aaa5e2c356.eot?#iefix") format("eot")
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/4a1d2048-47ef-4ea3-bf10-15aaa5e2c356.eot?#iefix");
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/4a1d2048-47ef-4ea3-bf10-15aaa5e2c356.eot?#iefix") format("eot"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/f53e5775-ed10-4b0d-bae1-efc8fb73f320.woff2") format("woff2"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/71c97127-1adf-4bc2-92c9-4d4baf64c06c.woff") format("woff"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/2ddf29df-f841-4d18-89df-e571abf167d9.ttf") format("truetype"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/6d5b6c6c-3af0-4b28-af18-1854fd7b0d49.svg#6d5b6c6c-3af0-4b28-af18-1854fd7b0d49") format("svg");
            font-weight: 800;
            font-style: normal;
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp_i8";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/1c9b4284-e79e-4d6c-b73f-6cad5452b7b8.eot?#iefix") format("eot")
        }

        @font-face {
            font-family: "Neue Haas Grotesk W01 Disp";
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/1c9b4284-e79e-4d6c-b73f-6cad5452b7b8.eot?#iefix");
            src: url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/1c9b4284-e79e-4d6c-b73f-6cad5452b7b8.eot?#iefix") format("eot"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/baf627c2-ef72-493e-93cc-a8da9a1106a4.woff2") format("woff2"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/7e80bade-56f7-417a-acfe-4291ecbae208.woff") format("woff"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/d4bd0a8f-e32b-4e04-9a85-9793372dc9f7.ttf") format("truetype"), url("<?php echo get_stylesheet_directory_uri(); ?>/Fonts/2759ec8c-ea83-4c34-af69-98b81f1d9923.svg#2759ec8c-ea83-4c34-af69-98b81f1d9923") format("svg");
            font-weight: 800;
            font-style: italic;
        }
    </style>
    <script type="text/javascript">
        var MTIProjectId = '7a266821-29d0-4dfb-8779-de77a1698cf9';
        (function () {
            var mtiTracking = document.createElement('script');
            mtiTracking.type = 'text/javascript';
            mtiTracking.async = 'true';
            mtiTracking.src = 'mtiFontTrackingCode.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mtiTracking);
        })();
    </script>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'krohnschein' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="masthead__wrap">
            <div class="site-branding">
                <div class="nav_logo">
					<?php include 'images/DIST/svg/krohnschein_logo_web.svg'; ?>
                </div>
				<?php
				if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                              rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                             rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
				?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'krohnschein' ); ?></button>
				<?php
				wp_nav_menu( array(
					'container_class' => 'menu-socials-container',
					'theme_location'  => 'menu-2',
					'menu_id'         => 'social-menu',
					'link_before'     => '<span class="screen-reader-text">',
					'link_after'      => '</span>',
					'fallback_cb'     => false,
				) );

				wp_nav_menu( array(
					'container_class' => 'menu-krohnschein-container',
					'theme_location'  => 'menu-1',
					'menu_id'         => 'primary-menu',
					'fallback_cb'     => false,
				) );
				?>


            </nav><!-- #site-navigation -->


        </div>
    </header><!-- #masthead -->

    <!-- The Hero element  -->

    <div class="hero_wrapper">
		<?php
		/**
		 * Slider Revolution setup
		 */
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'revslider/revslider.php' ) ) {


			//------------ Get Post Slug

			$post_id = ( get_the_ID() );
			$post    = get_post( $post_id );
			$slug    = $post->post_name;

			//------------ Check for corresponding slider Alias

			$aliases = all_rev_sliders_in_array();

			if ( ! is_home() ) {
				if ( in_array( $slug, $aliases ) ) {

					putRevSlider( $slug );

				} else {
					if ( is_page() || is_single() ) {
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							krohnschein_header_thumbnail_before();
							the_title();
							krohnschein_header_thumbnail_after();

						} else {
							krohnschein_no_header_thumbnail_before();
							the_title();
							krohnschein_header_thumbnail_after();
						}

					}
					if ( is_category() ) {
						$title        = get_the_archive_title();
						$croppedTitle = str_replace( 'Kategorie: ', '', $title );
						krohnschein_no_header_thumbnail_before();
						echo $croppedTitle;
						krohnschein_header_thumbnail_after();


					}
					if ( is_post_type_archive() ) {

						// Get Archive name and delete Archive from string
						$title        = get_the_archive_title();
						$croppedTitle = str_replace( 'Archive: ', '', $title );

						krohnschein_no_header_thumbnail_before();
						echo $croppedTitle;
						krohnschein_header_thumbnail_after();
					}

				}
			} else {
				putRevSlider( 'landingSlider' );
			}
		} else {
			if ( is_page() || is_single() ) {
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					krohnschein_header_thumbnail_before();
					the_title();
					krohnschein_header_thumbnail_after();

				} else {
					krohnschein_no_header_thumbnail_before();
					the_title();
					krohnschein_header_thumbnail_after();
				}

			} elseif ( is_category() ) {
				$title        = get_the_archive_title();
				$croppedTitle = str_replace( '', '', $title );
				krohnschein_no_header_thumbnail_before();
				echo $croppedTitle;
				the_archive_description( '<div class="archive-description">', '</div>' );
				krohnschein_header_thumbnail_after();


			} elseif ( is_post_type_archive() || is_archive() ) {

				// Get Archive name and delete Archive from string
				$title        = get_the_archive_title();
				$croppedTitle = str_replace( '', '', $title );

				krohnschein_no_header_thumbnail_before();
				echo $croppedTitle;
				the_archive_description( '<div class="archive-description">', '</div>' );
				krohnschein_header_thumbnail_after();
			} else {


				if ( get_header_image() ) { ?>
                    <header class="entry-header">
                        <div class="slider-fallback no-thumbnail"
                             style="background-image: url(<?php header_image(); ?>)">
                            <div class="slider-fallback-title-wrapper">
								<?php

								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
                                    <h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
								<?php
								endif; ?>

                            </div>
                        </div>
                    </header><!-- .entry-header --><!-- .header-image -->
					<?php
				} else {
					krohnschein_no_header_thumbnail_before();
					krohnschein_header_thumbnail_after();
				} // End header image check.


			}


		}

		?>


    </div>
	<?php if ( is_home() ) : ?>
        <div class="welcome-card">
            <h3><?php echo get_option( 'welcome_title' ); ?></h3>
            <p class="abstract"><?php echo get_option( 'welcome_description' ); ?></p>

        </div>


	<?php endif ?>

    <div id="content" class="site-content">
