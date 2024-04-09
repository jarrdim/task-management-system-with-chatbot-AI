
<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>



<main id="main" class="main">
  <?php if(user_can('view_roles')): ?>
<!--ADDING roles SECTION OR PAGE-->

<?php if($action == 'add'): ?>
     <?php if(message()): ?>
          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      <?php   echo message('',true);?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    <?php endif ?>
<?php if(user_can('add_roles')): ?>    
<div class="card text-center mx-auto" style="width:30rem">
    <div class="card-body">
      <h5 class="card-title">Create Roles</h5>
      <form method="post" class="row g-3">
        <div class="col-md-12">
          <input type="text" name="role" class="form-control" placeholder="role name">
            <?php if(!empty($errors['role'])):?>
                <div class="text-danger"><?php echo $errors['role'] ?></div>
            <?php endif;?>
        </div>
        <div class="col-md-12">
          <div class="py-1">Active</div>
          <select name="disabled" id="inputState"  class="form-select">
            <option value="0" selected="">Yes</option>
            <option value="1" >No</option>
          </select>
        </div>
        <div class="text-center">
          <a href="<?php echo ROOT ?>/admin/roles" class="btn btn-secondary">Back to roles list</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>  
</div>    
      <?php else: ?>
        <div  class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
              You dont have permission!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <a href="<?php echo ROOT ?>/admin/roles" class="btn btn-secondary">Back to roles list</a>
      <?php endif ?>

    


<!--DELETE SECTION -->
<?php elseif($action == 'delete'): ?>
  <?php if(!empty($row)): ?>
      <div class="card-body">
        <?php if(user_can('delete_roles')): ?>
      <h5 class="card-title">Delete role <?php echo esc(strtoupper($row->role)) ?? ''?>  if you are sure</h5>
      <form method="post" class="row g-3 ">
        <div class="col-md-12">
          <div class="form-control w-50"><?php echo  set_value('role',$row->role) ?></div>
        </div>
        <div class="col-md-12">
            <div class="py-2">Active </div>
             <div class="form-control w-50"><?php echo  set_value('disabled',$row->disabled)? 'No': 'Yes' ?></div>
        </div>
        <div class="text-center">
         <a href="<?php echo ROOT ?>/admin/roles" class="btn btn-secondary">Back to roles </a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
       <?php else: ?>
        <div  class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
              You dont have permission!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>
    </div>
  <?php else: ?>    
    <div  class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        no record found to edit here!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>


<!--EDITING roles SECTION OR PAGE-->
<?php elseif($action == 'edit'): ?>
<?php if(!empty($row)): ?>
<div class="row">
  <?php if(user_can('edit_roles')): ?>
        <div class="col-lg-12">
          <div class="card text-center mx-auto" style="width:30rem">
              <div class="card-body">
                <h5 class="card-title">Edit role</h5>
                <form method="post" class="row g-3">
                  <div class="col-md-12">
                    <input type="text" value="<?php echo  set_value('role',$row->role) ?>" name="role" class="form-control" placeholder="role name">
                      <?php if(!empty($errors['role'])):?>
                          <div class="text-danger"><?php echo $errors['role'] ?></div>
                      <?php endif;?>
                  </div>
                  
                  <div class="col-md-12">
                    <select name="disabled" id="inputState"  class="form-select">
                      <option <?php echo set_select('disabled','0', $row->disabled) ?> value="0" selected="">Yes</option>
                      <option <?php echo set_select('disabled','1', $row->disabled) ?> value="1" >No</option>
                    </select>
                  </div>
                  <div class="text-center">
                                        <a href="<?php echo ROOT ?>/admin/roles" class="btn btn-secondary">Back to roles list</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
        <?php else: ?>
          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
                You dont have permission!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       <?php endif ?>
      
      <?php else: ?>    

      <div  class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
          no record found to edit!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php endif ?>



  <!--TABLE SECTION OR PAGE-->
<?php else:?>
    <?php if(user_can('view_roles')): ?>
    <div class="pagetitle">
      <h1>roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="i<?php echo ROOT ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo esc($data['title']) ?? '' ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <form method="post" class=" card">
            <div class="card-body ">
              <h5 class="card-title d-flex">
                <a class="pe-3" href="<?php echo ROOT ?>/admin/roles/add"><div class="btn btn-primary bg-dark float-end ">Post new roles <i class="bi bi-pencil h5"></i></div></a>
                <button  class="btn btn-success float-end ">Save Role <i class=" h5"></i></button>
               
              </h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead >
                    <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions<i class="bi bi-chevron-double-down px-1"></i></th>
                    </tr>
                    </thead>
                    <?php if(!empty($rows)): ?>    
                    <tbody >
                   
                        <?php foreach ($rows as $row): ?>
                    <tr>
                        <th scope="row"><?php echo esc($row->id ?? 'unknown') ?></th>
                        <td><?php echo esc($row->role ?? 'unknown') ?></td>
                        <td>
                         <div class="row">
                          
                             <?php $incm = 0 ?>
                              <?php foreach(PERMISSIONS as $permission): ?>
                                <?php 
                                $incm ++ ;
                                $row->permissions = $row->permissions ?? [];
                                ?>
                                
                                <?php if(strtolower($row->role) == 'admin'): ?>
                                <div class="col-md-6">
                                  <div class="form-check form-switch">
                                    <input checked disabled  class="form-check-input" type="checkbox" id="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>" >
                                    <label class="form-check-label" for="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>"><div>All permissions</div></label>
                                  </div>
                                </div>
                                  <?php break; ?>
                                <?php endif ?>
                                <div class="col-md-6">
                                  <div class="form-check form-switch">
                                    <input  <?php echo (in_array($permission, $row->permissions)? 'checked': '') ?> value="<?php echo $permission ?>" name="<?php echo $row->id?>_<?php echo $incm ?>" class="form-check-input" type="checkbox" id="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>" >
                                    <label class="form-check-label" for="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>"><div><?php echo esc(str_replace('_', ' ',$permission)) ?></div></label>
                                  </div>
                                </div>
                              <?php endforeach ?>  
               
                         </div>
                        </td>
                        <td><?php echo esc($row->disabled ? 'No': 'Yes' ?? 'unknown') ?></td>

                        <td>
                            <a href="<?php echo ROOT ?>/admin/roles/delete/<?php echo $row->id ?>"><i class="bi bi-trash text-danger pe-2"></i></a>
                            
                            <a href="<?php echo ROOT ?>/admin/roles/edit/<?php echo $row->id ?>"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                    <?php endforeach  ?>
                    </tbody>
                    <?php else: ?>
                    <tr class='text-center'><td colspan = '6'>no records found</td></tr>
                    <?php endif ?>
                </table>
              </div>
              <!-- End Table  -->
            </div>
          </form>
        </div>
      </div>
    </section>
     <?php else: ?>
          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
                You dont have permission!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    <?php endif ?>
    <?php endif ?>

       <?php else: ?>
          <div  class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
                You dont have permission!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    <?php endif ?>
</main>

<?php  $this->view('admin/footer') ?>
