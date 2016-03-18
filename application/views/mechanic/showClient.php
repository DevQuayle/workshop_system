<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3  class="page-header"><i class="fa fa-user "></i>Dane klienta</h3>
				<?php foreach($client_data as $client):?>
				<div class="profile-widget profile-widget-info">
					<div class="panel-body">
						<div class="col-lg-4 col-sm-4">
							<h3  class="page-header"><?= $client->client_name .' '. $client->client_surname ?> </h3>
							<i style="font-size:70px;" class="fa fa-street-view "></i>
							<br><br>
							<?php echo '<button  data-id ="'.$client->client_id.'" data-txt="Czy napewno chcesz usunać klienta '.$client->client_name.' '.$client->client_surname.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-user-times"></i></button>'; ?>
							<?php echo '<a href="'.site_url('mechanic/editClient').'/'.$client->client_id.'" data-original-title="Edytuj" data-placement="bottom" data-toggle="tooltip " type="button" class="btn btn-warning tooltips"><i class="fa fa-pencil"></i></a>'; ?>
							
							<br>
						</div>
						<div class="col-lg-4 col-sm-4 follow-info">
							<p><i style="font-size:18px; margin-right:10px;" class="fa fa-home"></i> <?= $client->client_street.' '.$client->client_house_number.'/'.$client->client_local_number.', '.$client->client_post_code.' '.$client->client_postoffice?></p>
							<p><i style="font-size:18px; margin-right:10px;" class="fa fa-phone"></i> <?= $client->client_phone_number ?></p>
							<p><i style="font-size:18px; margin-right:10px;" class="fa fa-envelope"></i> <?= $client->client_mail_address ?></p>
							<br>
							<?php
								if($client->client_sms_notice == 1)
									echo' <p><i style="font-size:18px; margin-right:10px;" class="fa fa-check-circle"></i> Powiadomienia SMS </p>';
								else
									echo '<p><i style="font-size:18px; margin-right:10px;" class="fa fa-times-circle"></i> Powiadomienia SMS </p>';
							
								if($client->client_mail_notice ==1)
									echo' <p><i style="font-size:18px; margin-right:10px;" class="fa fa-check-circle"></i> Powiadomienia E-mail </p>';
								else
									echo '<p><i style="font-size:18px; margin-right:10px;" class="fa fa-times-circle"></i> Powiadomienia E-mail </p>';
							?>
						</div>
						<br>
						<?php
							if($client->client_comment)
								//echo $client->client_comment;
								echo '<p><i style="font-size:18px; margin-right:10px;" class="fa fa-sticky-note"> </i> Komentarz  <br><br>'.$client->client_comment.'</p>';
						?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<br><br>
		<!-- Pojazdy -->
		<div class="row">
			<div class="col-lg-12">
				<h3  class="page-header"><i class="fa fa-car "></i>Pojazdy Klienta <a class="btn btn-primary pull-right"  href="<?=site_url('mechanic/addCar').'/'.$client->client_id ?>"><i  style="color:white;" class="fa fa-plus">|</i> Dodaj pojazd &nbsp;</a></h3>
				<section class="panel">
					
					
					<table class="table table-striped table-advance table-hover" style="text-align:center;">
						<tbody>
							<tr>
								<th style="text-align:center;"> Marka</th>
								<th style="text-align:center;"> Model </th>
								<th style="text-align:center;"> Rodzaj paliwa</th>
								<th style="text-align:center;"> Pojemność</th>
								<th style="text-align:center;"> Numer rejestracyjny</th>
								<th style="text-align:center;"> Akcja</th>
							</tr>
							<tr>
								<?php
								
								if(!isset($car_data) || $car_data == NULL)
									echo '<td colspan="6" style="text-align:center;">Ten klient nie posiada żadnego pojazdu</td>' ;
								else
								foreach ($car_data as $car):?>
								<td><?= $car->car_brand; ?></td>
								<td><?= $car->car_model; ?></a></td>
								<td><?= $car->car_fuel_type ;?></td>
								<td><?= $car->car_engine_capacity ;?> cm<sup>3 </sup></td>
								<td><?= $car->car_registration_number ;?></td>
								<td><?php echo '<button data-clientid="'.$client->client_id.'" data-id ="'.$car->car_id.'" data-txt="Czy napewno chcesz usunać samochód '.$car->car_model.' '.$car->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteCarModal"><i class="fa fa-trash"></i></button>'; ?>
									<a class="btn btn-success" href="<?=site_url('mechanic/showCar')?>/<?=$car->car_id; ?>"><i class="fa fa-eye"> </i></a>
									<a class="btn btn-primary tooltips" data-original-title="Wystaw zlecenie dla tego pojazdu" data-placement="bottom" data-toggle="tooltip " href="<?=site_url('mechanic/addRepair')?>/<?=$client->client_id.'/'.$car->car_id.'/'.$this->session->user_id; ?>"> <i class="fa fa-pencil-square-o"> </i></a>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
		<!-- Naprawy OBECNE-->
		<br><br>
		<div class="row">
			<div class="col-lg-12">
				<h3  class="page-header"><i class="fa fa-wrench "></i>Obecne naprawy klienta </h3>
				<section class="panel">
					
					
					<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
						<tbody>
							<tr>
								<th style="text-align:center;"> Data rozpoczęcia</th>
								<th style="text-align:center;">  Marka</th>
								<th style="text-align:center;"> Model</th>
								<th style="text-align:center;"> Nr rej/Przebieg</th>
								<th style="text-align:center;"> Wprowadził</th>
								<th style="text-align:center;"> Opis</th>
								<th style="text-align:center;"> Status</th>
								<th style="text-align:center;"> Akcja</th>
							</tr>
							<tr>
						
								<?php
								//echo'<pre>';
								//print_r($repair_data);
								//echo'</pre>';
								if(!isset($repair_data) || $repair_data == NULL)
									echo '<td colspan="8" style="text-align:center;">Nie prowadzimy żadnej naprawy dla klienta</td>' ;
								else
								foreach ($repair_data as $repair):
									if(isset($repair->repair_date_finish) || $repair->repair_status == 'ZAKOŃCZONO') continue; ?>
								<td><?= $repair->repair_date_start; ?></td>
								<td><?= $repair->car_brand; ?></td>
								<td><?= $repair->car_model; ?></td>
								<td><?= $repair->car_registration_number.'<br>'.$repair->car_mileage ?></td>
								<td><?= $repair->first_name .' '. $repair->last_name ?></a></td>
								<td><?= $repair->repair_comment?></a></td>
								<td><?= $repair->repair_status ;?></td>
								<td><?php echo '<button data-clientid="'.$client->client_id.'" data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>'; ?>
									<a class="btn btn-success" href="<?=site_url('mechanic/showRepair')?>/<?=$repair->repair_id; ?>"><i class="fa fa-eye"> </i></a>
									
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</section>
			</div>
		</div>

		<!-- Naprawy OBECNE-->
		<br><br>
		<div class="row">
			<div class="col-lg-12">
				<h3  class="page-header"><i class="fa fa-wrench "></i>Zakończne naprawy klienta </h3>
				<section class="panel">
					
					
					<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
						<tbody>
							<tr>
								<th style="text-align:center;"> Data rozpoczęcia</th>
								<th style="text-align:center;">  Marka</th>
								<th style="text-align:center;"> Model</th>
								<th style="text-align:center;"> Nr rej/Przebieg</th>
								<th style="text-align:center;"> Wprowadził</th>
								<th style="text-align:center;"> Opis</th>
								<th style="text-align:center;"> Data zakończenia</th>
								<th style="text-align:center;"> Status</th>
								<th style="text-align:center;"> Akcja</th>
							</tr>
							<tr>
						
								<?php
								//echo'<pre>';
								//print_r($repair_data);
								//echo'</pre>';
								if(!isset($repair_data) || $repair_data == NULL)
									echo '<td colspan="8" style="text-align:center;">Nie ma żadnej naprawy dla klienta</td>' ;
								else
								foreach ($repair_data as $repair):
									if(!isset($repair->repair_date_finish) || $repair->repair_status == 'W TRAKCIE') continue; ?>
								<td><?= $repair->repair_date_start; ?></td>
								<td><?= $repair->car_brand; ?></td>
								<td><?= $repair->car_model; ?></td>
								<td><?= $repair->car_registration_number.'<br>'.$repair->car_mileage ?></td>
								<td><?= $repair->first_name .' '. $repair->last_name ?></a></td>
								<td><?= $repair->repair_comment?></a></td>
								<td><?= $repair->repair_date_finish?></a></td>
								<td><?= $repair->repair_status ;?></td>
								<td><?php echo '<button data-clientid="'.$client->client_id.'" data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>'; ?>
									<a class="btn btn-success" href="<?=site_url('mechanic/showRepair')?>/<?=$repair->repair_id; ?>"><i class="fa fa-eye"> </i></a>
									
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</section>
</section>
<!-- Okienko do usuwania klienta -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class ="modal-title">Usuń Klienta</h4>
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
	$('#deleteModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var txt = button.data('txt')
		var id = button.data('id')
		var modal = $(this)
	
		modal.find('p').html(txt)
		modal.find('#id').val(id)
	modal.find('#deactive-form').attr('action', '<?=site_url("mechanic/deleteClient")?>/'+id);
	})</script>
	<!-- Okienko do usuwania naprawy -->
	<div class="modal fade" id="deleteRepairModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class ="modal-title">Usuń naprawę</h4>
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
		$('#deleteRepairModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var txt = button.data('txt')
			var id = button.data('id')
			var client_id = button.data('clientid')
			var modal = $(this)
		
			modal.find('p').html(txt)
			modal.find('#id').val(id)
		modal.find('#deactive-form').attr('action', '<?=site_url("mechanic/deleteRepair")?>/'+ id + '/' + client_id);
		})</script>
		<!-- Okienko do usuwania pojazdu -->
		<div class="modal fade" id="deleteCarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class ="modal-title">Usuń Pojazd</h4>
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
			$('#deleteCarModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var txt = button.data('txt')
				var id = button.data('id')
				var client_id = button.data('clientid')
				var modal = $(this)
			
				modal.find('p').html(txt)
				modal.find('#id').val(id)
			modal.find('#deactive-form').attr('action', '<?=site_url("mechanic/deleteCar")?>/'+ id + '/' + client_id);
			})</script>


				<script>
								$(document).ready(function(){
									var x = $('#repair_id').val();
									$.ajax({
										type:'GET',
										url:'<?= site_url("mechanic/getRepairCost")?>'+ '/'+x,
										success: function(result){
											$('#result'+x).html(result);
										}
									});
	
								})	;
							</script>