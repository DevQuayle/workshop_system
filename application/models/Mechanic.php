<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mechanic_m extends CI_Model {

	function getAllClients()
	{
		$this->db->select('*');
    	$this->db->from('clients');
    	$this->db->limit($limit, $offset);

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
}

/* End of file Mechanic.php */
/* Location: ./application/models/Mechanic.php */