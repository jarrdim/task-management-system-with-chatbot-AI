<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>




<main id="main" class="main ">

 <?php if(message()): ?>
          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      <?php   echo message('',true);?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

    <?php endif ?>




<?php  if(!empty($row)):?>

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo ROOT ?>/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item"><?php echo $data['title'] ?></li>
          <li class="breadcrumb-item active">Profile</li>
           <li class="breadcrumb-item active"><?php echo esc (ucfirst($row->username)) ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
     
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item" >
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" id="profile-overview-tab">Overview</button>
                </li>

                <li class="nav-item">
                  <div   onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="profile-edit-tab">Edit Profile</div>
                </li>

                <!-- <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings" id="profile-settings-tab">Settings</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" id="profile-change-password-tab">Change Password</button>
                </li> -->

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo ucfirst(esc($row->about))?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo ucfirst(esc($row->username))?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?php echo ucfirst(esc($row->country))?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo ucfirst(esc($row->address))?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo ucfirst(esc($row->phone))?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo ucfirst(esc($row->email))?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method='post' enctype="multipart/form-data">

                 <?php  csrf()?>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">

                        <img class="js-img-preview" src="<?php echo ROOT ?>/<?php echo ($row->image)?>" alt="Profile">
                        <div class="js-filename my-2"></div>
                       

                        <div class="pt-2">
                          <label class="btn btn-primary btn-sm" title="Upload new profile image"> 
                            <i class="bi bi-upload"></i>
                            <input class="js-progress-input" onchange = "load_image(this.files[0])" style="display:none;" type="file" name="image">
                          </label>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
    
                          <?php if(!empty($errors['image'])):?>
                              <div class="text-danger"><?php echo $errors['image'] ?></div>
                          <?php endif;?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Firstname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="fullName" value="<?php echo set_value('username', esc($row->username)) ?>">
                      
                          <?php if(!empty($errors['username'])):?>
                              <div class="text-danger"><?php echo $errors['username'] ?></div>
                          <?php endif;?>
                      </div>    
                    </div>
                     <div class="row mb-3">
                      <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Lastname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo set_value('lastname', esc($row->lastname)) ?>">
                      
                           <?php if(!empty($errors['lastname'])):?>
                              <div class="text-danger"><?php echo $errors['lastname'] ?></div>
                          <?php endif;?>
                      </div>    
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo set_value('about', esc($row->about)) ?></textarea>
                      
                            <?php if(!empty($errors['about'])):?>
                              <div class="text-danger"><?php echo $errors['about'] ?></div>
                          <?php endif;?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?php echo set_value('country', esc($row->country)) ?>">
                      </div>
                          <?php if(!empty($errors['country'])):?>
                              <div class="text-danger"><?php echo $errors['country'] ?></div>
                          <?php endif;?>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?php echo set_value('address', esc($row->address)) ?>">
                      
                          <?php if(!empty($errors['address'])):?>
                                <div class="text-danger"><?php echo $errors['address'] ?></div>
                          <?php endif;?>
                      </div>    
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo set_value('phone', esc($row->phone)) ?>">
                      
                          <?php if(!empty($errors['phone'])):?>
                              <div class="text-danger"><?php echo $errors['phone'] ?></div>
                          <?php endif;?>
                       </div>   
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo set_value('email', esc($row->email)) ?>">
                      
                          <?php if(!empty($errors['email'])):?>
                              <div class="text-danger"><?php echo $errors['email'] ?></div>
                          <?php endif;?>
                       </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input placeholder="Optional" name="twitter_link" type="text" class="form-control" id="Twitter" value="<?php echo set_value('twitter_link', esc($row->twitter_link)) ?>">
                      
                           <?php if(!empty($errors['twitter_link'])):?>
                              <div class="text-danger"><?php echo $errors['twitter_link'] ?></div>
                          <?php endif;?>
                      </div>    
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input placeholder="Optional" name="facebook_link" type="text" class="form-control" id="Facebook" value="<?php echo set_value('facebook_link', esc($row->facebook_link)) ?>">
                      
                          <?php if(!empty($errors['facebook_link'])):?>
                              <div class="text-danger"><?php echo $errors['facebook_link'] ?></div>
                          <?php endif;?>
                      </div>    
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input placeholder="Optional" name="instagram_link" type="text" class="form-control" id="Instagram" value="<?php echo set_value('instagram_link', esc($row->instagram_link)) ?>">
                      
                          <?php if(!empty($errors['instagram_link'])):?>
                              <div class="text-danger"><?php echo $errors['instagram_link'] ?></div>
                          <?php endif;?>
                      </div>    
                    </div>

                    <div class="text-center">
                      <a href="<?php echo ROOT ?>/admin">
                        <button type="button" class="btn btn-dark">Back</button>
                      </a>
                      <button onclick="profile_save()" type="submit" class="btn btn-primary float-end">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <!-- <div class="tab-pane fade pt-3" id="profile-settings">


                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                 
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>

                </div> -->

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>

        <div class="col-xl-3">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img style="object-fit:cover !important; width:70px; height:70px;" src="<?php echo  get_image($row->image)?>" alt="Profile" class="rounded-circle">
              <h2><?php echo ucfirst(esc($row->username))?></h2>
              <h3>Web Designer</h3>
              <strong><?php echo ucfirst(esc($row->role_name)) ?></strong>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>


<!--progress bar-->
  <div class="progress my-3 js-progress hide" style="height:0.8rem !important">
      <small  class="progress-bar " role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</small>
  </div>

      
    </section>
          
        <?php else: ?>
          <div style="margin-tomp:20rem;" class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      That profile was not fount!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        <?php endif;?>

 

 </main>  
 

 
  <script>
/** 
**
**persisting tabs
**
**
**/
var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab") : "profile-edit";

function show_tab(tab_name)
 {
    var firstTabEl = document.querySelector(tab_name+'-tab');
    
    var tab = new bootstrap.Tab(firstTabEl);
    tab.show();
   
}

function set_tab(tab_name) {
    tab = tab_name;
    console.log(tab);
    sessionStorage.setItem("tab", tab_name);

}



/*
**
**JS image upload
**
**
**/
function load_image(file)
   {
     document.querySelector(".js-filename").innerHTML = "Selected file: " + file.name;
      var path =  window.URL.createObjectURL(file);
      document.querySelector(".js-img-preview").src = path;
   }
   //END 

   window.onload = function () {

    show_tab(tab);
};

/*
**
**saving profile
**
**
**/
function profile_save() {
  var image = document.querySelector(".js-progress-input");
 
  //console.log(image.files[0]);
  var allowed_file_type = ['jpg','png','jpeg'];
  var extention =''
  //alert(image);
 
  if( typeof image.files[0] == 'object')
  {
    //split works like explode in php it converts the names to array
    //pop function works like split in php
      extention = image.files[0].name.split('.').pop();
      //alert(extention);
  }
  //alert(extention);
  if(!allowed_file_type.includes(extention.toLowerCase()))
  {
    
    alert("Only these file type are allowed " + allowed_file_type.toString(',') );
    return;
  }
  
  send_data({
    //adding the list of data to be send to server
    picture: image.files[0],
   
  });
}


function send_data(obj) {
  var progress = document.querySelector('.js-progress');
  progress.classList.remove("hide");

  //ajax
  var xml = new XMLHttpRequest();

  var form = new FormData();
  for (key in obj) {
    form.append(key, obj[key]);
  }
  xml.addEventListener('readystatechange', function () {

    if (xml.readyState == 4) {
      if (xml.status == 200) {

        alert('Upload complete');
        //window.location.reload();
      }

    }
  });
  xml.upload.addEventListener('progress', function (e) {
    var percent = Math.round((e.loaded / e.total) * 100);
    progress.children[0].style.width = percent + "%";
    progress.children[0].innerHTML = "saving..." + percent + "%";
  });
  xml.open('post', '', true);
  xml.send(form);
}


  </script>












 <?php  $this->view('admin/footer',$data) ?>