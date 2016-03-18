<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Menu" data-placement="bottom"> <i class="fa fa-bars"> </i></div>
  </div>
  <!--logo start-->
  <a href="<?=site_url('mechanic/index') ?>" class="logo" style="color:red;">Euro <span class="lite">Bus </span></a>
  <!--logo end-->
 
  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu" >
      <span style="font-size:16px; margin-right:10px"class="username">Witaj, &nbsp; <?php print_r($this->session->all_userdata()['username']) ; ?></span>
      <a data-original-title="Wyloguj" data-placement="bottom" data-toggle="tooltip "  style="font-size:30px; color:red;" class="username tooltips" href="<?=site_url('auth/logout') ?>"> <i class="fa fa-power-off"></i></a>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
      
      <li id="clients">
        <a class="" href="<?=site_url('mechanic/showAllClients') ?>">
          <i class="fa fa-users"></i>
          <span>Klienci</span>
        </a>
      </li>
      <li>
        <a class="" href="<?= site_url('mechanic/showCurrentRepairs')?>">
          <i class="fa fa-wrench"></i>
          <span>Naprawy trwajace</span>
        </a>
      </li>
      <li>
        <a class="" href="<?= site_url('mechanic/showFinishRepairs') ?>">
          <i class="fa fa-wrench"></i>
          <span>Naprawy zakończone</span>
        </a>
      </li>
     <!--  <li>
        <a class="" href="auth/showUsers">
          <i class="fa fa-envelope"></i>
          <span>Powiadomienia SMS</span>
        </a>
      </li> -->
      <!--
      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="fa fa-users"></i>
          <span>Mechanicy</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="form_component.html">Dodaj mechanika</a></li>
          <li><a class="" href="form_validation.html">Dodaj grupę</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_desktop"></i>
          <span>UI Fitures</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="general.html">Elements</a></li>
          <li><a class="" href="buttons.html">Buttons</a></li>
          <li><a class="" href="grids.html">Grids</a></li>
        </ul>
      </li>
      <li>
        <a class="" href="widgets.html">
          <i class="icon_genius"></i>
          <span>Widgets</span>
        </a>
      </li>
      <li>
        <a class="" href="chart-chartjs.html">
          <i class="icon_piechart"></i>
          <span>Charts</span>
          
        </a>
        
      </li>
      
      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_table"></i>
          <span>Tables</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="basic_table.html">Basic Table</a></li>
        </ul>
      </li>
      
      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_documents_alt"></i>
          <span>Pages</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="profile.html">Profile</a></li>
          <li><a class="" href="login.html"><span>Login Page</span></a></li>
          <li><a class="" href="blank.html">Blank Page</a></li>
          <li><a class="" href="404.html">404 Error</a></li>
        </ul>
      </li> -->
      
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>