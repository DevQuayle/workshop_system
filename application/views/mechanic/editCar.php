<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-8">
        <h3  class="page-header"><i class="fa fa-pencil "></i>Edytuj pojazd</h3>
        <br>
        <?php foreach($car_data as $car):?>
        <?php  echo form_open("mechanic/editCar/".$car->car_id,array('class'=>'form-horizontal'));?>
        <form class="form-horizontal " method="get">
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
              <label class="control-label col-lg-3" for="inputSuccess">Marka:</label>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="car_brand" value="<?= $car->car_brand;?>" required>
                </div>
                <label class="control-label col-lg-1" for="inputSuccess">Model:</label>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="car_model" value="<?= $car->car_model;?>" required>
                </div>
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                <label class="control-label col-lg-3" for="inputSuccess">Rok produkcji:</label>
                <div class="col-lg-2">
                  <select class="form-control " name="car_production_year">
                      <script>
                      var myDate = new Date();
                      var year = myDate.getFullYear();
                      var selected_year = "<?= $car->car_production_year ?>";
                      for(var i = year; i > 1900; i--)
                      {
                        if(i == selected_year)
                          document.write('<option selected value="'+i+'">'+i+'</option>');
                        else
                          document.write('<option value="'+i+'">'+i+'</option>');
                      }
                      </script>
                    </select> 
                  </div>
                  <label class="control-label col-lg-3" for="inputSuccess">Nr rejestracyjny:</label>
                  <div class="col-lg-2">
                    <input class="form-control" type="text" name="car_registration_number" value="<?= $car->car_registration_number;?>" >
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  
                  <label class="control-label col-lg-3" for="inputSuccess">Przebieg:</label>
                  <div class="col-lg-2">
                    <input class="form-control" type="text" name="car_mileage" value="<?= $car->car_mileage;?>" >
                  </div>
                  <label class="control-label col-lg-3" for="inputSuccess">Numer VIN</label>
                  <div class="col-lg-4">
                    <input class="form-control" type="text" name="car_vin_number" value="<?= $car->car_vin_number;?>" >
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  
                  <label class="control-label col-lg-3" for="inputSuccess">Pojemność silnika [cm <sup>3</sup>]:</label>
                  <div class="col-lg-2">
                    <input class="form-control"   type="text" name="car_engine_capacity" value="<?= $car->car_engine_capacity;?>" >
                  </div>
                  <label class="control-label col-lg-2" for="inputSuccess">Rodzaj paliwa:</label>
                  <div class="col-lg-3">
                    <select class="form-control"  name="car_fuel_type">
                    <?php 
                      if($car->car_fuel_type == 'Diesel') 
                        echo '<option selected value="Diesel">Diesel</option>
                              <option value="Benzyna">Benzyna</option>
                              <option value="Benzyna+LPG">Benzyna+LPG</option>
                              <option value="Hybryda">Hybryda</option>
                              <option value="Inne">Inne</option>';
                      elseif($car->car_fuel_type == 'Benzyna') 
                        echo '<option selected value="Benzyna">Benzyna</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Benzyna+LPG">Benzyna+LPG</option>
                              <option value="Hybryda">Hybryda</option>
                              <option value="Inne">Inne</option>';
                      elseif($car->car_fuel_type == 'Benzyna+LPG')
                        echo '<option selected value="Benzyna+LPG">Benzyna+LPG</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Benzyna">Benzyna</option>
                              <option value="Hybryda">Hybryda</option>
                              <option value="Inne">Inne</option>'; 
                      elseif($car->car_fuel_type == 'Hybryda')
                        echo '<option selected value="Hybryda">Hybryda</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Benzyna">Benzyna</option>
                              <option value="Benzyna+LPG">Benzyna+LPG</option>
                              <option value="Inne">Inne</option>';
                      elseif($car->car_fuel_type == 'Inne')
                        echo '<option selected value="Inne">Inne</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Benzyna">Benzyna</option>
                              <option value="Benzyna+LPG">Benzyna+LPG</option>
                              <option value="Hybryda">Hybryda</option>';
                    ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  
                  <label class="control-label col-lg-3" for="inputSuccess">Moc silnika [kW] :</label>
                  <div class="col-lg-2">
                    <input class="form-control" type="text" name="car_power" value="<?= $car->car_power;?>" > 
                  </div>
                  <label class ="control-label col-lg-3" for="inputSuccess">Data kolejnego przegldu:</label>
                  <div class="col-lg-3">
                    <input class="form-control" type="date" name="car_next_technical_examination" value="<?= $car->car_next_technical_examination;?>" >
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  <label class="control-label col-lg-3" for="inputSuccess">Komentarz: </label>
                  <textarea class ="col-lg-9"rows="4" cols="80" name="car_comment"><?=$car->car_comment?></textarea>
                  
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-4"> </div>
                  <button type="submit" class="btn btn-primary col-lg-6">Edytuj pojazd</button>
                  <div class="col-lg-2"> </div>
                </div>
              </div>
            </div>
            <?php echo form_close();?>
          <?php endforeach; ?>
          </div>
        </div>
      </section>
    </section>