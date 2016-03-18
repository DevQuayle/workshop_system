<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->lang->load('auth');
	}

	public function index()
	{
		if($this->ion_auth->is_admin())
		{
			$this->load->view('template/header');
			$this->load->view('admin/navigation');
			$this->load->view('admin/index');
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}

	public function showAllMechanics()
	{
		if($this->ion_auth->is_admin())
		{

			$this->load->view('template/header');
			$this->load->view('admin/navigation');
				
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['users'] = $this->ion_auth->users()->result();
			
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		
			$this->load->view('admin/showAllMechanics', $this->data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
	}
 
  public function noAccess()
  {
  	$this->load->view('template/header');
	$this->load->view('template/noAccess');
	
  }

  public function addMechanic()
  {
  	if($this->ion_auth->is_admin())
	{
	  	$this->load->view('template/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/addMechanic');
		$this->load->view('template/footer');
	}
	else
	{
		redirect('admin/noAccess','refresh');
	}
  }

  function smsSettings()
  {
  	if($this->ion_auth->is_admin())
	{
  		$this->load->model('settings');

   		$data['sms_settings'] = $this->settings->getSMSSettings();
   		$data['mail_settings'] = $this->settings->getMailSettings();

		$this->load->view('template/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/smsSettings', $data);
		$this->load->view('template/footer');
  	}
  	else
  	{
  		redirect('admin/noAccess','refresh');
  	}
  }

  function updateSMSSettings()
  {
  	if($this->ion_auth->is_admin())
	{
  		$this->load->model('settings');

  		$additional_data = array(
			'sms_api_login' => $this->input->post('sms_api_login'),
			'sms_api_password'  => $this->input->post('sms_api_password'),
			'sms_api_from'    => $this->input->post('sms_api_from'),
			'sms_finish_repair'      => $this->input->post('sms_finish_repair'),
			'sms_technical_exam'      => $this->input->post('sms_technical_exam'),
			'sms_notice'      => $this->input->post('sms_notice'),
			);
		$this->settings->updateSettings($additional_data);
		redirect('admin/smsSettings','refresh');
 	 }
 	 else
 	 {
 	 	redirect('admin/noAccess','refresh');
 	 }
 }


  function updateMailSettings()
  {
  	if($this->ion_auth->is_admin())
	{
  		$this->load->model('settings');

  		$additional_data = array(
			'mail_login' => $this->input->post('mail_login'),
			'mail_password'  => $this->input->post('mail_password'),
			'mail_smtp'    => $this->input->post('mail_smtp'),
			'mail_port'      => $this->input->post('mail_port'),
			'mail_finish_repair'      => $this->input->post('mail_finish_repair'),
			'mail_technical_exam'      => $this->input->post('mail_technical_exam'),
			'mail_notice'      => $this->input->post('mail_notice'),
			'mail_title_finish'      => $this->input->post('mail_title_finish'),
			'mail_title_exam'      => $this->input->post('mail_title_exam'),
			);
		$this->settings->updateSettings($additional_data);
		redirect('admin/smsSettings','refresh');
  }
  else
  {
  	redirect('admin/noAccess','refresh');
  }
}
  function mainSettings()
  {
  		if($this->ion_auth->is_admin())
		{
			$this->load->model('mechanic_m');

   			$data['service_settings'] = $this->mechanic_m->getServices();

			$this->load->view('template/header');
			$this->load->view('admin/navigation');
			$this->load->view('admin/mainSettings', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('admin/noAccess','refresh');
		}
  }


  function addService()
  {
  	$this->load->model('settings');

  	$additional_data = array(
  		'service_name' => $this->input->post('service_name'),
  		'service_likely_cost' => $this->input->post('service_likely_cost')
  		);

  	$this->settings->addService($additional_data);
  	redirect('admin/mainSettings','refresh');

  }
}



/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */