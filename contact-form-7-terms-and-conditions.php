<?php

/**
 * Plugin Name: Contact Form 7 terms and conditions
 * Plugin URI: https://wpapplab.com/
 * Description: This plugin can be used to display terms and conditions fields into Contact Form 7 . This plugin specifically designed to work with Contact Form 7.
 * Version: 1.0.0
 * Author: Arafat Rahman
 * Author URI: https://github.com/arafatrahman/
 * Text Domain: cf7-termsconditions
 *
 * @package Terms and conditions
 */

/* Tag generator */

define('WPCF7_TAC_URI', plugins_url('/',  __FILE__));

add_action( 'wpcf7_admin_init', 'current_termsconditions_tag_menu', 25, 0 );

function current_termsconditions_tag_menu() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'termsconditions', __( 'Terms and conditions', 'contact-form-7' ),
		'wpcf7_current_termsconditions' );
}

function wpcf7_current_termsconditions( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );  

	$description = __( "Generate a form-tag for Current date & time. For more details, see how to add for contact form 7 %s.", 'contact-form-7' );

	$desc_link = wpcf7_link( __( 'https://contactform7.com/checkboxes-radio-buttons-and-menus/', 'contact-form-7' ), __( 'termsconditions', 'contact-form-7' ) );

	include_once('view/terms-and-conditions-settings.php');
}

add_action( 'wpcf7_init', 'custom_add_form_tag_termsconditions' );

function custom_add_form_tag_termsconditions() {
  wpcf7_add_form_tag( 'termsconditions', 'custom_termsconditions_form_tag_handler' ); // "termsconditions" is the type of the form-tag
}

function custom_termsconditions_form_tag_handler( $tag ) {


	wp_enqueue_script(
		'wcf7-tac',
		WPCF7_TAC_URI . 'assets/js/wcf7-tac.js',
		array(
			'jquery', 
		),
		'1.0.0',
		true // Outputs this at footer
	); // Custom Child Theme jQuery





    //$tempPath = plugin_dir_path( __DIR__ )."contact-form-7-terms-and-conditions/view/terms-and-conditions.php";
   return '<div class="tacbox">
   <input id="wcf7_termsconditions" type="checkbox" onclick="exefunction(this)" />
   <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
 </div>';

}


