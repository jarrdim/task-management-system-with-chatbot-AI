
<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>


  <main id="main" class="main">
    <?php if(user_can('view_tasks')): ?>
    <div class="pagetitle">
       <?php if(user_can('assign_task')):?>
      <h1>ASSIGN NEW TASKS</h1>
             <button type="button" class="btn btn-danger" data-row-id="{{$row->id}}"
                                  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                 continue
               </button>

               <?php  else:?>
                <h1>YOUR ASSIGNED TASKS </h1>
        <?php endif;?>
        <?php if(message()): ?>
        <div class ="alert alert-danger text-center"><?php echo message('', true) ?></div>
        <?php endif;?>


                 
             

    </div><!-- End Page Title -->


<!--MODAL-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form method="POST">
            
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Task Name</label>
                        <div class="col-sm-10">
                          <input placeholder="Enter Task Name" name="task_name"  value= "<?php echo set_value('task_name')?>" type="text" class="form-control" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="message-text" class="col-sm-2 col-form-label">Task Description</label>
                        <div class="col-sm-10">
                          <textarea name="task_description"  placeholder="Enter Task Description"class="form-control" id="message-text"></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Start Time</label>
                        <div class="col-sm-10">
                          <input placeholder="Start time" name="start_time" value= "<?php echo set_value('time')?>" type="date" class="form-control" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">End Time</label>
                        <div class="col-sm-10">
                          <input placeholder="End time" name="end_time" value= "<?php echo set_value('end_time')?>" type="date" class="form-control" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Assign To</label>
                        <div class="col-sm-10">
                          <?php if(!empty($employees)):?>
                          <select placeholder="Select Employees" name="assigned_to" class="form-select" aria-label="Default select example" required>
                            
                          <?php foreach($employees as $row):?>
                        
                            <option value="<?php echo esc($row->id)?>"><?php echo esc($row->username)?></option>
                            
                            <?php endforeach;?>
                          </select>
                          <?php endif;?>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Submit Button</label>
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>

                  
                    </form><!-- End General Form Elements -->
            
          </div>
      
        </div>
      </div>
      </div>

      <!--END MODEL-->




      <section>
        <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-12">
                      <?php if(!empty($rows)):?>
                      <div class="table-responsive">
     
                          <table class="table table-striped">
                            
                              <thead >
                              
                                <tr>
                                  <th>Task Title</th>
                                  <th>Assigned To</th>
                                  <th>Start Time</th>
                                  <th>End Time</th>
                                  <th>Status  </th>
                                  <th >Actions<i class="bi bi-chevron-double-down px-1"></i></th>
                                </tr>
                                
                     
                            
                              </thead>
                              
                              <tbody >
                                
                              <?php foreach($rows as $row):?>
                                <tr>
                                <td style="font-size:13px;" class="text-primary"><?php echo esc($row->task_name) ?></td>
                                      <td style="font-size:13px;"><?php echo esc($row->username) ?><?php echo "  (".esc($row->email)?>)</td>
                                      <td style="font-size:13px;"><?php echo esc($row->start_time) ?></td>
                                      <td style="font-size:13px;"><?php echo esc($row->end_time)?></td>
                                      <td style="font-size:13px;"><?php echo esc($row->status)?> </td>
                                         <td style="font-size:13px;">
                                          
                                        <button type="button" class="btn btn-light"  onclick="getData('<?php echo $row->id?>')"
                                            data-bs-toggle="modal" data-bs-target="#editModal1">
                                            <i class="bi bi-pencil-fill me-3 text-green "></i>
                                        </button>

                                        <button type="button" class="btn btn-light" onclick="getDetails('<?php echo $row->id?>')"
                                            data-bs-toggle="modal" data-bs-target="#detailModal">
                                            <i class="bi bi-folder2-open me-4 text-info"></i>
                                        </button>

                                            <?php if(Auth::getRole_name() == "admin"):?>
                                              <a href="<?php echo ROOT?>/admin/assignedtasks/delete/<?php echo $row->id?>"><i class="bi bi-trash3 text-danger btn btn-light"></i></a>
                                            <?php endif;?>

                                        </td>
                                </tr>
                          
                                
                                  <?php endforeach;?>
                              </tbody>
                            
                          </table>
                        </div>
                        <?php else:?>
                          <div class="text-center text-secondary">
                              No record found
                          </div>
                        <?php endif;?>
                  
                  </div>
              </div>
          </div>

        </div>

        <!--edit MODAL-->
      <div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
          <div class="text-center"><strong>EDIT TASK</strong></div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php if(Auth::getRole_name() == 'admin'):?>
          <form method="POST">
            
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Task Name</label>
                        <div class="col-sm-10">
                          <input  placeholder="Enter Task Name" name="task_name"  value= "" type="text" class="form-control task_name" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="message-text" class="col-sm-2 col-form-label">Task Description</label>
                        <div class="col-sm-10">
                          <textarea  name="task_description"  placeholder="Enter Task Description"class="form-control task_description" id="message-text"></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Start Time</label>
                        <div class="col-sm-10">
                          <input placeholder="Start time" name="start_time" value= "" type="text" class="form-control start_time" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">End Time</label>
                        <div class="col-sm-10">
                          <input placeholder="End time" name="end_time" value= "" type="text" class="form-control end_time" required>
                        </div>
                      </div>
                        <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select placeholder="Status" name="status" class="form-select status" aria-label="Default select example" required>
                            
                        
                        
                            <option class="statusName" value="<?php echo esc($row->status)?>"><?php echo esc($row->status)?></option>
                            <option value="Incomplete">Incomplete</option>
                            <option value="Completed">Completed</option>
                            <option value="In progress">In Progress</option>
                            <option value="Pending">Pending</option>
                        
                          </select>
                        
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Assign To</label>
                        <div class="col-sm-10">
                          <?php if(!empty($employees)):?>
                          <select placeholder="Select Employees" name="assigned_to" class="form-select assigned_to" aria-label="Default select example" required>
                            
                          <?php foreach($employees as $row):?>
                        
                            <option class="selectedName" value="<?php echo esc($row->id)?>"><?php echo esc($row->username)?></option>
                            
                            <?php endforeach;?>
                          </select>
                          <?php endif;?>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Submit Button</label>
                        <div class="col-sm-10">
                          <!-- <button type="button" onclick="sendData()" class="btn btn-primary">UPDATE</button> -->
                        </div>
                        
                      </div>

          </form>
          <!--USER PART-->
            <?php else:?>
            
                  <form method="POST">

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Task Name</label>
                <div class="col-sm-10">
                  <input  placeholder="Enter Task Name" name="task_name" disabled  value= "" type="text" class="form-control task_name" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="message-text" class="col-sm-2 col-form-label">Task Description</label>
                <div class="col-sm-10">
                  <textarea  name="task_description"  disabled placeholder="Enter Task Description"class="form-control task_description" id="message-text"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Start Time</label>
                <div class="col-sm-10">
                  <input placeholder="Start time" disabled name="start_time" value= "" type="text" class="form-control start_time" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">End Time</label>
                <div class="col-sm-10">
                  <input placeholder="End time"  disabled name="end_time" value= "" type="text" class="form-control end_time" required>
                </div>
              </div>
                <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select placeholder="Status" name="status" class="form-select status" aria-label="Default select example" required>
                    
                  
                  
                    <option class="statusName" value="<?php echo esc($row->status)?>"><?php echo esc($row->status)?></option>
                    <option value="Incomplete">Incomplete</option>
                    <option value="Completed">Completed</option>
                    <option value="In progress">In Progress</option>
                    <option value="Pending">Pending</option>
                  
                  </select>
                  
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
          
                  <input placeholder="End time"  disabled class="form-control selectedName assigned_to" disabled name="end_time" value= "<?php echo esc(Auth::getUsername())?>" type="text"  required>
                </div>
              </div>

              <div class="row mb-3">
              
                <div class="col-sm-10">
                  <!-- <button type="button" onclick="sendData()" class="btn btn-primary">UPDATE</button> -->
                </div>
                
              </div>

          </form>

                  <?php endif;?>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="sendData()" class="btn btn-primary">UPDATE</button>
          </div>
        </div>
      </div>
      </div>

      <!--END MODEL-->

      <!--VIEW DETAILS MODAL-->

        <!--edit MODAL-->
      <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog  ">
        <div class="modal-content">
          <div class="modal-header">
          
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center bg-primary"><strong>TASK DETAILS</strong></div>
      
              <div class="table-responseive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th>Task Title</th>
                      <td ><div class="taskName"></div></td>
                    </tr>
                      <tr>
                      <th>Task Description</th>
                      <td ><div class="taskDescription text-info"></div></td>
                    </tr>
                      <tr>
                      <th>Start Time</th>
                      <td ><div class="startTime"></div></td>
                    </tr>
                      <tr>
                      <th>End Time</th>
                      <td ><div class="endTime"></div></td>
                    </tr>
                      <tr>
                      <th>Assigned To</th>
                      <td ><div class="username"></div></td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td ><div class="statusName2">kk</div></td>
                    </tr>
                  </tbody>
            </table>
              </div>

                
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
          </div>
        </div>
      </div>
      </div>

      <!--END MODEL-->
      </section>

          <?php else: ?>
                  <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                        You dont have permission!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif ?>
  </main><!-- End #main -->



  









  <?php  $this->view('admin/footer') ?>
  
  <script>

    

    let idn = "";
    function getData(id)
    {

      idn = id;
      $.ajax({
      url: "<?php echo  ROOT?>/admin/ajaxData/view/"+id,
      method: 'GET',
      //data: { id: id},
      dataType: 'json',
      success: function (response) {

   


              response.forEach(task => {
                document.querySelector(".task_name").value = task.task_name;
               
                document.querySelector(".task_description").value = task.task_description;
                document.querySelector(".start_time").value = task.start_time;
                document.querySelector(".end_time").value = task.end_time;
                document.querySelector(".statusName").value = task.status;
                document.querySelector(".selectedName").innerHTML = task.username;
              
            });
    
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText); // You can see the error message here
      }
    });
    }

    function sendData()
    {
    
      var task_name = document.querySelector(".task_name").value ;
      var task_description = document.querySelector(".task_description").value ;
      var start_time = document.querySelector(".start_time").value ;
      var end_time = document.querySelector(".end_time").value ;
       var status = document.querySelector(".status").value ;
      var selectedName = document.querySelector(".assigned_to").value;
   
      $.ajax({
      url: "<?php echo ROOT?>/admin/ajaxData/edit/"+idn,
      method: 'POST',
      data: {id:idn, assigned_to :selectedName, end_time : end_time,
        start_time: start_time,
        task_description :task_description,
        task_name :task_name,
        status:status
      
      },
      dataType: 'json',
      success: function (response) {

        console.log(response);
      // Reload the page
    location.reload();


            
    
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText); // You can see the error message here
      }
    });
    }


     function getDetails(id)
    {
   
  
      idn = id;
      $.ajax({
      url: "<?php echo  ROOT?>/admin/ajaxData/view/"+id,
      method: 'GET',
      //data: { id: id},
      dataType: 'json',
      success: function (response) {

    console.log(response);

              response.forEach(task => {
                document.querySelector(".taskName").innerHTML = task.task_name;
                 console.log(task.status);
                document.querySelector(".taskDescription").innerHTML= task.task_description;
                document.querySelector(".startTime").innerHTML= task.start_time;
                document.querySelector(".endTime").innerHTML= task.end_time;
                document.querySelector(".statusName2").innerHTML = task.status;
                //console.log(stat);
                document.querySelector(".username").innerHTML= task.username;
               // document.querySelector(".selectedName").innerHTML = task.username;
              
            });
    
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText); // You can see the error message here
      }
    });
    }
  </script>
  