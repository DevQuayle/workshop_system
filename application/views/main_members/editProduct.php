
<div  class="w3-card-2 l12 m12 s12" id="add_user" >
<div class ="panel panel-primary" style="font-size:20px;"> <div class="panel-heading">Edytuj produkt</div></div>

<form class="w3-container" name="form"  action="<?= base_url() ?>customers/updateProduct/<?=$id?>" method="POST">

  <div class="style-4">
 <table style="width:auto; margin-top:30px;">
<input name="id" value="<?= $id ?>"type="text" hidden> 
  <tr>

    <td> <label class="add_form"> Nazwa produktu: </label></td>
    <td ><input name="product_name" value="<?= $product_name ?>" placeholder="Nazwa Produktu" autofocus pattern="[A-Za-z, ą, ć, ę, ł, ń, ó, ś, ź, ż]{2,}" title="" type="text" required> </td>
  </tr>
  <?php
    if($if_required == '1'){
  ?>
  <tr>
    <td><label class="add_form">Czy wymagany <br> numer seryjny:</label> </td>
    <td>
      <div>
        <input id="radio1" name="if_required" value="1" checked="checked" type="radio"><label for="radio1">TAK</label>
      </div>
      <div>
        <input id="radio2" name="if_required" value="0"  type="radio"><label for="radio2">NIE</label>
      </div>
    </td>
  </tr>
  <?php
    } else {
  ?>
  <tr>
    <td><label class="add_form">Czy wymagane:</label> </td>
    <td>
      <div>
        <input id="radio1" name="if_required" value="1"  type="radio"><label for="radio1">TAK</label>
      </div>
      <div>
        <input id="radio2" name="if_required" value="0"  checked="checked"  type="radio"><label for="radio2">NIE</label>
      </div>
    </td>
  </tr>
  <?php
 }
 ?>
</table>
</div>
  <input id="login_button" name="mit" type="submit" class="w3-btn blue" value="Edytuj" />
</form>


</div>
