
  <?php $this->view('admin/header') ?>
  <?php $this->view('admin/nav') ?>
  <!--ADD-->

<main id="main" class="main">













  <?php if($action == "add"):?>
    <?php if(user_can('add_user')):?>

      <?php else:?>
  <div style="margin-top:10rem;"class="alert alert-danger mb-5  text-center">You dont have permission to perform this action</div>
 <?php endif?>
    <!--EDIT-->
  <?php elseif($action == "edit"):?>
       <?php if(user_can('edit_user')):?>
      
      <?php else:?>
  <div style="margin-top:10rem;"class="alert alert-danger mb-5  text-center">You dont have permission to perform this action 1</div>
 <?php endif?>
    <!--DELETE-->
  <?php elseif($action == "delete"):?>
    
  <?php if(user_can('delete_user')):?>
      
  


  
  <div style="margin-top:10rem;"class="alert alert-danger mb-5  mt-2 text-center ">You sure want to delete this user<span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Warning</span></div>
  <form method="POST">
  
    <a href="<?php echo ROOT?>/admin/users" class="btn btn-primary text-light">back</a>
     <button type="submit" class="btn btn-danger">delete</button>
  </form>




    
    <?php else:?>
  <div style="margin-top:10rem;"class="alert alert-danger mb-5  text-center">You dont have permission to perform this action 2</div>
 <?php endif?>
  <?php else:?>
    <?php if(user_can('view_users')):?>
      <div class="card">
  
            <div class="card-body ">
              <h5 class="card-title d-flex">
                <!-- <a href="#"><div class="btn btn-primary float-end ">Add User

                </div></a> -->

              </h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table id="example" class="table table-striped">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">id</th>
                      <th scope="col">Username</th>  
                       <th scope="col">Email</th>                   
                      <th scope="col">Role</th>
                      <th scope="col">Date</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                      
                  <tbody>
              
                    <?php if(!empty($rows)): ?>
                        <?php foreach($rows as $row):?>
                    <tr class="text-start">
                      <th scope="row"><?php echo $row->id ?? "" ?></th>
                      <td><?php echo esc($row->username) ?? '' ?></td>
                      <td><?php echo esc($row->email) ?? '' ?></td>
                      <?php if($row->role==2):?>
                        <td> <span class="badge bg-primary">admin</span></td>
                     
                      <?php else:?>
                         <td> <span class="badge bg-success">user</span></td>
                         <?php endif;?>
                      <td><?php echo esc($row->date) ?? "" ?></td>

                      <td>
                          <a href="<?php echo ROOT?>/admin/users/delete/<?php echo esc($row->id) ?>"><i class="bi bi-trash text-danger"></i></a>
                          
                          <!-- <a href="<?php echo ROOT?>/admin/users/edit/<?php echo esc($row->id)?>"><i class="bi bi-pencil-square"></i></a> -->
                      </td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif;?>

                  
                
                     </tbody>
                </table>
              </div>
              <!-- End Table  -->
            </div>
          </div>
      <?php else:?>
  <div style="margin-top:10rem;"class="alert alert-danger mb-5  text-center">You dont have permission to perform this action 3</div>
 <?php endif?>

<?php endif?>
<!--
<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=" https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
                        -->
  <script src="<?php echo ROOT?>/assets/js/jquery-3.5.1.js"></script>
  <script src="<?php echo ROOT?>/assets/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo ROOT?>/assets/js/dataTables.bootstrap5.min.js"></script>


       <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>



<?php $this->view('admin/footer') ?>