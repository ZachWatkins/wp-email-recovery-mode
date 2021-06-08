<?php
/*
Plugin Name: Recovery Mode Email Recipient Modification
Description: Adds appropriate emails to the auto-generated fatal error email.
Version: 1.0.0
Author: Zachary Watkins
*/
function wp_mu_recovery_mode_email( $email ) {
	if ( is_array( $email['headers'] ) ) {
  	$email['headers'][] = 'Bcc: youremail@domain.com';
  } elseif ( is_string( $email['headers'] ) ) {
  	$email['headers'] = array(
  		$email['headers'],
  		'Bcc: youremail@domain.com',
  	);
  } else {
    $email['headers'] = 'Bcc: youremail@domain.com';
  }
  return $email;
}
add_filter( 'recovery_mode_email', 'wp_mu_recovery_mode_email', 11, 1 );
