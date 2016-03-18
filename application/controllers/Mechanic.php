<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mechanic extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->lang->load('auth');
		$this->load->model('mechanic_m');
		
	}
	public function index()
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->showAllClients();
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}
	public function showAllClients()
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			
			$data['get_data'] = $this->mechanic_m->getAllClients();
			$this->load->view('template/header');
			$this->load->view('mechanic/navigation');
			$this->load->view('mechanic/showAllClients', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}
	public function deleteClient($client_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/noAccess','refresh');
		}
		if ($this->input->post('confirm') == 'yes')
		{
			if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('mechanik'))
			{
				$this->mechanic_m->deleteClient($client_id);
			}
		}
		redirect('mechanic/showAllClients', 'refresh');
	}
	public function addClient()
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('client_name', 'Imie', 'required');
			$this->form_validation->set_rules('client_surname', 'Nazwisko', 'required');
			$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/addClient');
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
				'client_name' => $this->input->post('client_name'),
				'client_surname'  => $this->input->post('client_surname'),
				'client_street'    => $this->input->post('client_street'),
				'client_house_number'      => $this->input->post('client_house_number'),
				'client_local_number'      => $this->input->post('client_local_number'),
				'client_post_code'      => $this->input->post('client_post_code'),
				'client_postoffice'      => $this->input->post('client_postoffice'),
				'client_phone_number'      => $this->input->post('client_phone_number'),
				'client_mail_address'      => $this->input->post('client_mail_address'),
				'client_sms_notice'      => $this->input->post('client_sms_notice'),
				'client_mail_notice'      => $this->input->post('client_mail_notice'),
				'client_comment'      => $this->input->post('client_comment'),
				);
				
				$client_id = $this->mechanic_m->createClient($additional_data);
				redirect('mechanic/showClient'.'/'.$client_id,'refresh');
			}
			
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}
	public function showClient($client_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$data['client_data'] = $this->mechanic_m->getClient($client_id);
			$data['car_data'] = $this->mechanic_m->getClientCars($client_id);
			$data['repair_data'] = $this->mechanic_m->getClientRepairs($client_id);
			

			$this->load->view('template/header');
			$this->load->view('mechanic/navigation');
			$this->load->view('mechanic/showClient',$data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}
	public function editClient($client_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('client_name', 'Imie', 'required');
			$this->form_validation->set_rules('client_surname', 'Nazwisko', 'required');
			$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['get_data'] = $this->mechanic_m->getClient($client_id);
				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/editClient',$data);
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
				'client_name' => $this->input->post('client_name'),
				'client_surname'  => $this->input->post('client_surname'),
				'client_street'    => $this->input->post('client_street'),
				'client_house_number'      => $this->input->post('client_house_number'),
				'client_local_number'      => $this->input->post('client_local_number'),
				'client_post_code'      => $this->input->post('client_post_code'),
				'client_postoffice'      => $this->input->post('client_postoffice'),
				'client_phone_number'      => $this->input->post('client_phone_number'),
				'client_mail_address'      => $this->input->post('client_mail_address'),
				'client_sms_notice'      => $this->input->post('client_sms_notice'),
				'client_mail_notice'      => $this->input->post('client_mail_notice'),
				'client_comment'      => $this->input->post('client_comment'),
				);

				$this->mechanic_m->updateClient($client_id,$additional_data);
				redirect('mechanic/showClient'.'/'.$client_id,'refresh');
			}
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}


	public function deleteCar($car_id,$client_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/noAccess','refresh');
		}
		if ($this->input->post('confirm') == 'yes')
		{
			if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('mechanik'))
			{
				$this->mechanic_m->deleteCar($car_id);
			}
		}
		redirect('mechanic/showClient'.'/'.$client_id, 'refresh');
	}

	public function addCar($client_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('car_model', 'Model', 'required');
			$this->form_validation->set_rules('car_brand', 'Marka', 'required');
			//$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['client_data'] = $client_id;
				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/addCar',$data);
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
				'car_model' => strtoupper($this->input->post('car_model')),
				'car_brand'  => strtoupper($this->input->post('car_brand')),
				'car_production_year'    => $this->input->post('car_production_year'),
				'car_registration_number'      => $this->input->post('car_registration_number'),
				'car_mileage'      => $this->input->post('car_mileage'),
				'car_vin_number'      => $this->input->post('car_vin_number'),
				'car_engine_capacity'      => $this->input->post('car_engine_capacity'),
				'car_fuel_type'      => $this->input->post('car_fuel_type'),
				'car_power'      => $this->input->post('car_power'),
				'car_next_technical_examination'      => $this->input->post('car_next_technical_examination'),
				'car_comment'      => $this->input->post('car_comment'),
				);

				$this->mechanic_m->createCar($client_id,$additional_data);
				// tu przejście do edytowanego samochodu albo do klienta 
				redirect('mechanic/showClient'.'/'.$client_id,'refresh');
			}
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}

	public function showCar($car_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$data['car_data'] = $this->mechanic_m->getCar($car_id);

			$this->load->view('template/header');
			$this->load->view('mechanic/navigation');
			$this->load->view('mechanic/showCar',$data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}

	public function editCar($car_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('car_model', 'Model', 'required');
			$this->form_validation->set_rules('car_brand', 'Marka', 'required');
			//$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['car_data'] = $this->mechanic_m->getCar($car_id);
				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/editCar',$data);
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
				'car_model' => strtoupper($this->input->post('car_model')),
				'car_brand'  => strtoupper($this->input->post('car_brand')),
				'car_production_year'    => $this->input->post('car_production_year'),
				'car_registration_number'      => $this->input->post('car_registration_number'),
				'car_mileage'      => $this->input->post('car_mileage'),
				'car_vin_number'      => $this->input->post('car_vin_number'),
				'car_engine_capacity'      => $this->input->post('car_engine_capacity'),
				'car_fuel_type'      => $this->input->post('car_fuel_type'),
				'car_power'      => $this->input->post('car_power'),
				'car_next_technical_examination'      => $this->input->post('car_next_technical_examination'),
				'car_comment'      => $this->input->post('car_comment'),
				);

				$this->mechanic_m->updateCar($car_id,$additional_data);
				$client = $this->mechanic_m->getCarOwnerId($car_id);

				// tu przejście do edytowanego samochodu albo do klienta 
				redirect('mechanic/showClient'.'/'.$client->client_id,'refresh');
			}
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}


	public function addRepair($client_id, $car_id, $mechanic_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('repair_date_start', 'Data rozpoczęcia', 'required');
			
			//$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['client_data'] = $this->mechanic_m->getClient($client_id);
				$data['car_data'] = $this->mechanic_m->getCar($car_id);

				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/addRepair',$data);
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
					'repair_mechanic_id' => $mechanic_id,
					'repair_client_id'  => $client_id,
					'repair_car_id'    => $car_id,
					'repair_date_start'      => $this->input->post('repair_date_start'),
					'repair_comment'      => $this->input->post('repair_comment'),
					'repair_status'      => "W TRAKCIE",
				);

				$this->mechanic_m->createRepair($additional_data);

				$additional_data2 = array(
					'car_mileage' => $this->input->post('car_mileage'),
					'car_next_technical_examination' => $this->input->post('car_next_technical_examination'),
				);
				$this->mechanic_m->updateCar($car_id, $additional_data2);
				//TODO przejście do pokazania zlecenia
				redirect('mechanic/showClient'.'/'.$client_id,'refresh');
			}
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}

	public function deleteRepair($repair_id,$client_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/noAccess','refresh');
		}
		if ($this->input->post('confirm') == 'yes')
		{
			if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('mechanik'))
			{
				$this->mechanic_m->deleteRepair($repair_id);
			}
		}
		redirect('mechanic/showClient'.'/'.$client_id, 'refresh');
	}


	public function showRepair($repair_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$data['repair_data'] = $this->mechanic_m->getRepair($repair_id);
			$data['client_data'] = $this->mechanic_m->getClient($data['repair_data'][0]->repair_client_id);
			$data['car_data'] = $this->mechanic_m->getCar($data['repair_data'][0]->repair_car_id);
			$data['repair_services_data'] = $this->mechanic_m->getRepairServices($repair_id);
			


		
			$this->load->view('template/header');
			$this->load->view('mechanic/navigation');
			$this->load->view('mechanic/showRepair', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}

	public function addServiceToRepair($repair_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('repair_service_service_id', 'Usługa', 'required');
			
			//$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['mechanic_data'] = $this->mechanic_m->getMechanic($this->session->user_id);
				$data['services'] = $this->mechanic_m->getServices();

				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/addServiceToRepair',$data);
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
				'repair_service_repair_id' => $repair_id,
				'repair_service_service_id'  => $this->input->post('repair_service_service_id'),
				'repair_service_other_service'    => $this->input->post('repair_service_other_service'),
				'repair_service_mechanic_id'      => $this->input->post('repair_service_mechanic_id'),
				'repair_service_cost'      => $this->input->post('repair_service_cost'),
				'repair_service_comment'      => $this->input->post('repair_service_comment'),
				);

				$this->mechanic_m->addServiceToRepair($additional_data);
				redirect('mechanic/showRepair'.'/'.$repair_id,'refresh');
			}
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}	
	}

	public function showServiceCost($service_id)
	{
		if($service_id == 'other'){
			echo'<div class="col-lg-3"></div>
			<label class="control-label col-lg-2">Koszt [zł]: </label>
			<div class="col-lg-5" >
			<input class="form-control" type="text"  name="repair_service_cost" value="" >
			</div>';
		}
		else
		{


		$cost = $this->mechanic_m->getServiceCost($service_id);
		
		echo'<div class="col-lg-3"></div>
			<label class="control-label col-lg-2" for="mechanic_id">Koszt [zł]: </label>
			<div class="col-lg-5" >
			<input class="form-control" type="text"  name="repair_service_cost" value="'.$cost[0]->service_likely_cost.'" >
			</div>';
			}				
	}

	public function deleteServiceFromRepair($repair_service_id, $repair_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/noAccess','refresh');
		}
		if ($this->input->post('confirm') == 'yes')
		{
			if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('mechanik'))
			{
				$this->mechanic_m->deleteServiceFromRepair($repair_service_id);
			}
		}
		redirect('mechanic/showRepair/'.$repair_id, 'refresh');
	}

	public function getRepairCost($repair_id)
	{
		$cost = $this->mechanic_m->getRepairCost($repair_id);

		echo $cost[0]->cost;
	}

	public function finishRepair($repair_id)
	{ 
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/noAccess','refresh');
		}
		if ($this->input->post('confirm') == 'yes')
		{
			if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('mechanik'))
			{
				$this->mechanic_m->finishRepair($repair_id,$this->input->post('finish_date'));
			}
		}
		redirect('mechanic/showRepair/'.$repair_id, 'refresh');
	}

	public function unlockRepair($repair_id)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/noAccess','refresh');
		}
		if ($this->input->post('confirm') == 'yes')
		{
			if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('mechanik'))
			{
				$this->mechanic_m->unlockRepair($repair_id);
			}
		}
		redirect('mechanic/showRepair/'.$repair_id, 'refresh');
	}

	public function editServiceFromRepair($service_id)
	{
		if($this->ion_auth->in_group('mechanik'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('repair_service_service_id', 'Usługa', 'required');
			
			//$this->form_validation->set_rules('client_email_address', 'Email', 'valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['repair_services'] = $this->mechanic_m->getRepairServices($service_id);
				$data['mechanic_data'] = $this->mechanic_m->getMechanic($this->session->user_id);
				$data['services'] = $this->mechanic_m->getServices();


				$this->load->view('template/header');
				$this->load->view('mechanic/navigation');
				$this->load->view('mechanic/editServiceFromRepair',$data);
				$this->load->view('template/footer');
			}
			else
			{
				$additional_data = array(
				'repair_service_service_id'  => $this->input->post('repair_service_service_id'),
				'repair_service_other_service'    => $this->input->post('repair_service_other_service'),
				'repair_service_mechanic_id'      => $this->input->post('repair_service_mechanic_id'),
				'repair_service_cost'      => $this->input->post('repair_service_cost'),
				'repair_service_comment'      => $this->input->post('repair_service_comment'),
				);

				$this->mechanic_m->updateServiceFromRepair($service_id,$additional_data);
				//TODO przejście do pokazania zlecenia
				echo'<script>javascript: history.go(-2);
				</script>';
			}
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}	
	}

	public function showCurrentRepairs()
	{
		$data['repairs_data'] = $this->mechanic_m->getCurrentRepairs();

		$this->load->view('template/header');
		$this->load->view('mechanic/navigation');
		$this->load->view('mechanic/showCurrentRepairs', $data);
		$this->load->view('template/footer');
	}

	public function showFinishRepairs()
	{
		$data['repairs_data'] = $this->mechanic_m->getFinishRepairs();

		$this->load->view('template/header');
		$this->load->view('mechanic/navigation');
		$this->load->view('mechanic/showFinishRepairs', $data);
		$this->load->view('template/footer');
	}


	function sendSms($to='', $message = '')
	{
		$this->load->model('settings');
		$data = $this->settings->getSMSSettings();
			
		
		if($data[5]->value === 'TAK'){
					$params = array(
				 		'username' => $data[0]->value, //login z konta SMSAPI
				 		'password' => md5($data[1]->value), //lub 'password' => md5('haslo-otwarty_text'),
				 		'to' => $to, //numer odbiorcy
				 		'from' => $data[2]->value, //nazwa nadawcy musi być aktywna
				 		'message' => '', //treść wiadomości
				 		//'test' => '1',
					);	
							
					if($message == 'fr') // koniec naprawy
						$params['message'] = $data[3]->value; 
					elseif ($message == 'te') // przeglad
						$params['message'] = $data[4]->value;
					else
						$params['message'] = $message;
				
					
					if ($params['username'] && $params['password'] && $params['to'] && $params['message']) 
					{
				 		
				 		$data = '?'.http_build_query($params);
				 		$plik = fopen('https://api.smsapi.pl/sms.do'.$data,'r');
				 		$wynik = fread($plik,1024);
				 		fclose($plik);
				 		echo $data;
				 		if(strpos($wynik, "OK") == "OK"){
				 			echo 'SMS WYSŁANY !!!';
				 			echo ('<script> javascript: history.go(-1); </script>');
				 		}
				 		if(strpos($wynik, "ERROR") == "ERROR")
				 		{
				 			echo "Wystapił bład !!! <br> Kody błędów możesz sprawdzić <a target='_blank' href='https://www.smsapi.pl/statusy-wiadomosci'> TU </a> <br>";
				 			echo $wynik;
				 		}
					}
				}
				else
				{
					echo "POWIADOMIENIA SMS WYŁĄCZONE<br>";
					echo'<a href="javascript: history.go(-1)">Powrót</a>';
				}
			}


	function sendMail($to = 'krol.slawek1@gmail.com' ,$message ='')
	{
		$this->load->model('settings');
		$data = $this->settings->getMailSettings();
				
		$config['smtp_user'] = $data[0]->value;
		$config['smtp_pass'] = $data[1]->value;
		$config['smtp_host'] = $data[2]->value;
		$config['smtp_port'] = $data[3]->value;
		$config['protocol'] = 'smtp';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		
		if($message == 'fr') {// koniec naprawy
			$title_to_send = $data[7]->value;
			$message_send = $data[4]->value; 
		}
		elseif ($message == 'te'){ // przeglad
			$title_to_send = $data[8]->value;
			$message_send = $data[5]->value;
		}
		else{
			$title_to_send = $data[9]->value;
			$message_send = $message;
		}
				
		$this->email->initialize($config);
		$this->load->library('email');
	
		$this->email->from($data[0]->value, $data[0]->value);
		$this->email->to($to); 
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	
		
		$this->email->send();
	}

	function searchCurrentRepairs($txt='')
	{
		if($txt == '')
		{

			$repairs_data = $this->mechanic_m->getCurrentRepairs();			
			$result = '';
			$result .= '<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
								<tbody>
									<tr>
										<th style="text-align:center;"> Klient</th>
										<th style="text-align:center;"> Data rozpoczęcia</th>
										<th style="text-align:center;">  Marka</th>
										<th style="text-align:center;"> Model</th>
										<th style="text-align:center;"> Nr rej/Przebieg</th>
										<th style="text-align:center;"> Wprowadził</th>
										<th style="text-align:center;"> Opis</th>
										<th style="text-align:center;"> Status</th>
										<th class="akcja" style="text-align:center;"> Akcja</th>
									</tr>
									<tr>';
			if(!isset($repairs_data) || $repairs_data == NULL)
				$result .= '<td colspan="8" style="text-align:center;">Nie znaleziono</td>' ;
			else
				foreach ($repairs_data as $repair):
					if(isset($repair->repair_date_finish) || $repair->repair_status == 'ZAKOŃCZONO') continue; 
					
					$url = site_url('mechanic/showClient').'/'.$repair->client_id;
					$urlName = $repair->client_name .' '. $repair->client_surname;
					
					$result .=	'<td><a href="'.$url.'">'.$urlName.'</a></td>';								
					$result .=  ("<td>".$repair->repair_date_start."</td>
								  <td>".$repair->car_brand."</td>
								  <td>".$repair->car_model."</td>
								  <td>".$repair->car_registration_number.'<br>'.$repair->car_mileage."</td>
								  <td>".$repair->first_name .' '. $repair->last_name."</a></td>
								  <td>".$repair->repair_comment."</a></td>
								  <td >".$repair->repair_status."</td>");	
					$urlRepair = site_url('mechanic/showRepair').'/'.$repair->repair_id;
					$result .= '<td class="akcja"><button data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>
									<a class="btn btn-success" href="'.$urlRepair.'"><i class="fa fa-eye"> </i></a>
								';		
					$result .= '</td>
									</tr>';					
				endforeach;
				$result .= '</tbody>
							</table>';

				echo $result;
		}
		else
		{ 
			$repairs_data = $this->mechanic_m->getCurrentRepairs($txt);
					
			$result = '';
			$result .= '<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
								<tbody>
									<tr>
										<th style="text-align:center;"> Klient</th>
										<th style="text-align:center;"> Data rozpoczęcia</th>
										<th style="text-align:center;">  Marka</th>
										<th style="text-align:center;"> Model</th>
										<th style="text-align:center;"> Nr rej/Przebieg</th>
										<th style="text-align:center;"> Wprowadził</th>
										<th style="text-align:center;"> Opis</th>
										<th style="text-align:center;"> Status</th>
										<th class="akcja" style="text-align:center;"> Akcja</th>
									</tr>
									<tr>';
			if(!isset($repairs_data) || $repairs_data == NULL)
				$result .= '<td colspan="8" style="text-align:center;">Nie znaleziono</td>' ;
			else
				foreach ($repairs_data as $repair):
					if(isset($repair->repair_date_finish) || $repair->repair_status == 'ZAKOŃCZONO') continue; 
					
					$url = site_url('mechanic/showClient').'/'.$repair->client_id;
					$urlName = $repair->client_name .' '. $repair->client_surname;
					
					$result .=	'<td><a href="'.$url.'">'.$urlName.'</a></td>';								
					$result .=  ("<td>".$repair->repair_date_start."</td>
								  <td>".$repair->car_brand."</td>
								  <td>".$repair->car_model."</td>
								  <td>".$repair->car_registration_number.'<br>'.$repair->car_mileage."</td>
								  <td>".$repair->first_name .' '. $repair->last_name."</a></td>
								  <td>".$repair->repair_comment."</a></td>
								  <td >".$repair->repair_status."</td>");	
					$urlRepair = site_url('mechanic/showRepair').'/'.$repair->repair_id;
					$result .= '<td class="akcja"><button data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>
									<a class="btn btn-success" href="'.$urlRepair.'"><i class="fa fa-eye"> </i></a>
								';		
					$result .= '</td>
									</tr>';					
				endforeach;
				$result .= '</tbody>
							</table>';

				echo $result;
		}
	}

	function searchFinishRepairs($txt='')
	{
		if($txt == '')
		{

			$repairs_data = $this->mechanic_m->getFinishRepairs();			
			$result = '';
			$result .= '<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
								<tbody>
									<tr>
										<th style="text-align:center;"> Klient</th>
										<th style="text-align:center;"> Data rozpoczęcia</th>
										<th style="text-align:center;">  Marka</th>
										<th style="text-align:center;"> Model</th>
										<th style="text-align:center;"> Nr rej/Przebieg</th>
										<th style="text-align:center;"> Wprowadził</th>
										<th style="text-align:center;"> Opis</th>
										<th style="text-align:center;"> Status</th>
										<th class="akcja" style="text-align:center;"> Akcja</th>
									</tr>
									<tr>';
			if(!isset($repairs_data) || $repairs_data == NULL)
				$result .= '<td colspan="8" style="text-align:center;">Nie znaleziono</td>' ;
			else
				foreach ($repairs_data as $repair):
					if(!isset($repair->repair_date_finish) || $repair->repair_status == 'W TRAKCIE') continue; 
					
					$url = site_url('mechanic/showClient').'/'.$repair->client_id;
					$urlName = $repair->client_name .' '. $repair->client_surname;
					
					$result .=	'<td><a href="'.$url.'">'.$urlName.'</a></td>';								
					$result .=  ("<td>".$repair->repair_date_start."</td>
								  <td>".$repair->car_brand."</td>
								  <td>".$repair->car_model."</td>
								  <td>".$repair->car_registration_number.'<br>'.$repair->car_mileage."</td>
								  <td>".$repair->first_name .' '. $repair->last_name."</a></td>
								  <td>".$repair->repair_comment."</a></td>
								  <td>".$repair->repair_date_finish.'<br>'.$repair->repair_status."</td>");	
					$urlRepair = site_url('mechanic/showRepair').'/'.$repair->repair_id;
					$result .= '<td class="akcja"><button data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>
									<a class="btn btn-success" href="'.$urlRepair.'"><i class="fa fa-eye"> </i></a>
								';		
					$result .= '</td>
									</tr>';					
				endforeach;
				$result .= '</tbody>
							</table>';

				echo $result;
		}
		else
		{ 
			$repairs_data = $this->mechanic_m->getFinishRepairs($txt);

			$result = '';
			$result .= '<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
								<tbody>
									<tr>
										<th style="text-align:center;"> Klient</th>
										<th style="text-align:center;"> Data rozpoczęcia</th>
										<th style="text-align:center;">  Marka</th>
										<th style="text-align:center;"> Model</th>
										<th style="text-align:center;"> Nr rej/Przebieg</th>
										<th style="text-align:center;"> Wprowadził</th>
										<th style="text-align:center;"> Opis</th>
										<th style="text-align:center;"> Status</th>
										<th class="akcja" style="text-align:center;"> Akcja</th>
									</tr>
									<tr>';
			if(!isset($repairs_data) || $repairs_data == NULL)
				$result .= '<td colspan="8" style="text-align:center;">Nie znaleziono</td>' ;
			else
				foreach ($repairs_data as $repair):
					if(!isset($repair->repair_date_finish) || $repair->repair_status == 'W TRAKCIE') continue; 
					
					$url = site_url('mechanic/showClient').'/'.$repair->client_id;
					$urlName = $repair->client_name .' '. $repair->client_surname;
					
					$result .=	'<td><a href="'.$url.'">'.$urlName.'</a></td>';								
					$result .=  ("<td>".$repair->repair_date_start."</td>
								  <td>".$repair->car_brand."</td>
								  <td>".$repair->car_model."</td>
								  <td>".$repair->car_registration_number.'<br>'.$repair->car_mileage."</td>
								  <td>".$repair->first_name .' '. $repair->last_name."</a></td>
								  <td>".$repair->repair_comment."</a></td>
								  <td >".$repair->repair_date_finish.'<br>'.$repair->repair_status."</td>");	
					$urlRepair = site_url('mechanic/showRepair').'/'.$repair->repair_id;
					$result .= '<td class="akcja"><button data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>
									<a class="btn btn-success" href="'.$urlRepair.'"><i class="fa fa-eye"> </i></a>
								';		
					$result .= '</td>
									</tr>';					
				endforeach;
				$result .= '</tbody>
							</table>';

				echo $result;
		}
	}
}
/*
	public function index(){
			if ($this->session->userdata('uprawnienia') == 'A'){
				$this->load->model('usersmodel');
				$this->load->library('pagination');
				$result = $this->usersmodel->wyswietlUserow();
				if ($result == NULL){
					$tablica = array('info' => 'brak_userow', 'option' => 'users');
					$this->load->view('main', $tablica);
				} else {
					$tablica = array('option' => 'users', 'wynik' => $result);
						$this->load->view('main', $tablica);
				}
			} else {
				$tablica = array('error' => 'access');
				$this->load->view('main', $tablica);
			}
		}
		*/