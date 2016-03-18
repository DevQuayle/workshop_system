<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	
	function __construct() {
		parent::__construct();
		$this->lang->load('auth');
	}
	public function index()
	{

		if(!$this->ion_auth->logged_in())
		{
			// GUEST - gość nie zalogowany
			$this->load->view('template/header');
			$this->load->view('guest/index');
			$this->load->view('template/footer');
		}
		elseif (!$this->ion_auth->is_admin() && $this->ion_auth->in_group('mechanik')) 
		{
			// mechanik - osoba mogca dopisywać klientów i naprawy 
			redirect('mechanic','refresh');
		}
		elseif (!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members')) 
		{
			// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
			$this->load->view('template/header');
			$this->load->view('main_members/navigation');
			$this->load->view('main_members/index');
			$this->load->view('template/footer');
		}
		else 
		{
			// ADMIN - osoba zarzdzajca użytkownikami 
			redirect('admin/index','refresh');
			
		}
		
	}
}
