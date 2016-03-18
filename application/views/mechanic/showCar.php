<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3  class="page-header"><i class="fa fa-car "></i>Dane pojazdu</h3>
				<?php foreach($car_data as $car):?>
				<div class="profile-widget profile-widget-info">
					<div class="panel-body">
						<div class="col-lg-4 col-sm-4">
						<br>
							<h3  class="page-header"><?= $car->car_brand;?> </h3>
							<i style="font-size:70px;" class="fa fa-car "></i>
							<br><br>
							<h3  class="page-header"><?= $car->car_model;?> </h3>
							<?php echo '<a href="'.site_url('mechanic/editCar').'/'.$car->car_id.'" data-original-title="Edytuj" data-placement="bottom" data-toggle="tooltip " type="button" class="btn btn-warning tooltips"><i class="fa fa-pencil"></i></a>'; ?>
							<br>
						</div>
						<div class="col-lg-4 col-sm-4 follow-info">
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Rok produkcji:</span> <?= $car->car_production_year?></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Numer rejestracyjny:</span> <?= $car->car_registration_number ?></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Przebieg:</span> <?= $car->car_mileage ?></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Numer VIN:</span> <?= $car->car_vin_number ?></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Pojemność silnika:</span> <?= $car->car_engine_capacity ?> cm <sup>3</sup></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Rodzaj paliwa:</span> <?= $car->car_fuel_type ?></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Moc silnika:</span> <?= $car->car_power ?></p>
							<p><span style="font-size:14px; font-weight:bold; margin-right:10px;">Kolejny przeglad:</span> <?= $car->car_next_technical_examination ?></p>
						</div>
						<br>
						<?php
							if($car->car_comment)
								//echo $client->client_comment;
								echo '<p><i style="font-size:18px; margin-right:10px;" class="fa fa-sticky-note"> </i> <strong> Komentarz </strong> <br><br>'.$car->car_comment.'</p>';
						?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</section>