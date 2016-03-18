<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 style="float:left; margin-right:10%;" class="page-header"><i class="fa fa-cogs "></i>Obecne naprawy  </h3>
				<form select="float:right;" id="demo-2">
					<input id="search" type="search" placeholder="Search">
				</form>

				<script>
					$(document).ready(function(){
						$('#search').on('input',function(){
							var x = $('#search').val();
							$.ajax({
								type:'GET',
								url:'<?= site_url("mechanic/searchCurrentRepairs")?>'+ '/'+x,
								success: function(result){
								$('#result').html(result);
								}
							});
						});
					});
				</script>
				<!-- Naprawy OBECNE-->
				<br>
				
				<br>
				<div class="row">
					
					
					<div class="col-lg-12">
						
						<section id="result" class="panel">
							
							<table class="table table-striped table-advance table-hover" style="text-align:center; vertical-align:middle;">
								<tbody>
									<tr>
										<th style="text-align:center;"> Klient</th>
										<th style="text-align:center;"> Data rozpoczęcia</th>
										<th style="text-align:center;">  Marka</th>
										<th style="text-align:center;"> Model</th>
										<th style="text-align:center;"> Nr rej/Przebieg</th>
										<th style="text-align:center;"> Wprowadził</th>
										<th style="text-align:center;"> Opis</th>
										<th style="text-align:center;"> Status</th>
										<th class="akcja" style="text-align:center;"> Akcja</th>
									</tr>
									<tr>
										
										<?php
										//echo'<pre>';
											//print_r($repair_data);
										//echo'</pre>';
										if(!isset($repairs_data) || $repairs_data == NULL)
											echo '<td colspan="8" style="text-align:center;">Nie prowadzimy żadnej naprawy dla klienta</td>' ;
										else
										foreach ($repairs_data as $repair):
										if(isset($repair->repair_date_finish) || $repair->repair_status == 'ZAKOŃCZONO') continue; ?>
										<td><a href="<?= site_url('mechanic/showClient').'/'.$repair->client_id; ?>"><?= $repair->client_name .' '. $repair->client_surname ?> </a></td>
										<td><?= $repair->repair_date_start; ?></td>
										<td><?= $repair->car_brand; ?></td>
										<td><?= $repair->car_model; ?></td>
										<td><?= $repair->car_registration_number.'<br>'.$repair->car_mileage ?></td>
										<td><?= $repair->first_name .' '. $repair->last_name ?></a></td>
										<td><?= $repair->repair_comment?></a></td>
										<td><?= $repair->repair_status ;?></td>
										<td class="akcja"><?php echo '<button data-id ="'.$repair->repair_id.'" data-txt="Czy napewno chcesz usunać zlecenie naprawy samochodu '.$repair->car_model.' '.$repair->car_brand.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteRepairModal"><i class="fa fa-trash"></i></button>'; ?>
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