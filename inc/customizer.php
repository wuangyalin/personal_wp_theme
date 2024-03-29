<?php
/**
 * LukeGong Theme Customizer
 *
 * @package LukeGong
 */

//Luke GOng added

function dd($val = 'dump', $exit = true) {
	echo '<pre>';
	var_dump($val);
	echo '</pre>';

	if ($exit) {
			exit;
	}
}
function getProjects($num = 30){
$ret = array();
$args = array(
	'post_type' => 'my_project',
	'posts_per_page' => "$num"
);
$posts = get_posts($args);

return $posts;
}

// added menu
function atlas_register_my_menu() {
	register_nav_menu('main_menu',__( 'Main Menu' ));
  }
add_action( 'init', 'atlas_register_my_menu' );

add_image_size( 'luke-thumb', 400, 400 );

add_filter( 'nav_menu_link_attributes', function($atts) {
	$atts['class'] = "nav-link";
	return $atts;
}, 100, 1 );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lukegong_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'lukegong_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'lukegong_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'lukegong_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lukegong_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lukegong_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lukegong_customize_preview_js() {
	wp_enqueue_script( 'lukegong-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lukegong_customize_preview_js' );
 

