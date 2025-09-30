<?php

if ( ! function_exists('xss_clean'))
{
	function xss_clean($string)
	{
		$_lava =& lava_instance();
		$_lava->call->library('antixss');
		return $_lava->antixss->xss_clean($string);
	}
}

if ( ! function_exists('set_flash_alert'))
{
	function set_flash_alert($alert, $message) {
		$_lava =& lava_instance();
		$_lava->session->set_flashdata(array('alert' => $alert, 'message' => $message));
	}
}

if ( ! function_exists('flash_alert'))
{
	function flash_alert()
	{
		$_lava =& lava_instance();
		if($_lava->session->flashdata('alert') !== NULL) {
			echo '
	        <div class="alert alert-' . $LAVA->session->flashdata('alert') . '">
	            <i class="icon-remove close" data-dismiss="alert"></i>
	            ' . $_lava->session->flashdata('message') . '
	        </div>';
		}
			
	}
}

if ( ! function_exists('logged_in'))
{
	//check if user is logged in
	function logged_in() {
		$_lava =& lava_instance();
		$_lava->call->library('auth');
		if($_lava->auth->is_logged_in())
			return true;
	}
}

if ( ! function_exists('get_user_id'))
{
	//get user id
	function get_user_id() {
		$_lava =& lava_instance();
		$_lava->call->library('auth');
		return $_lava->auth->get_user_id();
	}
}

if ( ! function_exists('get_username'))
{
	//get username
	function get_username($user_id) {
		$_lava =& lava_instance();
		$_lava->call->library('auth');
		return $_lava->auth->get_username($user_id);
	}
}

if ( ! function_exists('email_exist'))
{
	function email_exist($email) {
		$_lava =& lava_instance();
		$_lava->db->table('magicusers')->where('email', $email)->get();
		return ($_lava->db->row_count() > 0) ? true : false;
	}
}