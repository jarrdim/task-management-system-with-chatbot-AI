
<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>


  <main id="main" class="main">
    <?php if(user_can('view_dashbord')): ?>
    <div class="pagetitle">
      <h1>HOME</h1>

    </div><!-- End Page Title -->
<section>
  <div class="card " style="font-size:17px;">
    <div class="card-body p-5">
     <strong> Welcome, <?php echo esc(Auth::getUsername())?></strong>
    


    </div>
  </div>
</section>
<section>
  <div class="card " style="font-size:17px;">
    <div class="card-body p-5">
     <strong> Task Progress</strong>
     <div class="row">
      <div class="col-md-9 card">
        <div class="table-responsive">
          <table class="table  table-striped">
            <thead>
              <th>Task</th>
              <th>Progress Status</th>
              <th>Action</th>
            </thead>
            <?php if(!empty($rows)):?>
            <tbody>
              <?php foreach($rows as $row):?>
                <tr>
              <td><?php echo esc($row->task_name)?></td>
              <?php $status = $row->status;
             
              ?>
              <?php if($status == "Completed"):?>
              <td class="text-primary"><?php echo esc($row->status)?>
              <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </td>
            <?php elseif($status == "Pending"):?>
                <td class="text-warning">
               <?php echo esc($row->status)?>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
            <?php elseif($status == "Incomplete"):?>
                <td class="text-danger">
               <?php echo esc($row->status)?>
               <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
                </td>
            <?php elseif($status == "In progress"):?>
                <td class="text-info">
               <?php echo esc($row->status)?>
               <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
              <?php else:?>
                <td class="text-primary"><?php echo esc($row->status)?></td>
                <?php endif?>
              <td>
                    <button type="button" class="btn btn-light" onclick="getDetails('<?php echo $row->id?>')"
                                        data-bs-toggle="modal" data-bs-target="#detailModal">
                                          <i class="bi bi-folder2-open me-4 text-info"></i>
                      </button>

                    <a class="btn btn-light" href="<?php  echo ROOT?>/admin/assignedtasks/"><i class="bi bi-eye text-danger"></i></a>
              </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <?php else:?>
              <tbody>
                <td colspan='3'>No tasks</td>
              </tbody>

              <?php endif;?>
          </table>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-md-8">
                <?php if(!empty($num)):?>
                <div class="h4"><strong><?php echo $num?></strong></div>
                <?php else:?>
                  <div class="h4"><strong>0</strong></div>
                <?php endif;?>
                  <div class="fw-bold"> Total Tasks</div>
          
                </div>
                <div class="col-sm-4">
                    <div class="mx-auto">
            <i class="bi bi-circle-square h2 text-info"></i>
            </div>
                </div>
            </div>
          </div>
        
        </div>
      </div>
     </div>
    

    </div>
  </div>
</section>

<section>
  <div class="card " style="font-size:17px;">
    <div class="card-body p-5">
     Stay organized with a list of tasks and assignments. Track pending tasks and deadlines to ensure timely completion.
<br>
<br>
    <div>
      Update your personal information,  and manage task preferences conveniently from your dashboard.
    </div>
    <br>
    <div class="text-info">
      

      Explore the various sections of the dashboard to streamline your HR tasks and enhance productivity. Should you require any assistance or have questions, our support team is here to help.
    </div>

    </div>
  </div>
</section>
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

     <?php else: ?>
            <div  class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
                  You dont have permission!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif ?>
  </main><!-- End #main -->







  <!-- <div class="row">
    <div class="col-md-4">
                    <div class="container" style="position: fixed; bottom: 0px; right: 0px">
                        <div class="chatbox" >
                            <div class="chatbox__support" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div class="chatbox__header">
                                    <div class="chatbox__image--header">
                                        <img src="data:image/jpeg;base64,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"
                                            alt="image" height="70" width="70">
                                    </div>
                                    <div class="chatbox__content--header">
                                        <h4 class="chatbox__heading--header">Chat support</h4>
                                        <p class="chatbox__description--header">Hi. My name is Jack Assist Chatbot. How
                                            can I help you?</p>
                                    </div>
                                </div>
                                <div class="chatbox__messages">
                                    <div></div>
                                </div>
                                <div class="chatbox__footer">
                                    <input type="text" placeholder="Write a message...">
                                    <button class="chatbox__send--footer send__button">Send</button>
                                </div>
                            </div>
                            <div class="chatbox__button">
                                <button><img src="<?php echo ROOT?>/assets/img//chatbox-icon.svg" /></button>
                            </div>
                        </div>
                    </div>
                </div>
    </div> -->
  


















    <?php  $this->view('admin/footer') ?>






























    <script>

     function getDetails(id)
    {
   
      $.ajax({
      url: "<?php echo  ROOT?>/admin/ajaxData/view/"+id,
      method: 'GET',
      //data: { id: id},
      dataType: 'json',
      success: function (response) {

    

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