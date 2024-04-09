  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo ROOT?>/admin/dashboard" class="logo d-flex align-items-center">

      
        <span class="d-none d-lg-block"><?php echo WEB_NAME ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
 
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person"></i>
            <span class="badge bg-primary badge-number">*</span>
          </a><!-- End Notification Icon -->

        

        </li><!-- End Notification Nav -->

   

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
 
           
         
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo esc(Auth::getUsername()) ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo esc(Auth::getUsername()) ?></h6>
              <span><?php echo esc(Auth::getRole_name()) ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span><?php echo esc(Auth::getUsername()) ?></span>
              </a>
            </li>
             <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo ROOT ?>">
                <i class="bi bi-house"></i>
                <span>Home</span>
              </a>
            </li>
        
            <li>
              <hr class="dropdown-divider">
            </li>

    
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo ROOT ?>/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <div class="text-center text-success pb-3 h5">
      <strong><?php echo strtoupper(esc(Auth::role_name()." ")) ?>PROFILE</strong>
    </div>
<div class="mx-5 mb-3">
  <div style="height:150px; width:150px; border-radius: 50%; overflow: hidden; border: 2px solid #000;">
  <?php if(!empty(Auth::getImage())):?>
    <img style="width:100%;" src="<?php echo get_image(Auth::getImage())?>" class="img img-fluid" alt="profile">
  <?php else:?>
      <img style="width:100%;" src="<?php echo ROOT?>/assets/img/placeholder-image.png" class="img img-fluid" alt="profile">
  <?php endif;?>
  </div>
</div>



    <?php if(user_can('view_dashbord')): ?>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo ROOT ?>/admin/dashboard">
          <i class="bi bi-grid"></i>
          
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php endif ?>

      <li class="nav-item">
        <a class="nav-link collapsedl" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Operation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapsel " data-bs-parent="#sidebar-nav">
          <li>
            <?php if(user_can('view_profile')):?>
            <a class="active" href="<?php echo ROOT ?>/admin/profile">
              <i class="bi bi-circle"></i><span>profile</span>
            </a>
            <?php endif;?>
            <?php if(user_can('view_tasks')): ?>
             <a class="active" href="<?php  echo ROOT?>/admin/assignedtasks/">
              <i class="bi bi-people"></i>
              <span>List Tasks</span>
              </a>
              <?php endif;?>
        </ul>
      </li><!-- End My ads Nav -->
      <?php if(user_can('view_users')): ?>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo ROOT ?>/admin/users">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php endif ?>
      
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="<?php  echo ROOT?>/admin/requests">
          <i class="bi bi-people"></i>
          <span>View Requests</span>
        </a>
      </li> -->

       <?php if(user_can('view_roles')): ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php  echo ROOT?>/admin/roles">
          <i class="bi bi-people"></i>
          <span>Roles</span>
        </a>
      </li>
      <?php endif ?>



     

  

   

    </ul>


   

  </aside><!-- End Sidebar-->


         