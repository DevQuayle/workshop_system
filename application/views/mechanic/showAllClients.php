 <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users "></i>Klienci <a class="btn btn-primary pull-right"  href="<?=site_url('mechanic/addClient') ?>"><i  style="color:white;" class="fa fa-user-plus">|</i> Dodaj Klienta &nbsp;</a></h3>
                    
					  
					<section class="panel">
						
						
							<table class="table table-striped table-advance table-hover">
							<tbody>
								<tr>
									<th><i class="icon_profile"></i> Imie Nazwisko</th>
									<th><i class="fa fa-home"></i> Adres </th>
									<th><i class="icon_mobile"></i> Telefon</th>
									<th><i class="fa fa-envelope"></i> E-mail</th>
									<th><i class="fa fa-cogs"></i> Akcja</th>
								</tr>
								<?php if(!isset($get_data)) ; else foreach ($get_data as $client):?>
								<tr>
									<td> <a href="<?=site_url('mechanic/showClient')?>/<?=$client->client_id?>"> <?= $client->client_name ." ". $client->client_surname; ?></a></td>
									<td><?= $client->client_street ." ". $client->client_house_number ."/".$client->client_local_number.", ". $client->client_post_code ." ". $client->client_postoffice ?></td>
									<td><?= $client->client_phone_number ;?></td>
									<td><?= $client->client_mail_address; ?></td>
									<td>
									<?php echo '<button data-id ="'.$client->client_id.'" data-txt="Czy napewno chcesz usunać klienta '.$client->client_name.' '.$client->client_surname.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-user-times"></i></button>'; ?>
									<a class="btn btn-success" href="<?=site_url('mechanic/showClient')?>/<?=$client->client_id; ?>"><i class="fa fa-eye"> </i></a>
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

<script>
	$("#clients").attr('class', 'active');
</script>
