<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class Mcrud extends CI_Model {
  
 function add() 
 {
   $this->lang->load('auth');
   $user = $this->ion_auth->user()->row();

  $sql = "SELECT `AUTO_INCREMENT`
          FROM INFORMATION_SCHEMA.TABLES
          WHERE TABLE_SCHEMA = 'insurance_company'
          AND TABLE_NAME ='customers'";

    $select= $this->db->query($sql);
   foreach ($select->result() as $row)
    $id = $row->AUTO_INCREMENT;

  $certificate = $id.'/'.date("y"); 
  $name = $this->input->post('name');
  $surname = $this->input->post('surname');
  $pesel = $this->input->post('pesel');
  $street = $this->input->post('street');
  $house_number = $this->input->post('house_number');
  $local_number = $this->input->post('local_number');
  $post_code = $this->input->post('post_code');
  $city = $this->input->post('city');
  $phone_number = $this->input->post('phone_number');
  $conclusion_date = $this->input->post('start_date');
  
  $name_salaried = $this->input->post('name_salaried');
  $surname_salaried = $this->input->post('surname_salaried');
  $born_date_salaried = $this->input->post('born_date_salaried');

  $startDate = new DateTime($this->input->post('start_date'));
  $startDate->modify( '+15 day' );

  $stopDate = new DateTime($startDate->format( 'Y-m-d' ));
  $stopDate->modify('+1 year');
  $stopDate->modify('-1 day');
  
 // echo $surname_salaried;

  $data = array(
   'certificate' => $certificate,
   'name' => $name,
   'surname' => $surname,
   'pesel' => $pesel,
   'street' => $street,
   'house_number' => $house_number,
   'local_number' => $local_number,
   'post_code' => $post_code,
   'city' => $city,
   'phone_number' => $phone_number,
   'conclusion_date' => $conclusion_date,
   'start_date' => $startDate->format( 'Y-m-d' ),
   'stop_date' => $stopDate->format('Y-m-d'),
   'name_salaried' => $name_salaried,
   'surname_salaried' => $surname_salaried,
   'born_date_salaried' => $born_date_salaried,
   'id_user' => $user->id
  );

  $this->db->insert('customers', $data); 


  for ($j = 1; $j <= $this->input->post('product_counter'); $j++)
  {
    if($this->input->post('cb_'.$j))
    {
      $data = array(
        'id_customer' => $id,
        'id_product' => $this->input->post('id_product_'.$j),
        'serial_number' =>  $this->input->post('tx_'.$j)
        );
      $this->db->insert('customer_product', $data);
    }
  }
 }



 function view($limit, $offset, $id)
 {
    $this->db->select('*');
    $this->db->from('customers');
    $this->db->where('customers.id_user',$id);
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

 function viewAll($limit, $offset)
 {
    $this->db->select('*');
    $this->db->from('customers');
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
 function edit($a) 
 {
  $d = $this->db->get_where('customers', array('id' => $a))->row();
  return $d;
 }

 function delete($a) 
 {
  $this->db->delete('customers', array('id' => $a));
  return;
 }



 function countCustomers()
 {
   $ambil = $this->db->get('customers');
   return $ambil->num_rows();
 }

 function countMyCustomers($id)
 {
   $ambil = $this->db->get_where('customers',array('id_user' => $id));
   return $ambil->num_rows();
 }

 public function search($id)
 {
     $search = $this->input->post('search');
     $query = "SELECT * FROM customers WHERE
             (certificate COLLATE utf8_polish_ci LIKE '%".$search."%' or
             name COLLATE utf8_polish_ci LIKE  '%".$search."%' or 
             surname COLLATE utf8_polish_ci  LIKE '%".$search."%' or 
             pesel = '".$search."') and id_user = '".$id."'";

       $ambil = $this->db->query($query);

 if ($ambil->num_rows() > 0) 
  {
   foreach ($ambil->result() as $data) 
   {
      $hasil[] = $data;
   }
  
   return $hasil;
  }
 }

public function searchInAll () 
{
 $search = $this->input->post('search');
 $query = "SELECT * FROM customers WHERE
             certificate COLLATE utf8_polish_ci LIKE '%".$search."%' or
             name COLLATE utf8_polish_ci LIKE  '%".$search."%' or 
             surname COLLATE utf8_polish_ci  LIKE '%".$search."%' or 
             pesel = '".$search."'";//' or
            /* phone_number LIKE '%".$search."%' or
             start_date LIKE '%".$search."%' or
             stop_date LIKE '%".$search."%'";*/
 
  $ambil = $this->db->query($query);

 if ($ambil->num_rows() > 0) 
  {
   foreach ($ambil->result() as $data) 
   {
      $hasil[] = $data;
   }
  
   return $hasil;
  }
 
}

 public function generateReport($id)
  {
    $query="SELECT *
        FROM customers 
        WHERE id=".$id;
        
        $select = $this->db->query($query);

        foreach ($select->result() as $row)
        {
            $_POST['certificate'] = $row->certificate;
            $_POST['name'] = $row->name;
            $_POST['surname'] = $row->surname;
            $_POST['street'] = $row->street;
            $_POST['house_number'] = $row->house_number;
            $_POST['local_number'] = $row->local_number;
            $_POST['post_code'] = $row->post_code;
            $_POST['city'] = $row->city;
            $_POST['pesel'] = $row->pesel;
            $_POST['phone_number'] = $row->phone_number;
            $_POST['start_date'] = $row->start_date;
            $_POST['stop_date'] = $row->stop_date;
            $_POST['name_salaried'] = $row->name_salaried;
            $_POST['surname_salaried'] = $row->surname_salaried;
            $_POST['born_date_salaried'] = $row->born_date_salaried;
        }

    ob_start();
       include('./assets/library/html2pdf.class.php');
       include ('./assets/library/deklaracja.php');

       $content = ob_get_clean();

      // convert to PDF
     
    
      try
      {
          $html2pdf = new HTML2PDF('P', 'A4','fr', true, 'UTF-8',3);
          $html2pdf->pdf->SetDisplayMode('fullpage');
          $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
          
          $html2pdf->Output('deklaracja.pdf');
          /*
          $file_name = $row['pesel'];
          $html2pdf->Output('./reports/'.$file_name.'.pdf', 'F');
          */
      }
      catch(HTML2PDF_exception $e)
      {
          echo $e;
          exit;
      }

  }

  public function showAllProducts()
  {
     $ambil = $this->db->get('products');
     if ($ambil->num_rows() > 0) 
     {
       foreach ($ambil->result() as $data) 
       {
          $hasil[] = $data;
       }
    return $hasil;
     }
  }

  function deleteProduct($a) 
 {
  $this->db->delete('products', array('id' => $a));
  return;
 }

 function addProduct() 
 {
  $product_name = $this->input->post('product_name');
  $if_required = $this->input->post('if_required');
 
  $data = array(
   'product_name' => $product_name,
   'if_required' => $if_required
  );

  $this->db->insert('products', $data); 
 }

  function editProduct($a) 
  {
    $d = $this->db->get_where('products', array('id' => $a))->row();
    return $d;
  }

  function updateProduct($id) 
 {
  $product_name = $this->input->post('product_name');
  $if_required = $this->input->post('if_required');

  $data = array(
   'product_name' => $product_name,
   'if_required' => $if_required
  );

  $this->db->where('id', $id);
  $this->db->update('products', $data);
 }

 function updateCustomer($id)
 {
  $user = $this->ion_auth->user()->row();
  
  $name = $this->input->post('name');
  $surname = $this->input->post('surname');
  $pesel = $this->input->post('pesel');
  $street = $this->input->post('street');
  $house_number = $this->input->post('house_number');
  $local_number = $this->input->post('local_number');
  $post_code = $this->input->post('post_code');
  $city = $this->input->post('city');
  $phone_number = $this->input->post('phone_number');
  $conclusion_date = $this->input->post('start_date');
  
  $name_salaried = $this->input->post('name_salaried');
  $surname_salaried = $this->input->post('surname_salaried');
  $born_date_salaried = $this->input->post('born_date_salaried');

  $startDate = new DateTime($this->input->post('start_date'));
  $startDate->modify( '+15 day' );

  $stopDate = new DateTime($startDate->format( 'Y-m-d' ));
  $stopDate->modify('+1 year');
  $stopDate->modify('-1 day');
  
 // echo $surname_salaried;

  $data = array(
   'name' => $name,
   'surname' => $surname,
   'pesel' => $pesel,
   'street' => $street,
   'house_number' => $house_number,
   'local_number' => $local_number,
   'post_code' => $post_code,
   'city' => $city,
   'phone_number' => $phone_number,
   'conclusion_date' => $conclusion_date,
   'start_date' => $startDate->format( 'Y-m-d' ),
   'stop_date' => $stopDate->format('Y-m-d'),
   'name_salaried' => $name_salaried,
   'surname_salaried' => $surname_salaried,
   'born_date_salaried' => $born_date_salaried
   );

  $this->db->where('id', $id);
  $this->db->update('customers', $data);

  $this->db->where('id_customer', $id);
  $this->db->delete('customer_product'); 

  for ($j = 1; $j <= $this->input->post('product_counter'); $j++)
  {
    if($this->input->post('cb_'.$j))
    {
      $data = array(
        'id_customer' => $id,
        'id_product' => $this->input->post('id_product_'.$j),
        'serial_number' =>  $this->input->post('tx_'.$j)
        );
      $this->db->insert('customer_product', $data);
    }
  }
 }

 function editCustomer($a) 
  {
    $d = $this->db->get_where('customers', array('id' => $a))->row();
    return $d;
  }
}
