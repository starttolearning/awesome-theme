<?php
/**
 * ================================
 *     TREEBY AJAX REQUESTS
 * ================================
 */
add_action( 'wp_ajax_nopriv_tb_save_order_form', 'tb_save_order_form' );
add_action( 'wp_ajax_tb_save_order_form', 'tb_save_order_form' );

function tb_save_order_form(){
	$name = wp_strip_all_tags( $_POST['name'] );
	$email = wp_strip_all_tags( $_POST['email'] );
	$message = wp_strip_all_tags( $_POST['message'] );

	// allow us save information from front-end to the back-end
	$postarr = array(
			'post_title'	=> $name,
			'post_content'	=> $message,
			'post_author'	=> 1,
			'post_type'		=> 'tb-order',
			'meta_input'	=> array('_order_email_value_key' => $email),
			'post_status'	=> 'publish',

		);
	$post_id = wp_insert_post( $postarr );

	if( $post_id !== 0 ){

		// Send email to the admin for notification
		$to = get_bloginfo('admin_email');
		$subject = 'Resume Set - '.$name;
		$headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // From Wilton Lee <wilton_lee@163.com>
		$headers[] = 'Reply-To: '.$name.' <'.$email.'>';
		$headers[] = 'Content-Type: text/html: charset=UTF-8';
		
		wp_mail( $to, $subject, $message, $headers );
		echo $post_id;
	}else{
		echo 0;
	}

	

	die();

}