
<?php  $this->view('admin/header') ?>
<?php  $this->view('admin/nav') ?>



 <main id="main" class="main">

    <div class="pagetitle">
      <h1>GATEPASS REQUEST FORM</h1>

    </div>


    <section class="section">
        <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body pt-3">
        
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Person's Name</label>
                  <div class="col-sm-10">
                    <input name="person_name"  value= "<?php echo set_value('person_name')?>" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Passport No</label>
                  <div class="col-sm-10">
                    <input name="passport" value= "<?php echo set_value('passport')?>" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select The Gate</label>
                  <div class="col-sm-10">
                    <select name="gate" class="form-select" aria-label="Default select example" required>
                  
                      <option value="1">Main Gate </option>
                      <option value="2"> Offshore</option>
   
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Request For</label>
                  <div class="col-sm-10">
                    <select  name= "request_for" class="form-select" aria-label="Default select example" required>
                      <option selected="">Entry</option>
                      <option value="1">Leave</option>
   
                    </select>
                  </div>
                </div>

         
                

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Vehicle No</label>
                  <div class="col-sm-10">
                    <input name="vehicle_no" value= "<?php echo set_value('vehicle_no')?>" type="text" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Entry Purpose</label>
                  <div class="col-sm-10">
                    <input name="entry_purpose" value= "<?php echo set_value('entry_purpose')?>" type="text" class="form-control"required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Entry Type</label>
                  <div class="col-sm-10">
                    <select name="entry_type" class="form-select" aria-label="Default select example" required>
                      
                      <option value="2">Single</option>
                      <option value="3">Multiple</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Company Name</label>
                  <div class="col-sm-10">
                    <input name="company_name" value= "<?php echo set_value('company_name')?>" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Expected Entry Date</label>
                  <div class="col-sm-10">
                    <input name="expected_entry_date"value= "<?php echo set_value('expected_entry_date')?>" type="date" class="form-control" required>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Mobile No</label>
                  <div class="col-sm-10">
                    <input name="mobile_no" value= "<?php echo set_value('mobile_no')?>" type="text" class="form-control"required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Vessel Name</label>
                  <div class="col-sm-10">
                    <input name="vessel_name"value= "<?php echo set_value('vessel_name')?>" type="text" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-lg-3">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-danger">Note</h5>

            <ul>
                <li>Entry Purpose should be filled in details</li>
                <li>Select the Entry Type either single or multiple.
                     Single means one Entry and one exit, and multiple means multiple entry and exit</li>
            </ul>
            </div>
          </div>

        </div>
      </div>
    </section>
 <?php  $this->view('admin/footer') ?>