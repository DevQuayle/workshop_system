
<div  class="w3-card-2 l12 m12 s12" id="add_user" >
<div class ="panel panel-primary" style="font-size:20px;"> <div class="panel-heading">Edytuj klienta</div></div>


<form class="w3-container" name="form"  action="<?= base_url() ?>customers/updateCustomer/<?=$this->uri->segment(3)?>" method="POST">
  <div class="style-4">
 

  <input hidden value = "<?= $this->uri->segment(3) ?>" name="id_customer" type="text" >
 <table style="width:auto; margin-top:30px;">
  <tr>
    <td> <label class="add_form"> Imie: </label></td>
    <td ><input value = "<?= $name ?>" name="name" placeholder="Imie" autofocus pattern="[A-Za-z, ą, ć, ę, ł, ń, ó, ś, ź, ż]{2,}" title="" type="text" required> </td>
  </tr>
  <tr>
    <td><label class="add_form"> Nazwisko: </label></td>
    <td><input value = "<?= $surname ?>" name="surname" placeholder="Nazwisko" pattern="[A-Za-z,ą, ć, ę, ł, ń, ó, ś, ź, ż]{2,}" title="" type="text" required></td>
  </tr>
  <tr>
    <td> <label class="add_form">PESEL:</label></td>
    <td><input value = "<?= $pesel ?>" name="pesel" placeholder="PESEL" pattern="[0-9]{11}" title="PESEL składa się z 11 cyfr" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Ulica:</label></td>
    <td><input value = "<?= $street ?>" name="street" placeholder="Ulica" type="text"  required> </td>
  </tr>
  <tr>
    <td> <label class="add_form">Nr. domu:</label></td>
    <td> <input value = "<?= $house_number ?>" name="house_number" placeholder="Nr. domu"  type="text"  required></td>
  </tr>
  <tr>
    <td><label class="add_form">Nr. lokalu:</label></td>
    <td>  <input value = "<?= $local_number ?>" name="local_number" placeholder="Nr. Lokalu"  type="text"  ></td>
  </tr>
  <tr>
    <td><label class="add_form">Kod pocztowy:</label> </td>
    <td><input value = "<?= $post_code ?>" name="post_code" pattern="[0-9]{2}-[0-9]{3}" title="Kod pocztowy xx-xxx"  type="text" placeholder="Kod Pocztowy" required> </td>
  </tr>
  <tr>
    <td> <label class="add_form">Miejscowość:</label></td>
    <td> <input value = "<?= $city ?>" name="city"  placeholder="Miejscowość" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Nr. telefonu:</label></td>
    <td> <input value = "<?= $phone_number ?>" name="phone_number" placeholder="Nr. telefonu"  type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Data start:</label></td>
    <td> <input value = "<?= $start_date ?>"  name="start_date" size="200" placeholder="Data start" type="date"  required></td>
  </tr>
<!-- <tr>
    <td> <label class="add_form">Data koniec:</label></td>
    <td> <input name="stop_date"   type="date"  required></td>
  </tr> 
  -->
  <tr>
    <td> <label class="add_form">Imie uposażonego:</label></td>
    <td> <input value = "<?= $name_salaried ?>" name="name_salaried"  placeholder="Imie os uposażonej" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Nazwisko uposażonego:</label></td>
    <td> <input  value = "<?= $surname_salaried ?>" name="surname_salaried"  placeholder="nazwisko os uposażonej" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Data ur. uposażonego:</label></td>
    <td> <input value = "<?= $born_date_salaried ?>" name="born_date_salaried"  placeholder="Data ur uposażonej"  type="date"  required></td>
    
  </tr>

  <tr>
    <td><label class="add_form">Produkty:</label> </td>
   </tr>
   
 <?php
      $i=0;
      foreach ($products as $row) { 
        $i++;
         $this->db->select('customer_product.id_product,product_name,serial_number');
         $this->db->from('customer_product');
         $this->db->join('products','customer_product.id_product = products.id');
         $this->db->where('id_product',$row->id);
         $this->db->where('id_customer',$this->uri->segment(3));      
         $ambil = $this->db->get()->row();
         
         if($ambil)
         {
          echo "<input name='id_product_".$i."' type='text'  hidden value='".$row->id."'>";
          echo "<tr><td><input checked onclick='enableDisable(this.checked,".$i.")' name='cb_".$i."' value='".$row->product_name."' type='checkbox'> <label style=' margin-top:10px;'for='".$row->product_name."'>".$row->product_name."</label></td> ";
          if($row->if_required == '1')
            echo "<td> Nr ser: <input id='".$i."' value='".$ambil->serial_number."'  name='tx_".$i."' type='text'  required>  - wymagane</td></tr>";
          else
            echo "<td>Nr ser: <input id='".$i."' value='".$ambil->serial_number."'  name='tx_".$i."' type='text' > </td></tr>";
  
         }
         else
         {
          echo "<input name='id_product_".$i."' type='text'  hidden value='".$row->id."'>";
          echo "<tr><td><input onclick='enableDisable(this.checked,".$i.")' name='cb_".$i."' value='".$row->product_name."' type='checkbox'> <label style=' margin-top:10px;'for='".$row->product_name."'>".$row->product_name."</label></td> ";
          if($row->if_required == '1')
            echo "<td> Nr ser: <input disabled id='".$i."'  name='tx_".$i."' type='text'  required>  - wymagane</td></tr>";
          else
            echo "<td>Nr ser: <input disabled id='".$i."'   name='tx_".$i."' type='text' > </td></tr>";
        }
         }
    echo "<input name='product_counter' type='text'  hidden value='".$i."'>";
  
    ?>
</table>

</div>
<script language="javascript">
    function enableDisable(bEnable, textBoxID)
    {
         document.getElementById(textBoxID).disabled = !bEnable
    }
</script>
  <input id="login_button" name="mit" type="submit" class="w3-btn blue" value="Dodaj" />
</form>


</div>
