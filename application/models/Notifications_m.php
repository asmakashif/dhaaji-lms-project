<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// public function get_table()
	// {
	// 	$table = 'notifications';
	// 	return $table;
	// }

	// public function get_notifications()
	// {
	// 	$table = $this->get_table();
	// 	$query=$this->db->get($table);
	// 	return $query;
	// }
    public function get_notifications()
	{
		$query = $this->db->query("SELECT * FROM user_notification ORDER BY NotificationID DESC LIMIT 3");
        $notification = $query->result_array();
        return $notification;
	}

// 	public function get_notifications()
// 	{
// 		$this->db->select('*');
// 		$this->db->from('user_notification');//table name
// 		$notification=$this->db->get()->result();
// 		return $notification;
// 	}

	public function addNotification($nd)
	{
		$this->db->insert('user_notification', $nd);
		return $this->db->insert_id();
	}
}
