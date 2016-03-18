<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->lang->load('auth');
		$this->load->model('mcrud');
		
		
	}

	public function showAll()
	{
		
		$user = $this->ion_auth->user()->row();

		if(!$this->ion_auth->logged_in())
		{
			// GUEST - gość nie zalogowany
			$this->load->view('template/header');
			$this->load->view('guest/navigation');
			$this->load->view('guest/index');
			$this->load->view('template/footer');
		}
		elseif (!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members')) 
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			$this->load->library('pagination');
			$config['per_page'] = 20; 
			$config['total_rows'] = $this->mcrud->countMyCustomers($user->id);
			
			
			$this->pagination->initialize($config); 

			$data['data_get'] = $this->mcrud->view($config['per_page'], $this->uri->segment(3),$user->id);

			$this->load->view('template/header');
  			$this->load->view('members/navigation');
  			$this->load->view('members/vcrud', $data);
  			$this->load->view('template/footer');
  			
		}
		elseif (!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members')) 
		{
			// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
			
			$this->load->library('pagination');
			$config['per_page'] = 20; 
			$config['total_rows'] = $this->mcrud->countCustomers();
			
			
			$this->pagination->initialize($config); 

			
			$data['data_get'] = $this->mcrud->viewAll($config['per_page'], $this->uri->segment(3));
			
			
			$this->load->view('template/header');
			$this->load->view('main_members/navigation');
			$this->load->view('main_members/vcrud', $data);
			$this->load->view('template/footer');
		}
		else 
		{
			// ADMIN - osoba zarzdzajca użytkownikami 
			$this->load->view('template/header');
			$this->load->view('admin/navigation');

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->load->view('admin/index', $this->data);
			$this->load->view('template/footer');
		}
		
	}


	function search()
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{

			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			$this->load->library('pagination');
			$config['per_page'] = 99999999; 
			//$config['total_rows'] = $this->mcrud->countMyCustomers($user->id);
			
			$this->pagination->initialize($config); 

			$data['data_get'] = $this->mcrud->search($user->id);

			$this->load->view('template/header');
  			$this->load->view('members/navigation');
  			$this->load->view('members/vcrud', $data);
  			$this->load->view('template/footer');
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		$this->load->library('pagination');
			$config['per_page'] = 9999999; 
			//$config['total_rows'] = 999999999999999999999999;// $this->mcrud->countMyCustomers($user->id);
			//$config['base_url'] = '/ubezpieczenia/customers/search';


			$this->pagination->initialize($config); 
			$data['data_get'] = $this->mcrud->searchInAll();

			$this->load->view('template/header');
  			$this->load->view('main_members/navigation');
  			$this->load->view('main_members/vcrud', $data);
  			$this->load->view('template/footer');
	  	}
	}

	function add() 
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			$data['data_get'] = $this->mcrud->showAllProducts();
			$this->load->view('template/header');
			$this->load->view('members/navigation');
		 	$this->load->view('members/vcrudnew',$data);
	  		$this->load->view('template/footer');
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		$data['data_get'] = $this->mcrud->showAllProducts();
	  		$this->load->view('template/header');
			$this->load->view('main_members/navigation');
		 	$this->load->view('main_members/vcrudnew', $data);
	  		$this->load->view('template/footer');
	  	}
	 }
	
	function save() 
	{
  		if ($this->input->post('mit'))
  		{
   			$this->mcrud->add();
   			redirect('customers/showAll');
  		} 
  		else
  		{
   			redirect('ccrud/tambah');
  		}
 	}


	function delete() 
	{
		$u = $this->uri->segment(3);
		$this->mcrud->delete($u);
		redirect('customers/showAll');
 	}

	function report()
	{
 		$u = $this->uri->segment(3);
  		$this->mcrud->generateReport($u);
  		redirect('customers/showAll');
	}


	public function products()
 	{
 		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			redirect('customers/showAll','refresh');  // normalny użytkownik nie ma dostepu
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		$data['data_get'] = $this->mcrud->showAllProducts();

			$this->load->view('template/header');
  			$this->load->view('main_members/navigation');
  			$this->load->view('main_members/showAllProducts', $data);
  			$this->load->view('template/footer');
	  	}
	}

	public function deleteProduct()
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			redirect('customers/showAll','refresh');  // normalny użytkownik nie ma dostepu
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
   			$u = $this->uri->segment(3);
 			$this->mcrud->deleteProduct($u);
 			redirect('customers/products');
 		}
	}


public function addProduct() 
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			redirect('customers/showAll','refresh');
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		$this->load->view('template/header');
			$this->load->view('main_members/navigation');
		 	$this->load->view('main_members/addProduct');
	  		$this->load->view('template/footer');
	  	}
	 }


	function saveProduct() 
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			redirect('customers/showAll','refresh');
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		if ($this->input->post('mit'))
	  		{
	   			$this->mcrud->addProduct();
	   			redirect('customers/products');
	  		}
  		}
	}


	 function editProduct() 
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			redirect('customers/showAll','refresh');
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		$kd = $this->uri->segment(3);
			if ($kd == NULL) 
			{
				redirect('customers/products');
			} 
			else 
			{
				$dt = $this->mcrud->editProduct($kd);
				$data['id'] = $dt->id;
	 			$data['product_name'] = $dt->product_name;
	 			$data['if_required'] = $dt->if_required;

				$this->load->view('template/header');
				$this->load->view('main_members/navigation');
			 	$this->load->view('main_members/editProduct', $data);
		  		$this->load->view('template/footer');
		  	}
	  	}
	}

	function updateProduct()
	{
		$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			redirect('customers/showAll','refresh');
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		if ($this->input->post('mit'))
			{
				$id = $this->input->post('id');
				$this->mcrud->updateProduct($id);
				redirect('customers/products');
			} 
			else
			{
				redirect('customers/editProduct/'.$id);
			}
	  	}
		
 }

function updateCustomer()
{
	$user = $this->ion_auth->user()->row();
		if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
		{
			// members - Użytkownicy którzy moga widzieć tylko swoich klientów 
			if ($this->input->post('mit'))
			{
				$id = $this->input->post('id_customer');
				$this->mcrud->updateCustomer($id);
				redirect('customers/showAll');
			} 
			else
			{
				redirect('customers/editCustomer/'.$id);
			}
	  	}
	  	elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
	  	{
	  		// main_members -  Użytkownicy którzy moga widziec wszystkich klientow
	  		if ($this->input->post('mit'))
			{
				$id = $this->input->post('id_customer');
				$this->mcrud->updateCustomer($id);
				redirect('customers/showAll');
			} 
			else
			{
				redirect('customers/editCustomer/'.$id);
			}
	  	}
}

 function editCustomer()
 {
 	$user = $this->ion_auth->user()->row();
 	if(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('members'))
    {
    	$kd = $this->uri->segment(3);
      if ($kd == NULL) 
      {
        redirect('customers/showAll');
      } 
      else 
      {
        $dt = $this->mcrud->editCustomer($kd);
        
   		$data['name'] = $dt->name;
   		$data['surname'] = $dt->surname;
   		$data['pesel'] = $dt->pesel;
   		$data['street'] = $dt->street;
   		$data['house_number'] = $dt->house_number;
   		$data['local_number'] = $dt->local_number;
   		$data['post_code'] = $dt->post_code;
   		$data['city'] = $dt->city;
   		$data['phone_number'] = $dt->phone_number;
   		$data['conclusion_date'] = $dt->conclusion_date;
   		$data['start_date'] = $dt->start_date;
   		$data['stop_date'] = $dt->stop_date;
   		$data['name_salaried'] = $dt->name_salaried;
   		$data['surname_salaried'] = $dt->surname_salaried;
   		$data['born_date_salaried'] = $dt->born_date_salaried;
   		$data['products_c'] = $dt->products;
        
        $data['products'] = $this->mcrud->showAllProducts();

        $this->load->view('template/header');
        $this->load->view('members/navigation');
        $this->load->view('members/editCustomer', $data);
        $this->load->view('template/footer');
        }

    }
    
     elseif(!$this->ion_auth->is_admin() && $this->ion_auth->in_group('main_members'))
    {

    	$kd = $this->uri->segment(3);
      if ($kd == NULL) 
      {
        redirect('customers/showAll');
      } 
      else 
      {
        $dt = $this->mcrud->editCustomer($kd);
        
   		$data['name'] = $dt->name;
   		$data['surname'] = $dt->surname;
   		$data['pesel'] = $dt->pesel;
   		$data['street'] = $dt->street;
   		$data['house_number'] = $dt->house_number;
   		$data['local_number'] = $dt->local_number;
   		$data['post_code'] = $dt->post_code;
   		$data['city'] = $dt->city;
   		$data['phone_number'] = $dt->phone_number;
   		$data['conclusion_date'] = $dt->conclusion_date;
   		$data['start_date'] = $dt->start_date;
   		$data['stop_date'] = $dt->stop_date;
   		$data['name_salaried'] = $dt->name_salaried;
   		$data['surname_salaried'] = $dt->surname_salaried;
   		$data['born_date_salaried'] = $dt->born_date_salaried;
   		$data['products_c'] = $dt->products;
        
        $data['products'] = $this->mcrud->showAllProducts();

        $this->load->view('template/header');
        $this->load->view('main_members/navigation');
        $this->load->view('main_members/editCustomer', $data);
        $this->load->view('template/footer');
        }

    }
 }
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */