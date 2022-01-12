<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('notification_m','nm');
	}
}
