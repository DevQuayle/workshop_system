<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-8">
        <h3  class="page-header"><i class="fa fa-user-plus "></i>Dodaj klienta</h3>
        <br>
        <?php echo form_open("mechanic/addClient",array('class'=>'form-horizontal'));?>
        <form class="form-horizontal " method="get">
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                <label class="control-label col-lg-3" for="inputSuccess">Imie:</label>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="client_name" value="" required>
                </div>
                <label class="control-label col-lg-1" for="inputSuccess">Nazwisko:</label>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="client_surname" value="" required>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                <label class="control-label col-lg-3" for="inputSuccess">Ulica/Miejscowość:</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" name="client_street" value="" >
                </div>
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                
                <label class="control-label col-lg-3" for="inputSuccess">Nr domu:</label>
                <div class="col-lg-3">
                  <input class="form-control" type="text" name="client_house_number" value="" >
                </div>
                <label class="control-label col-lg-3" for="inputSuccess">Nr lokalu:</label>
                <div class="col-lg-3">
                  <input class="form-control" type="text" name="client_local_number" value="" >
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                
                <label class="control-label col-lg-3" for="inputSuccess">Kod pocztowy:</label>
                <div class="col-lg-2">
                  <input class="form-control" pattern="[0-9]{2}-[0-9]{3}"  title="Kod pocztowy xx-xxx" type="text" name="client_post_code" value="" >
                </div>
                <label class="control-label col-lg-2" for="inputSuccess">Poczta:</label>
                <div class="col-lg-5">
                  <input class="form-control" type="text" name="client_postoffice" value="" >
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                
                <label class="control-label col-lg-3" for="inputSuccess">Telefon :</label>
                <div class="col-lg-2">
                  <input class="form-control" type="text" name="client_phone_number" value="" >
                </div>
                <label class="control-label col-lg-3" for="inputSuccess">E-mail:</label>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="client_mail_address" value="" >
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                
                <label class="control-label col-lg-3" for="inputSuccess">Powiadomienia SMS :</label>
                <div class="col-lg-2">
                  <input class="form-control" type="checkbox" checked name="client_sms_notice" value="1" >
                </div>
                <label class="control-label col-lg-3" for="inputSuccess">Powiadomienia E-mail:</label>
                <div class="col-lg-2">
                  <input class="form-control" type="checkbox" checked name="client_mail_notice" value="1" >
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                <label class="control-label col-lg-3" for="inputSuccess">Komentarz: </label>
                <textarea class ="col-lg-9"rows="4" cols="80" name="client_comment"></textarea>
                
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-4"> </div>
                <button type="submit" class="btn btn-primary col-lg-6">Dodaj klienta</button>
                <div class="col-lg-2"> </div>
              </div>
            </div>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </section>
  </section>