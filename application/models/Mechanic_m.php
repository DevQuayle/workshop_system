<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mechanic_m extends CI_Model {

	function getAllClients()
	{
		  $this->db->select('*');
    	$this->db->from('clients');

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

  function deleteClient($client_id)
  {
    $this->db->where('client_id', $client_id);
    $this->db->delete('clients'); 
  }

  function createClient($additional_data = array())
  {
    $this->db->insert('clients', $additional_data);
    $insert_id = $this->db->insert_id(); 
    return $insert_id;
  }

  function getClient($client_id)
  {
    $query = $this->db->get_where('clients', array('client_id' => $client_id));

    foreach ($query->result() as $row)
    {
     $data[] = $row;
    }
    return $data;
  }

  function updateClient($client_id, $additional_data = array())
  {
    $this->db->where('client_id', $client_id);
    $this->db->update('clients', $additional_data); 
  }

  function getClientCars($client_id)
  {
    $this->db->select('*');
    $this->db->from('cars');
    $this->db->join('clients_cars', 'cars.car_id = clients_cars.car_id');
    $this->db->where('clients_cars.client_id',$client_id);

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
    
  }

  function deleteCar($car_id)
  {
    $this->db->where('car_id', $car_id);
    $this->db->delete('cars');  
  }

  function createCar($client_id, $additional_data)
  {
    $this->db->insert('cars', $additional_data);
    $insert_id = $this->db->insert_id();

    $additional_data = array(
      'client_id' => $client_id,
      'car_id' => $insert_id,
      );
    $this->db->insert('clients_cars',$additional_data);
  }

  function getCar($car_id)
  {
    $query = $this->db->get_where('cars', array('car_id' => $car_id));

    foreach ($query->result() as $row)
    {
     $data[] = $row;
    }
    return $data;
  }

  function updateCar($car_id,$additional_data)
  {
    $this->db->where('car_id', $car_id);
    $this->db->update('cars', $additional_data); 
  }

  function getCarOwnerId($car_id)
  {
    $this->db->select('client_id');
    $query = $this->db->get_where('clients_cars', array('car_id' => $car_id), 1);
    foreach ($query->result() as $row)
    {
     $data = $row;
    }
    return $data;
  }

  function getClientRepairs($client_id)
  {
    $this->db->select('cars.car_model, cars.car_brand, cars.car_registration_number, cars.car_mileage, repairs.repair_id, repairs.repair_status, repairs.repair_date_start, repairs.repair_date_finish, repairs.repair_comment, users.first_name ,users.last_name');
    $this->db->from('cars');
    $this->db->join('repairs', 'cars.car_id = repairs.repair_car_id');
    $this->db->join('users', 'repairs.repair_mechanic_id = users.id');
    $this->db->where('repairs.repair_client_id',$client_id);

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
  }


  function getRepairCost($repair_id)
  {
      $this->db->select_sum('repair_service_cost','cost');
      $this->db->where('repair_service_repair_id', $repair_id);
      $query = $this->db->get('repair_services');
      if($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
  }

  function createRepair($additional_data)
  {
    $this->db->insert('repairs', $additional_data);
    $insert_id = $this->db->insert_id(); 
    return $insert_id;
  }

  function deleteRepair($repair_id)
  {
    $this->db->where('repair_id', $repair_id);
    $this->db->delete('repairs'); 
  }

  function getMechanic($mechanic_id)
  {
      $this->db->select('first_name, last_name, phone');
      $this->db->from('users');
      $this->db->where('id',$mechanic_id);

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

  function getRepairServices($repair_id)
  {
    $this->db->select('services.service_name, users.first_name, users.last_name,repair_services.repair_service_id, repair_services.repair_service_cost,repair_services.repair_service_other_service, repair_services.repair_service_comment');   
    $this->db->from('services');
    $this->db->join('repair_services','services.service_id = repair_services.repair_service_service_id');
    $this->db->join('users','repair_services.repair_service_mechanic_id = users.id');
    $this->db->where('repair_services.repair_service_repair_id',$repair_id);

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

  function getRepair($repair_id)
  {
    $this->db->from('repairs');
    $this->db->where('repair_id', $repair_id);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
  }

  function getServices()
  {
    $this->db->select('*');
    $this->db->from('services');

      $ambil = $this->db->get();
  
      if ($ambil->num_rows() > 0) 
      {
        foreach ($ambil->result() as $data) 
        {
           $hasil[] = $data;
        }

        //echo'<pre>'; print_r($hasil); echo'</pre>';
        return $hasil;
      }
  }

 function getServiceCost($service_id)
  {
    $this->db->select('service_likely_cost');
      $this->db->from('services');
      $this->db->where('service_id', $service_id);

      $ambil = $this->db->get();
  
      if ($ambil->num_rows() > 0) 
      {
        foreach ($ambil->result() as $data) 
        {
           $hasil[] = $data;
        }

        //echo'<pre>'; print_r($hasil); echo'</pre>';
        return $hasil;
      }
  }

  function addServiceToRepair($additional_data)
  {
      $this->db->insert('repair_services', $additional_data);
  }

  function deleteServiceFromRepair($repair_service_id)
  {
    $this->db->where('repair_service_id', $repair_service_id);
    $this->db->delete('repair_services'); 
  }

  function finishRepair($repair_id, $finish_date)
  {
    $additional_data = array(
                        'repair_date_finish' => $finish_date,
                        'repair_status'=> 'ZAKOŃCZONO'
      );
    $this->db->where('repair_id', $repair_id);
    $this->db->update('repairs', $additional_data); 
  }

  function unlockRepair($repair_id)
  {
    $additional_data = array(
                        'repair_date_finish' => NULL,
                        'repair_status'=> 'W TRAKCIE'
      );
    $this->db->where('repair_id', $repair_id);
    $this->db->update('repairs', $additional_data); 
  }

  function getCurrentRepairs($txt = '')
  {
   /* $this->db->select('clients.client_name, clients.client_surname, clients.client_id, cars.car_model, cars.car_brand, cars.car_registration_number, cars.car_mileage, repairs.repair_id, repairs.repair_status, repairs.repair_date_start, repairs.repair_date_finish, repairs.repair_comment, users.first_name ,users.last_name');
    $this->db->from('cars');
    $this->db->join('repairs', 'cars.car_id = repairs.repair_car_id');
    $this->db->join('users', 'repairs.repair_mechanic_id = users.id');
    $this->db->join('clients','repairs.repair_client_id = clients.client_id');
    $this->db->where('repairs.repair_status','W TRAKCIE');
*/
    if($txt != ''){
       $this->db->where('client_name LIKE', '%'.$txt.'%');
       $this->db->or_where('client_surname LIKE', '%'.$txt.'%');
       $this->db->or_where('car_registration_number LIKE', '%'.$txt.'%');
       $this->db->or_where('repair_date_start LIKE', '%'.$txt.'%');
    }
     
    
    $this->db->select('*');
    $this->db->from('currentrepairs');

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
        $data[] = $row;
      }
      return $data;

    }  
  }

  function getFinishRepairs($txt = '')
  {
    /*
    $this->db->select('clients.client_id, clients.client_name, clients.client_surname,cars.car_model, cars.car_brand, cars.car_registration_number, cars.car_mileage, repairs.repair_id, repairs.repair_status, repairs.repair_date_start, repairs.repair_date_finish, repairs.repair_comment, users.first_name ,users.last_name');
    $this->db->from('cars');
    $this->db->join('repairs', 'cars.car_id = repairs.repair_car_id');
    $this->db->join('users', 'repairs.repair_mechanic_id = users.id');
    $this->db->join('clients','repairs.repair_client_id = clients.client_id');
    $this->db->where('repairs.repair_status','ZAKOŃCZONO');
*/

     if($txt != ''){
       $this->db->where('client_name LIKE', '%'.$txt.'%');
       $this->db->or_where('client_surname LIKE', '%'.$txt.'%');
       $this->db->or_where('car_registration_number LIKE', '%'.$txt.'%');
       $this->db->or_where('repair_date_start LIKE', '%'.$txt.'%');
       $this->db->or_where('repair_date_finish LIKE', '%'.$txt.'%');
    }

    $this->db->select('*');
    $this->db->from('finishrepairs');
    
    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
        $data[] = $row;
      }
      return $data;

    }  
  }

  function updateServiceFromRepair($service_id, $additional_data = array())
  {
    $this->db->where('repair_service_id', $service_id);
    $this->db->update('repair_services', $additional_data); 
  }


}

/*SELECT services.service_name, repair_services.repair_service_cost, repair_services.repair_service_comment FROM services  JOIN repair_services ON  services.service_id = repair_services.repair_service_service_id Where repair_services.repair_service_repair_id = 7
*/
/*  SELECT * FROM cars LEFT JOIN clients_cars ON cars.car_id = clients_cars.car_id Where clients_cars.client_id =7 */
/*SELECT cars.car_model, cars.car_brand, cars.car_registration_number, cars.car_mileage, repairs.repair_date_start, users.first_name ,users.last_name FROM cars LEFT JOIN repairs ON cars.car_id = repairs.repair_car_id LEFT JOIN users ON repairs.repair_mechanic_id = users.id WHERE repairs.repair_client_id = 4 */
/* End of file Mechanic_m.php */
/* Location: ./application/models/Mechanic.php */