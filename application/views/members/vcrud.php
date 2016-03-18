<div  class="w3-card-2 l12 m12 s12" id="add_user" >
  <div class="w3-responsive">
    <div class ="panel panel-primary" style="font-size:20px; "> <div class="panel-heading"> 
    <?php
        if($this->input->post('search'))
          echo " Wyniki wyszukiwania dla: " . $this->input->post('search');
        else
          echo "Wszyscy klienci";
    ?>
      <a href="<?php echo site_url('customers/add') ?>" class="btn btn-success navbar-right " style="margin: -3px 0 0 50px">Dodaj Nowego Klienta</a>
      
      <form class="navbar-form navbar-right" action="<?=  base_url(); ?>customers/search" method="POST" style="margin: -3px 0 0 0;" >
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Wyszukaj">
        </div>
        <button type="submit" class="btn btn-default">Szukaj</button>
      </form>

    </div></div>
    <script>
    $(document).ready(function()
    {
    $("#myTable").tablesorter({debug: true});
    }
    )
    
    </script>
    <div class="table-responsive">
    <?php
          if ($data_get == NULL) {
          ?>
          <div class="alert alert-info" role="alert">Brak wyników!</div>
      
          
          <?php
          } else {
          ?>
          <table id="myTable" class="table table-bordered table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th>Certyfikat klienta</th>
            <th>Imie klienta</th>
            <th>Nazwisko klienta</th>
            <th>PESEL klienta</th>
            <th>Adres klienta</th>
            <th>Telefon klienta</th>
            <th>Data <br> zawarcia</th>
            <th>Data <br> pocztku</th>
            <th>Data <br> &nbsp;końca&nbsp;&nbsp;&nbsp; </th>
            <th>Wybrane produkty</th>
            <th>Osoa uposażona</th>
            <th>Data ur. <br> Uposażonej</th>
            <th style="vertical-align: middle;" width="100px">AKCJA</th>
          </tr>
        </thead>
        <tbody> <?php
          foreach ($data_get as $row) {

          $adres = $row->street .' '. $row->house_number.'/'.$row->local_number.'<br>'.$row->post_code.' '. $row->city;
          ?>
          <tr>
            <td><?= $row->certificate; ?></td>
            <td><?= $row->name; ?></td>
            <td><?= $row->surname; ?></td>
            <td><?= $row->pesel;?></td>
            <td><?= $adres;?></td>
            <td><?= $row->phone_number ;?></td>
            <td><?= $row->conclusion_date ;?></td>
            <td><?= $row->start_date ;?></td>
            <td><?= $row->stop_date ;?></td>

            <?php 
                $this->db->select('product_name,serial_number');
                $this->db->from('customer_product');
                $this->db->join('products','customer_product.id_product = products.id');
                $this->db->where('id_customer',$row->id);
                
                $ambil = $this->db->get();
                echo "<td>";
                foreach ($ambil->result() as $data) 
                {
                  echo $data->product_name ." <br> Nr.ser:" . $data->serial_number . " <br>-------------------------<br>";
                }
                echo "</td>";
            ?>
            
            <td><?= $row->name_salaried . ' ' . $row->surname_salaried ;?></td>
            <td><?= $row->born_date_salaried ;?></td>
            <td style="text-align: center; vertical-align: middle; ">
              <a href="<?php echo site_url('customers/report/' . $row->id); ?>" target="_blank" class="btn btn-info btn-xs"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
              <a href="<?php echo site_url('customers/editCustomer/' . $row->id); ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              <a href="<?php echo site_url('customers/delete/' . $row->id); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </td>
            <?php
            }
            }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
    <center>
    <div id="pagination_box">
      <ul class="pagination">
        <?php
        echo $this->pagination->create_links();
        ?>
      </ul>
      
    </div>
    </center>
  </div>