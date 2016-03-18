<script>
$(document).ready(function(){
	$('#service').change(function(){
		var x = $('#service').val();
		$.ajax({
			type:'GET',
			url:'<?= site_url("mechanic/showServiceCost")?>'+ '/'+x,
			success: function(result){
				$('#result').html(result);
			}
		});
	});
})	;	


$(document).ready(function(){
		var x = $('#service').val();
		$.ajax({
			type:'GET',
			url:'<?= site_url("mechanic/showServiceCost")?>'+ '/'+x,
			success: function(result){
				$('#result').html(result);
			}
		});
	
})	;	
</script>
<section id="main-content">
	<section class="wrapper">
		<!--overview start-->
		<div class="row">
			<div class="col-lg-8">
				<h3  class="page-header"><i class="fa fa-plus "></i><i class="fa fa-wrench "></i>Dodaj naprawę do zlecenia</h3>
				<br>
				<?php  echo form_open("mechanic/addServiceToRepair".'/'.$this->uri->segment(3),array('class'=>'form-horizontal'));?>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-4"></div>
							<label class="control-label col-lg-1">Usługa: </label>
							<div class="col-lg-5">
								<select class="form-control" id="service" name="repair_service_service_id" >
									<?php foreach ($services as $service): if($service->service_id ==1) continue;?>

									<option value="<?=$service->service_id;?>"><?=$service->service_name;?></option>
									<?php endforeach; ?>
									<option value="1">INNE</option>
								</select>
							</div>
							
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-5"></div>
							<div class="col-lg-5">
								<input class="form-control" id="other_service" placeholder="Podaj usługe" style="display:none;" type="text" name="repair_service_other_service" value="" >
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-4"></div>
							<label class="control-label col-lg-1" for="mechanic_id">Mechanik: </label>
							<div class="col-lg-5">
								<?php foreach($mechanic_data as $mechanic): ?>
								<input class="form-control" disabled type="text"  value="<?=$mechanic->first_name. ' '. $mechanic->last_name; ?>" >
								<input class="form-control" type="text" style="display:none;" name="repair_service_mechanic_id" value="<?=$this->session->userdata('user_id');?>" >
								<?php endforeach; ?>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-12">
						<div class="row" id="result">
							
						</div>
					</div>
				</div>
				

				<div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  <label class="control-label col-lg-3" for="inputSuccess">Komentarz: </label>
                  <textarea class ="col-lg-9"rows="4" cols="80" name="repair_service_comment"></textarea>
                  
                </div>
              </div>
            </div>


            <div class="form-group">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-4"> </div>
                  <button type="submit" class="btn btn-primary col-lg-6">Dodaj usługę</button>
                  <div class="col-lg-2"> </div>
                </div>
              </div>
            </div>
			</div>
		</div>
		<?php echo form_close();?>
	</section>
</section>
<script type='text/javascript'>
$(function() {
$('#service').change(function() {
	var x = $(this).val();
	if(x == 1)
	$('#other_service').css("display","block");
	else
	$('#other_service').css("display","none");
});
});
</script>