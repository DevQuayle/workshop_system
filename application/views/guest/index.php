<body class="login-img3-body">
  <div class="container">
    <?php
    $attributes = array('class' => 'login-form');
    echo form_open("auth/login",$attributes);
    ?>
    <div class="login-wrap">
      <p class="login-img"> <strong><span style="color:red;">EURO</span><i class="icon_tools"></i>BUS&nbsp;</strong></p>
      <div class="input-group">
        <span class="input-group-addon"><i class="icon_profile"></i></span>
        <input name="identity" type="text" class="form-control" placeholder="Login" autofocus required>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
        <input name="password" type="password" class="form-control" placeholder="Hasło" required>
      </div>
      
      <button class="btn btn-primary btn-lg btn-block" type="submit">Zaloguj</button>
    </div>
    <?php echo form_close();?>
    <?php
    if(isset($_SESSION['message']))
    { ?>
       <div class="alert alert-block alert-danger fade in"> <?= $_SESSION['message'] ?></div>
    <?php } ?>
  </div>
</body>