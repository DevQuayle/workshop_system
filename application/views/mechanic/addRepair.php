<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    
    
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h3  class="page-header"><i class="fa fa-wrench "></i>Wystawianie zlecenia</h3>
      <br>
      <?php echo form_open("mechanic/addRepair/".$this->uri->segment(3).'/'. $this->uri->segment(4).'/'.$this->uri->segment(5),array('class'=>'form-horizontal'));?>
      <div class="row">
        <div class="col-lg-6">
          <section class="panel">
            <header class="panel-heading">
              <i style="font-size:20px;" class="fa fa-street-view "> </i> &nbsp;&nbsp;&nbsp;Dane klienta
            </header>
            <div class="panel-body">
              <?php foreach($client_data as $client):?>
              <table>
                <tbody>
                  <tr>
                    <td><strong> Imie: </strong></td> <td><?= $client->client_name; ?></td>
                  </tr>
                  <tr>
                    <td><strong> Nazwisko: </strong></td> <td><?= $client->client_surname; ?></td>
                  </tr>
                  <tr>
                    <td><strong> Adres: </strong></td> <td><?= $client->client_street. ' '. $client->client_house_number. '/'. $client->client_local_number .' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$client->client_post_code. ' '. $client->client_postoffice; ?></td>
                  </tr>
                  <tr>
                    <td><strong> Telefon: </strong></td><td>  <?= $client->client_phone_number; ?></td>
                  </tr>
                  <tr>
                    <td> <strong> E-mail: </strong></td> <td><?= $client->client_mail_address; ?> </td>
                  </tr>
                </tbody>
              </table>
              
              
              <?php endforeach; ?>
              
            </div>
          </section>
        </div>
        
        <div class="col-lg-6">
          <section class="panel ">
            <header class="panel-heading">
              <i style="font-size:20px;" class="fa fa-car "> </i> &nbsp;&nbsp;&nbsp; Dane pojazdu
            </header>
            <div class="panel-body">
              <?php foreach($car_data as $car):?>
              <table>
                <tbody>
                  <tr>
                    <td><strong> Marka: </strong></td> <td><?= $car->car_brand; ?></td>
                  </tr>
                  <tr>
                    <td><strong> Model: </strong></td> <td><?= $car->car_model; ?></td>
                  </tr>
                  <tr>
                    <td> <strong> Nr rejestracyjny: </strong> </td><td> <?= $car->car_registration_number; ?></td>
                  </tr>
                  <tr>
                    <td><strong> Pojemność/ Moc: </strong></td> <td><?= $car->car_engine_capacity;?> cm <sup>3</sup> / <?=$car->car_power;?> kW</td>
                  </tr>
                  <tr>
                    <td><strong> Przebieg: </strong></td><td>  <?= $car->car_mileage; ?> km</td>
                  </tr>
                  
                </tbody>
              </table>
              
              
              <?php endforeach; ?>
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel ">
              <header class="panel-heading">
                <i style="font-size:20px;" class="fa fa-tasks "> </i> &nbsp;&nbsp;&nbsp;  Dane zlecenia
              </header>
              <div class="panel-body">
                <div class="row">
                  <label class="control-label col-lg-3" for="inputSuccess">Przebieg [km] :</label>
                  <div class="col-lg-2">
                    <input class="form-control"  type="text" name="car_mileage" value="<?=$car->car_mileage ?>" required>
                  </div>
                </div>
              <br>
                <div class="row">
                  <label class ="control-label col-lg-3" for="inputSuccess">Data następnego przegldu :</label>
                  <div class="col-lg-2">
                    <input class="form-control"  type="date" name="car_next_technical_examination" value="<?=$car->car_next_technical_examination ?>" required>
                  </div>
                </div>
              <br>
                <div class="row">
                  <label class="control-label col-lg-3" for="inputSuccess">Data rozpoczęcia zlecenia:</label>
                  <div class="col-lg-2">
                    <input class="form-control" id="repair_start_date" type="date" name="repair_date_start" value="" required>
                  </div>
                </div>
                
                <br>
                
                <div class="row">
                  <label class="control-label col-lg-3" for="inputSuccess">Komentarz: </label>
                  <textarea class ="col-lg-4"rows="4" cols="80" name="repair_comment"></textarea>
                  
                </div>
                
              </section>

              <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3"> </div>
                <button type="submit" class="btn btn-primary col-lg-6">Dodaj zlecenie</button>
                <div class="col-lg-2"> </div>
              </div>
            </div>
          </div>
            </div>
           
          <?php echo form_close();?>
        </div>
      </div>
    </section>
  </section>
  <!-- Dzisiejsza data w rozpoczęciu zlecenia -->
  <script>


  $(document).ready( function() {
  var now = new Date();
  var month = (now.getMonth() + 1);
  var day = now.getDate();
  var today = now.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;
  
  $('#repair_start_date').val(today);
  });
  </script>