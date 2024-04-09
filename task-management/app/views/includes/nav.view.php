<?php




/*foreach($categories as $row)
{
    $category->update($row->id,['slug'=>str_to_url($row->category)]);
}*/


?>

<nav id="top-id" class="navbar top-navs  fixed-top navbar-expand-md">
        <div class="container">
     
            <a class="navbar-brand fw-bold" href="<?php echo ROOT ?>"><?php echo WEB_NAME ?></a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="bi bi-person"></i>
                        Hello, sign in
                    </h5>
                    <button type="button" class=" btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">
                    <!-- <ul class="navbar-nav flex-grow-1 pe-3  mt-2">
                        <li class="dropdown   menu-area ms-lg-auto">
                            <a style="font-size:1rem!important; font-weight:600 !important; color: #012970 !important;" class="dropbtn nav-link">Categories
                            </a>
                            <ul class="dropdown-content ">
                                <div class="row">
                                  
                                    <?php if(!empty($categories)): ?>
                                       
                                        <?php foreach($categories as $cat): ?>
                                            <div class="col-md-3  col-sm-6 px-md-5">
                                                <h5><?php echo $cat->category ?></h5>
                                                <li><a class="dropdown-item px-2" href="./items.html">Apple Watch</a></li>
                                                <li><a class="dropdown-item px-2" href="#">Another action</a></li>
                                            </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                
                                </div>
                            </ul>
                        </li>


                        <li class="dropdown   menu-area">
                            <a style="font-size:1rem!important; font-weight:600 !important; color:#012970 !important;"  class="dropbtn nav-link">Jack Business
                            </a>
                            <ul class="dropdown-content-2 ">
                                <div>
                                    <p style="font-size:0.8rem ;">Welcom to jacks academy</p>
                                    <div class="btn btn-primary">Learn more</div>
                                </div>
                            </ul>
                        </li>
                    
                        <?php if(!Auth::logged_in()):  ?>
                        <li class="nav-item pe-md-3">
                            <a class="nav-link active btn" aria-current="page" href="<?php echo ROOT?>/login">Login</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active btn" aria-current="page" href="<?php echo ROOT ?>/signup">Sign Up</a>
                        </li>
                        <?php endif; ?>

                    </ul> -->
                </div>
            </div>

            <div class="d-flex">
  
                
                <div class="dropdown   menu-area">
                    <a class="dropbtn d-flex">
                        <i class="bi bi-person h4"></i>
                        
                    </a>
                    <?php if(Auth::logged_in()): ?>
                    <ul class="dropdown-content-profile">
                        <div>
                            <p style="font-size:0.8rem ;"><i class="bi bi-person-fill pe-2"></i>Hi, <?php echo esc(Auth::getUsername('name')) ?></p>
                            <a href="<?php echo ROOT ?>/admin/dashboard"><p style="font-size:0.8rem ;"><i class="bi bi-pencil-fill pe-2"></i>Dashboard</p></a>

                          
                            <p style="font-size:0.8rem ;"><i class="bi bi-gear-fill pe-2"></i>Settings
                            </p>
                            <a href="logout"><p style="font-size:0.8rem ;"> <i class="bi bi-power pe-2"></i>Logout </p></a>
                        </div>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>