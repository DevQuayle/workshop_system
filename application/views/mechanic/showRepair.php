<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    
    
  </div>
  <div class="row">
    <!-- Dane klienta -->
    <div class="col-lg-12">
      <?php foreach($client_data as $client):?>
      <h3  class="page-header"><i class="fa fa-wrench "></i>Zlecenie dla <strong> <?= $client->client_name .' '. $client->client_surname; ?> </strong> z dnia <strong> <?=$repair_data[0]->repair_date_start ; ?> </strong> &nbsp; &nbsp;<strong> <font  style="text-align:right" color="red" >/ <?=$repair_data[0]->repair_status ; ?> /</font> </strong></h3>
      <br>
      <div class="row">
        <div class="col-lg-6">
          <section class="panel">
            <header class="panel-heading">
              <i style="font-size:20px;" class="fa fa-street-view "> </i> &nbsp;&nbsp;&nbsp;Dane klienta <a class="btn btn-success pull-right"  href="<?=site_url('mechanic/showClient')?>/<?=$client->client_id; ?>"><i class="fa fa-eye"></i> &nbsp; &nbsp;  Zobacz pełne dane</a>
            </header>
            <div class="panel-body">
              
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
        <!-- Dane pojazdu -->
        <div class="col-lg-6">
          <section class="panel ">
            <header class="panel-heading">
              <?php foreach($car_data as $car):?>
              <i style="font-size:20px;" class="fa fa-car "> </i> &nbsp;&nbsp;&nbsp; Dane pojazdu <a class="btn  btn-success pull-right"  href="<?=site_url('mechanic/showCar')?>/<?=$car->car_id; ?>"><i class="fa fa-eye"></i> &nbsp; &nbsp;  Zobacz pełne dane</a>
            </header>
            <div class="panel-body">
              
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
        
        
        <!-- Menu -->
        
        <div class="panel panel-body">
          <?php foreach ($repair_data as $repair):
          if($repair->repair_status == 'ZAKOŃCZONO'):?>
            <a class="btn btn-primary" disabled href="<?=site_url('mechanic/addServiceToRepair')?>/<?=$repair->repair_id; ?>">Dodaj pozycję do zlecenia</a>
            <?php echo' <button  disabled data-repairid="'.$repair->repair_id.'" data-txt="Czy napewno chcesz zakończyć to zlecenie ?" type="button" data-placement="top" class="btn btn-primary " data-trigger="hover" data-toggle="modal" data-target="#finishRepairModal">Zakończ zlecenie</button>' ;?>
            <!-- <a class="btn btn-primary" href="<?=site_url('mechanic/finishRepair')?>/<?=$repair->repair_id; ?>">Zakończ zlecenie</a> -->
            <a class="btn btn-primary" href="<?=site_url('mechanic/sendsms')?>/<?=$client->client_phone_number;?>/fr">Wyślij SMS o zakończeniu naprawy</a>
            <a class="btn btn-primary" href="<?=site_url('mechanic/sendMail')?>/<?=$client->client_mail_address;?>/fr"">Wyślij E-mail o zakończeniu naprawy</a>
            <a class="btn btn-primary" onclick="window.print()" >Drukuj</a>
           
            <?php echo' <button   data-repairid="'.$repair->repair_id.'" data-txt="Czy napewno chcesz odblokować to zlecenie ?" type="button" data-placement="top" class="btn btn-primary " data-trigger="hover" data-toggle="modal" data-target="#unlockRepairModal">Odblokuj zlecenie</button>' ;?>





          <?php elseif (!isset($repair->repair_date_finish) ||$repai->repair_status == 'W TRAKCIE') :?>
            <a class="btn btn-primary" href="<?=site_url('mechanic/addServiceToRepair')?>/<?=$repair->repair_id; ?>">Dodaj pozycję do zlecenia</a>
            <?php echo' <button  data-repairid="'.$repair->repair_id.'" data-txt="Czy napewno chcesz zakończyć to zlecenie ?" type="button" data-placement="top" class="btn btn-primary " data-trigger="hover" data-toggle="modal" data-target="#finishRepairModal">Zakończ zlecenie</button>' ;?>
            <!-- <a class="btn btn-primary" href="<?=site_url('mechanic/finishRepair')?>/<?=$repair->repair_id; ?>">Zakończ zlecenie</a> -->
             <a class="btn btn-primary" href="<?=site_url('mechanic/sendsms')?>/<?=$client->client_phone_number;?>/fr">Wyślij SMS o zakończeniu naprawy</a>
            <a class="btn btn-primary" href="<?=site_url('mechanic/sendMail')?>/<?=urlencode($client->client_mail_address);?>/fr"">Wyślij E-mail o zakończeniu naprawy</a>
           
             <a class="btn btn-primary" onclick="window.print()" >Drukuj</a>
          
          
          <?php endif; endforeach; ?>
        </div>
        
        <!-- Koniec Menu -->
        <!-- Dane zlecenia -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel ">
              <header class="panel-heading">
                <i style="font-size:20px;" class="fa fa-tasks "> </i> &nbsp;&nbsp;&nbsp;  Dane zlecenia
              </header>
              <div class="panel-body">
                <table class="table table-striped table-advance table-hover" >
                  <tbody>
                    <tr style="text-align:center;">
                      <th> Lp.</th>
                      <th> Czynność</th>
                      <th>  Komentarz</th>
                      <th>  Cena</th>
                      <th class="mech"> Mechanik</th>
                      <?php if(!isset($repair->repair_date_finish) || $repair->repair_status == 'W TRAKCIE')
                      echo '<th class="akcja"> Akcja</th>';
                      ?>
                    </tr>
                    
                    <?php
                    $counter = 0;
                    $total_cost = 0;
                    if(!isset($repair_services_data) || $repair_services_data == NULL)
                    echo '<td colspan="8" style="text-align:center;">Brak czynności w tym zleceniu</td>' ;
                    else
                    foreach($repair_services_data as $repairs_service): $counter++; $total_cost += $repairs_service->repair_service_cost;  ?>
                    
                    <tr>
                      <td><?=$counter?></td>
                      <td><?php 
                      if($repairs_service->repair_service_other_service != NULL) 
                        echo $repairs_service->repair_service_other_service; 
                      else 
                        echo $repairs_service->service_name; ?>
                      </td>
                      <td><?=$repairs_service->repair_service_comment ?></td>
                      <td ><?=$repairs_service->repair_service_cost ?> zł</td>
                      <td class="mech"><?=$repairs_service->first_name .' '. $repairs_service->last_name; ?></td>
                      <?php if(!isset($repair->repair_date_finish) || $repair->repair_status == 'W TRAKCIE'): ?>
                      <td class="akcja">
                        <div class="btn-group">
                          <a class="btn btn-warning" href=" <?= site_url('mechanic/editServiceFromRepair').'/'.$repairs_service->repair_service_id?> "><i class="fa fa-pencil"></i></a>
                          <?php echo' <button data-repairid = "'.$this->uri->segment(3).'"data-id ="'.$repairs_service->repair_service_id.'" data-txt="Czy napewno chcesz usunć tę usługę ?" type="button" data-placement="top" class="btn btn-danger " data-trigger="hover" data-toggle="modal" data-target="#deleteServiceModal"><i class="fa fa-trash"></i></button>' ;?>
                        </div>
                      </td>
                      <?php endif;?>
                      
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                      <th colspan="3"><strong>RAZEM: </strong></th>
                      <th> <strong><?=$total_cost; ?> zł</strong></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
          </div>
          
          
        </div>
      </div>
    </section>
  </section>

  <!-- Okienko do odblokowywania naprawy -->
  <div class="modal fade" id="unlockRepairModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class ="modal-title">Odblokuj naprawę</h4>
        </div>
        <div class="modal-body">
          <p> </p>
          <form action="" id="deactive-form" method="POST">
            <input type="radio" hidden name="confirm"  value="yes" checked="checked" />
            <input type="text" hidden name="id" id="id">
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Nie</button>
            <button class="btn btn-warning" id="submitd" type="submit"> Tak</button>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
    <script>
    $('#unlockRepairModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var txt = button.data('txt')
    var repair_id = button.data('repairid')
    var modal = $(this)
    
    modal.find('p').html(txt)
    modal.find('#id').val(id)
    modal.find('#deactive-form').attr('action', '<?=site_url("mechanic/unlockRepair")?>/'+ repair_id);
    })</script>

    <!-- Okienko do usuwania usługi z naprawy -->
    <div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class ="modal-title">Usuń usługę z tej naprawy</h4>
          </div>
          <div class="modal-body">
            <p> </p>
            <form action="" id="deactive-form" method="POST">
              <input type="radio" hidden name="confirm"  value="yes" checked="checked" />
              <input type="text" hidden name="id" id="id">
            </div>
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Nie</button>
              <button class="btn btn-warning" id="submitd" type="submit"> Tak</button>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
      <script>
      $('#deleteServiceModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var txt = button.data('txt')
      var id = button.data('id')
      var repair_id = button.data('repairid')
      var modal = $(this)
      
      modal.find('p').html(txt)
      modal.find('#id').val(id)
      modal.find('#deactive-form').attr('action', '<?=site_url("mechanic/deleteServiceFromRepair")?>/'+ id +'/'+repair_id);
      })</script>
      <!-- Okienko do zakończenia naprawy -->
      <div class="modal fade" id="finishRepairModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class ="modal-title">Zakończ zlecenie</h4>
            </div>
            <div class="modal-body">
              <p> </p>
              <script>
              $(document).ready( function() {
              var now = new Date();
              var month = (now.getMonth() + 1);
              var day = now.getDate();
              if(month < 10)
              month = "0" + month;
              if(day < 10)
              day = "0" + day;
              var today = now.getFullYear() + '-' + month + '-' + day;
              $('#datePicker').val(today);
              });
              
              </script>
              <form action="" id="deactive-form" method="POST">
                <input type="radio" hidden name="confirm"  value="yes" checked="checked" />
                <input type="text" hidden name="id" id="id">
                Wynierz datę zakończenia:  <input type="date" id="datePicker" name="finish_date" raquired value="" >
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Nie</button>
                <button class="btn btn-warning" id="submitd" type="submit"> Tak</button>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
        <script>
        $('#finishRepairModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var txt = button.data('txt')
        var repair_id = button.data('repairid')
        var modal = $(this)
        
        modal.find('p').html(txt)
        modal.find('#id').val(id)
        modal.find('#deactive-form').attr('action', '<?=site_url("mechanic/finishRepair")?>/'+ repair_id);
        })</script>