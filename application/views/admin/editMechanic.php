<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-8">
        <h1><?php echo lang('edit_user_heading');?></h1>
        <p><?php echo lang('edit_user_subheading');?></p>
        <?php
        if($message){ ?>
        <div class="alert alert-block alert-danger fade in">
          <button data-dismiss="alert" class="close close-sm" type="button">
          <i class="icon-remove"></i>
          </button>
          <?php echo $message;?>
        </div>
        <?php } ?>
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
        <?php
        $attr = array(
        'class' => 'form-control');
        ?>
        <form class="form-horizontal " method="get">
          <div class="form-group">
            <label class="col-sm-3 control-label"> Login:</label>
            <div class="col-sm-5">
              <?php echo form_input($username+$attr);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
            <div class="col-sm-5">
              <?php echo form_input($first_name+$attr);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
            <div class="col-sm-5">
              <?php echo form_input($last_name+$attr);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('edit_user_phone_label', 'phone');?></label>
            <div class="col-sm-5">
              <?php echo form_input($phone+$attr);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Hasło: </label>
            <div class="col-sm-5">
              <?php echo form_input($password+$attr);?>
              <span class="help-block">Jeśli zmieniasz hasło</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Powtórz hasło: </label>
            <div class="col-sm-5">
              <?php echo form_input($password_confirm+$attr);?>
              <span class="help-block">Jeśli zmieniasz hasło</span>
            </div>
          </div>
          <?php if ($this->ion_auth->is_admin()): ?>
          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
          <label class="checkbox">
            <?php
            $gID=$group['id'];
            $checked = null;
            $item = null;
            foreach($currentGroups as $grp) {
            if ($gID == $grp->id) {
            $checked= ' checked="checked"';
            break;
            }
            }
            ?>
            <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
            <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
          </label>
          <?php endforeach?>
          <?php endif ?>
          <?php echo form_hidden('id', $user->id);?>
          <?php echo form_hidden($csrf); ?>
          <button type="submit" class="btn btn-primary">Edytuj</button>
          <?php echo form_close();?>
        </div>
      </div>
    </section>
  </section>