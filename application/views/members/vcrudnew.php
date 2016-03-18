
<div  class="w3-card-2 l12 m12 s12" id="add_user" >
<div class ="panel panel-primary" style="font-size:20px;"> <div class="panel-heading">Dodaj klienta</div></div>


<form class="w3-container" name="form"  action="save" method="POST">
  <div class="style-4">
 

  
 <table style="width:auto; margin-top:30px;">
  <tr>
    <td> <label class="add_form"> Imie: </label></td>
    <td ><input name="name" placeholder="Imie" autofocus pattern="[A-Za-z, ą, ć, ę, ł, ń, ó, ś, ź, ż]{2,}" title="" type="text" required> </td>
  </tr>
  <tr>
    <td><label class="add_form"> Nazwisko: </label></td>
    <td><input name="surname" placeholder="Nazwisko" pattern="[A-Za-z,ą, ć, ę, ł, ń, ó, ś, ź, ż]{2,}" title="" type="text" required></td>
  </tr>
  <tr>
    <td> <label class="add_form">PESEL:</label></td>
    <td><input name="pesel" placeholder="PESEL" pattern="[0-9]{11}" title="PESEL składa się z 11 cyfr" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Ulica:</label></td>
    <td><input name="street" placeholder="Ulica" type="text"  required> </td>
  </tr>
  <tr>
    <td> <label class="add_form">Nr. domu:</label></td>
    <td> <input name="house_number" placeholder="Nr. domu"  type="text"  required></td>
  </tr>
  <tr>
    <td><label class="add_form">Nr. lokalu:</label></td>
    <td>  <input name="local_number" placeholder="Nr. Lokalu"  type="text"  ></td>
  </tr>
  <tr>
    <td><label class="add_form">Kod pocztowy:</label> </td>
    <td><input name="post_code" pattern="[0-9]{2}-[0-9]{3}" title="Kod pocztowy xx-xxx"  type="text" placeholder="Kod Pocztowy" required> </td>
  </tr>
  <tr>
    <td> <label class="add_form">Miejscowość:</label></td>
    <td> <input name="city"  placeholder="Miejscowość" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Nr. telefonu:</label></td>
    <td> <input name="phone_number" placeholder="Nr. telefonu"  type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Data start:</label></td>
    <td> <input  name="start_date" size="200" placeholder="Data start" type="date"  required></td>
  </tr>
<!-- <tr>
    <td> <label class="add_form">Data koniec:</label></td>
    <td> <input name="stop_date"   type="date"  required></td>
  </tr> 
  -->
  <tr>
    <td> <label class="add_form">Imie uposażonego:</label></td>
    <td> <input name="name_salaried"  placeholder="Imie os uposażonej" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Nazwisko uposażonego:</label></td>
    <td> <input name="surname_salaried"  placeholder="nazwisko os uposażonej" type="text"  required></td>
  </tr>
  <tr>
    <td> <label class="add_form">Data ur. uposażonego:</label></td>
    <td> <input name="born_date_salaried"  placeholder="Data ur uposażonej"  type="date"  required></td>
  </tr>

  <tr>
    <td><label class="add_form">Produkty:</label> </td>
   </tr>
   
 <?php
 $i=0;
      foreach ($data_get as $row) { 
        $i++;
        echo "<input name='id_product_".$i."' type='text'  hidden value='".$row->id."'>";
        echo "<tr><td><input onclick='enableDisable(this.checked,".$i.")' name='cb_".$i."' value='".$row->product_name."' type='checkbox'> <label style=' margin-top:10px;'for='".$row->product_name."'>".$row->product_name."</label></td> ";
        if($row->if_required == '1')
          echo "<td> Nr ser: <input id='".$i."' disabled name='tx_".$i."' type='text'  required>  - wymagane</td></tr>";
        else
          echo "<td>Nr ser: <input id='".$i."' disabled name='tx_".$i."' type='text' > </td></tr>";
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
  <input type="reset" class="w3-btn red" value="Reset!">
</form>


</div>
