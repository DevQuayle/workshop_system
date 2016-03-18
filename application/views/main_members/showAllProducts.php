<div  class="w3-card-2 l12 m12 s12" id="add_user" >
  <div class="w3-responsive">
    <div class ="panel panel-primary" style="font-size:20px; "> <div class="panel-heading"> Produkty
      <a href="<?php echo site_url('customers/addProduct') ?>" class="btn btn-success navbar-right " style="margin: -3px 0 0 50px">Dodaj nowy produkt</a>
    </div></div>
    <div class="table-responsive">
      <table id="myTable" class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th width="45%">Nazwa</th>
            <th width="45%">Czy wymagany numer seryjny</th>
            <th width="10%">Akcja</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($data_get == NULL) {
          ?>
          <div class="alert alert-info" role="alert">Brak wyników!</div>
          <?php
          } else {
          foreach ($data_get as $row) {
          ?>
          <tr>
            <td><?= $row->product_name; ?></td>
            <td>
              <?php
                  if($row->if_required == 1)
                    echo "TAK";
                  else
                    echo "NIE";
               ?>
            </td>
            <td style="text-align: center;">
              <a href="<?php echo site_url('customers/editProduct/' . $row->id); ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              <a href="<?php echo site_url('customers/deleteProduct/' . $row->id); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            
           </td>
            <?php
            }
            }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
    
  </div>