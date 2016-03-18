<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
  <div class="row">
    <div class="col-lg-12">
      <h3  class="page-header"><i class="fa fa-envelope "></i>Ustawienia powiadomien SMS</h3>
      <span style="color:red"> Pamiętaj aby dane były poprawne !!! </span>
      <br><br>
      <?php echo form_open("admin/updateSMSSettings",array('class'=>'form-horizontal'));?>

      
        <?php foreach ($sms_settings as $sms):?>
          <div class="form-group">
            <div class="col-lg-9">
              <div class="row">
                <label class="control-label col-lg-5" for="inputSuccess"><?= $sms->setting_desc1;?>:</label>
                <div class="col-lg-5">
                <?php if(($sms->name == 'sms_finish_repair') || ($sms->name == 'sms_technical_exam') ): ?>
                  <textarea class="form-control " name="<?=$sms->name?>" id="" cols="45" rows="5"> <?= $sms->value ?></textarea>
                <?php elseif ($sms->name == 'sms_api_from'):?>
                  <select class="form-control " name="<?=$sms->name?>">
                    <?php if($sms->value == "Eco")
                    {
                      echo ('<option selected value="Eco">Eco</option>
                            <option value="Pro">Pro</option>
                            <option value="Warsztat">Warsztat</option>
                            <option value="Informacja">Informacja</option>
                            <option value="Serwis">Serwis</option>
                            ');
                    }elseif ($sms->value == "Pro") {
                     echo ('<option  value="Eco">Eco</option>
                            <option selected value="Pro">Pro</option>
                            <option value="Warsztat">Warsztat</option>
                            <option value="Informacja">Informacja</option>
                            <option value="Serwis">Serwis</option>
                            ');
                    }elseif ($sms->value == "Warsztat") {
                     echo ('<option  value="Eco">Eco</option>
                            <option  value="Pro">Pro</option>
                            <option selected value="Warsztat">Warsztat</option>
                            <option value="Informacja">Informacja</option>
                            <option value="Serwis">Serwis</option>
                            ');
                    } elseif ($sms->value == "Informacja") {
                     echo ('<option  value="Eco">Eco</option>
                            <option  value="Pro">Pro</option>
                            <option  value="Warsztat">Warsztat</option>
                            <option selected value="Informacja">Informacja</option>
                            <option value="Serwis">Serwis</option>
                            ');
                    } elseif ($sms->value == "Serwis") {
                     echo ('<option  value="Eco">Eco</option>
                            <option  value="Pro">Pro</option>
                            <option  value="Warsztat">Warsztat</option>
                            <option  value="Informacja">Informacja</option>
                            <option selected value="Serwis">Serwis</option>
                            ');
                    } 
                    
                    ?>
                    
                  </select>
                <?php elseif ($sms->name == 'sms_notice'):?>
                  <select class="form-control " name="<?=$sms->name?>">
                    <?php if($sms->value == 'TAK'){
                      echo ('<option selected value="TAK">TAK</option>
                            <option  value="NIE">NIE</option>
                       ');
                     } else{
                        echo ('<option  value="TAK">TAK</option>
                              <option selected value="NIE">NIE</option>
                       ');
                      }
                    ?>
                    </select>
                <?php else: ?>
                  <input required class="form-control" <?= ($sms->name == 'sms_api_password') ? "type=password" : "type=text"?> name="<?=$sms->name?>" value="<?=$sms->value;?>"> 
               <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
  
  
        <?php endforeach;?>
        <br><br>
        <div class="form-group">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-2"> </div>
              <button type="submit" class="btn btn-primary col-lg-6">Zapisz ustawienia SMS</button>
              <div class="col-lg-2"> </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<br><hr><br>

  <div class="row">
    <div class="col-lg-12">
      <h3  class="page-header"><i class="fa fa-envelope "></i>Ustawienia powiadomien E-mail</h3>
      <br>
      <?php echo form_open("admin/updateMailSettings",array('class'=>'form-horizontal'));?>

      
        <?php foreach ($mail_settings as $mail):?>
          <div class="form-group">
            <div class="col-lg-9">
              <div class="row">
                <label class="control-label col-lg-5" for="inputSuccess"><?= $mail->setting_desc1;?>:</label>
                <div class="col-lg-5">
                <?php if(($mail->name == 'mail_finish_repair') || ($mail->name == 'mail_technical_exam') ): ?>
                  <textarea class="form-control " name="<?=$mail->name?>" id="" cols="45" rows="5"> <?= $mail->value ?></textarea>
               
                <?php elseif ($mail->name == 'mail_notice'):?>
                  <select class="form-control " name="<?=$mail->name?>">
                    <?php if($mail->value == 'TAK'){
                      echo ('<option selected value="TAK">TAK</option>
                            <option  value="NIE">NIE</option>
                       ');
                     } else{
                        echo ('<option  value="TAK">TAK</option>
                              <option selected value="NIE">NIE</option>
                       ');
                      }
                    ?>
                    </select>
                <?php else: ?>
                  <input required class="form-control" <?= ($mail->name == 'mail_password') ? "type=password" : "type=text"?> name="<?=$mail->name?>" value="<?=$mail->value;?>"> 
               <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;?>
        <br><br>
        <div class="form-group">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-2"> </div>
              <button type="submit" class="btn btn-primary col-lg-6">Zapisz ustawienia E-mail</button>
              <div class="col-lg-2"> </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
</section>
<!-- Dzisiejsza data w rozpoczęciu zlecenia -->