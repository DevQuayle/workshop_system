<body>
	<section id="main-content">
		<section class="wrapper">
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users "></i>Mechanicy</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?=site_url('admin/index') ?>">Home</a></li>
						<li><i class="fa fa-users"></i><a href="<?=site_url('admin/showAllMechanics') ?>">Mechanicy</a></li>
						
					</ol>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							Mechanicy
							<a class="btn btn-primary popovers pull-right" data-original-title ="Dodaj mechanika" data-content="Klikajac przejdziesz do dodawania mechanika" data-placement="top" data-trigger="hover"  href="<?=site_url('admin/addMechanic') ?>"><i class="fa fa-user-plus"></i> Dodaj mechanika &nbsp;</a>
							
						</header>
						
						<table class="table table-striped table-advance table-hover">
							<tbody>
								<tr>
									<th><i class="icon_profile"></i> Imie Nazwisko</th>
									<th><i class="fa fa-user"></i> Login </th>
									<th><i class="icon_mobile"></i> Telefon</th>
									<th><i class="fa fa-users"></i> Grupa</th>
									<th><i class="fa fa-shield"></i> Status</th>
									<th><i class="icon_cogs"></i> Akcja</th>
								</tr>
								<?php foreach ($users as $user):?>
								<tr>
									<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
									<td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
									<td><?php echo htmlspecialchars($user->phone,ENT_QUOTES,'UTF-8');?></td>
									<td>
										<?php foreach ($user->groups as $group):?>
										<?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8') ;?><br />
										<?php endforeach?>
									</td>
									<?php
									$activate = array(
											'class' => 'btn btn-danger'
											);
									?>
									<td>
										<?php
											if($user->active)
											{
												echo '<button data-original-title ="Dezaktywuj mechanika" data-placement="top" data-trigger="hover" data-content="Klikajac dezaktywujesz mechanika" data-id="'.$user->id.'" data-txt="Czy napewno chcesz DEZAKTYWOWAĆ mechanika '.$user->username.'" type="button" class="btn btn-success popovers" data-toggle="modal" data-target="#deactiveModal">Aktywny</button>';
											}
											else
											{
												echo anchor("auth/activate/". $user->id, lang('index_inactive_link'),array('class'=>'btn btn-danger'));
											}
										?>
										<td>
											<div class="btn-group">
												<a class="btn btn-warning popovers" data-original-title ="Edytuj mechanika" data-content="Klikajac przejdziesz do edycji mechanika" data-placement="top" data-trigger="hover"  href="<?=site_url('auth/edit_user') ?>/<?= $user->id?>"><i class="fa fa-pencil"></i></a>
												<?php echo '<button data-original-title ="Usuń mechanika" data-content="Klikajac usuniesz mechanika" data-id ="'.$user->id.'" data-txt="Czy napewno chcesz Usunać mechanika '.$user->username.'" type="button" data-placement="top" class="btn btn-danger popovers" data-trigger="hover" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-user-times"></i></button>'; ?>
											</div>
										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</section>
					</div>
				</div>
			</section>
			<div class="modal fade" id="deactiveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><?php echo lang('deactivate_heading');?></h4>
						</div>
						<div class="modal-body">
							<p> </p>
							<form action="<?=site_url("auth/deactivate")?>/<?= $user->id ?>" id="deactive-form" method="POST">
								<input type="radio" hidden name="confirm"  value="yes" checked="checked" />
								<input type="text" hidden name="id" id="id">
							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">Nie</button>
								<button class="btn btn-warning" id="deactiveSubmit" type="submit"> Tak</button>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
				
				<script>
				$('#deactiveModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget) // Button that triggered the modal
					var txt = button.data('txt')
					var id = button.data('id')
					var modal = $(this)
				
					modal.find('p').html(txt)
					modal.find('#id').val(id)
					modal.find('#deactive-form').attr('action', '<?=site_url("auth/deactivate")?>/'+id);
					
				
				})</script>

				<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class ="modal-title">Usuń mechanika</h4>
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
					modal.find('#deactive-form').attr('action', '<?=site_url("auth/delete_user")?>/'+id);
				})</script>


<script>

$('#desactiveModala').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget)
         var txt = button.data('txt')
		var id = button.data('id')
		var modal = $(this)
				
		modal.find('p').html(txt)
		modal.find('#id').val(id)
		var dataString = 'id='+ id + '&confirm=' + yes;
 
$.ajax({  
    type: 'POST',  
    url: '<?=site_url("auth/deactivate")?>/'+id,
    data: dataString,  
    success: function(data) {
        if( data == '0' )
            alert( 'Błędne dane logowania!!!' );
        else
            window.location = window.location;
    }  
});
        });  
  
</script>
				<script>
				$("#mechanics").attr('class', 'active');
				</script>