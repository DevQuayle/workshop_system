<header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Menu" data-placement="bottom"> <i class="fa fa-bars"> </i></div>
            </div>

            <!--logo start-->
            <a href="<?=site_url('admin/index') ?>" class="logo" style="color:red;">Euro <span class="lite">Bus</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu"> 
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                
                            </span>
                            <span class="username">Witaj, &nbsp; <?php print_r($this->session->all_userdata()['username']) ; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li>
                                <a href="<?=site_url('auth/logout') ?>"><i class="icon_key_alt"></i> Wyloguj</a>
                            </li>
                            <li></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>


      </header> 
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li id="home" >
                      <a class="" href="<?=site_url('admin/index') ?>">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li id="mechanics">
                      <a class="" href="<?=site_url('admin/showAllMechanics') ?>">
                          <i class="fa fa-users"></i>
                          <span>Mechanicy</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="<?=site_url('admin/mainSettings') ?>">
                          <i class="fa fa-cogs"></i>
                          <span>Ustawienia główne</span>
                      </a>
                  </li> 
                  
                  <li>
                      <a class="" href="<?= site_url('admin/smsSettings') ?>">
                          <i class="fa fa-envelope"></i>
                          <span>Powiadomienia</span>
                      </a>
                  </li>
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