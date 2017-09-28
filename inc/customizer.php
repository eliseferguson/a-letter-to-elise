<?php
/**
 * A Letter to Elise Theme Customizer
 *
 * @package A_Letter_to_Elise
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function a_letter_to_elise_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'a_letter_to_elise_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'a_letter_to_elise_customize_partial_blogdescription',
		) );
	}



}
add_action( 'customize_register', 'a_letter_to_elise_customize_register' );

/* ALTE - additional settings */
function alte_customizer_settings( $wp_customize ) {
	$wp_customize->add_section(
		'alte_footer',
		array(
			'title' => 'Footer',
			'priority' => 120,
			'description' => 'Settings for the footer section of the site'
		)
	);
	$wp_customize->add_setting( 'alte_company_name' );
	$wp_customize->add_control(
		'alte_company_name',
		array(
			'section' => 'alte_footer',
			'label' => 'Company Name',
			'type' => 'text'
		));
}
add_action( 'customize_register', 'alte_customizer_settings' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function a_letter_to_elise_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function a_letter_to_elise_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function a_letter_to_elise_customize_preview_js() {
	wp_enqueue_script( 'a-letter-to-elise-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'a_letter_to_elise_customize_preview_js' );
