<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
  <div class="row">
    <div class="col-lg-12">
      <h3  class="page-header"><i class="fa fa-envelope "></i>Ustawienia usług</h3>
      <br>
      <div class="form-group">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-2"> </div>
              <button type="button" data-placement="top" class="btn btn-success col-lg-6" data-trigger="hover" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus" style="margin-right:10px;"></i>Dodaj usługę</button>
             <!-- <button class="btn btn-success col-lg-6">Dodaj usługę</button> -->
              <div class="col-lg-2"> </div>
            </div>
          </div>
        </div>
        <br><br><br><br>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Dodaj usługę</h4>
            </div>
            <div class="modal-body">
              <p> </p>
              <form class="form-horizontal" action="<?=site_url("admin/addService")?>" method="POST">
                Nazwa usługi:<input class="form-control" type="text"  name="service_name"  value="" /><br>
                Koszt [zł]: <input class="form-control" type="text"  name="service_likely_cost"  value="" />
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Wyjdź</button>
                <button class="btn btn-warning" id="deactiveSubmit" type="submit"> Dodaj</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        

      <?php echo form_open("admin/updateServices",array('class'=>'form-horizontal', 'id'=>'form_edit'));?>

      
        <?php foreach ($service_settings as $service):?>
          <div class="form-group">
            <div class="col-lg-9">
              <div class="row">
                <input hidden name="service_id" value="<?= $service->service_id; ?>">
                <label class="control-label col-lg-2" for="inputSuccess">Nazwa usługi:</label>
                <div class="col-lg-4">
                  <input required class="form-control" name="service_name" value="<?=$service->service_name;?>"> 
                </div>

                <label class="control-label col-lg-1" for="inputSuccess">Koszt[zł]:</label>
                <div class="col-lg-2">
                  <input class="form-control" name="service_likely_cost" value="<?=$service->service_likely_cost;?>"> 
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
              <button onclick="submitForms()" class="btn btn-primary col-lg-6">Zapisz ustawienia usług</button>
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