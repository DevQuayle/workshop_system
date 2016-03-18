<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Model {

	function getSMSSettings(){
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('setting_group','sms');

		$ambil = $this->db->get();
  
  		if ($ambil->num_rows() > 0) 
  		{
  			foreach ($ambil->result() as $data) 
   			{
     			 $hasil[] = $data;
   			}
   			return $hasil;
  		}
	}

	function getMailSettings(){
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('setting_group','mail');

		$ambil = $this->db->get();
  
  		if ($ambil->num_rows() > 0) 
  		{
  			foreach ($ambil->result() as $data) 
   			{
     			 $hasil[] = $data;
   			}
   			return $hasil;
  		}
	}

	function updateSettings($additional_data = array())
	{	
		foreach ($additional_data as $key => $value) {
			$this->db->where('name', $key);
    		$this->db->update('settings', array('value' => $value));
		}
	}

	
	function addService($additional_data)
	{
		$this->db->insert('services', $additional_data);
	}

	function updateService($additional_data)
	{
		$this->db->where('service_id', $key);
    	$this->db->update('settings', array('value' => $value));
	}
}

/* End of file Settings */
/* Location: ./application/models/Settings */