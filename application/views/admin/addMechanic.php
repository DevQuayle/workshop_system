<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-8">
        <h1><?php echo lang('create_user_heading');?></h1>
        <p><?php echo lang('create_user_subheading');?></p>
        <?php
        if(isset($message)){ ?>
        <div class="alert alert-block alert-danger fade in">
          <button data-dismiss="alert" class="close close-sm" type="button">
          <i class="icon-remove"></i>
          </button>
          <?php echo $message;?>
        </div>
        <?php } ?>
        <?php echo form_open("auth/create_user",array('class'=>'form-horizontal'));?>
        <form class="form-horizontal " method="get">
          <div class="form-group">
            <label class="col-sm-3 control-label"> Login:</label>
            <div class="col-sm-5">
            <input class="form-control" type="text" name="username" value="" required>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="first_name" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="last_name" value="" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('edit_user_phone_label', 'phone');?></label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="phone" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Hasło: </label>
            <div class="col-sm-5">
              <input class="form-control" type="password" name="password" value="" required>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Powtórz hasło: </label>
            <div class="col-sm-5">
              <input class="form-control" type="password" name="password_confirm" value="" required>
              
            </div>
				</div>
          <button type="submit" class="btn btn-primary">Dodaj</button>
          
          
          <?php echo form_close();?>
        </div>
      </div>
    </section>
  </section>


