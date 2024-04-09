 <?php 
        $this->view('includes/header');
         $this->view('includes/nav');

  ?>

    <main>
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6  ">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.pngk" alt="">
                                <span class="d-none d-lg-block">Jack classic</span>
                            </a>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-2 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-3">LOGIN TO CONTINUE  </h5>
                                    <p class="text-center small">Enter your personal details to login</p>
                                     <?php if(message()): ?>
                                    <div class ="alert alert-danger text-center"><?php echo message('', true) ?></div>
                                     <?php endif;?>
                                         <?php if(!empty($errors['email'])):?>
                                     <div class ="alert alert-danger text-center"><?php echo $errors['email'] ?></div> 
                                     <?php endif;?>
                                </div>

                                <form method= "POST" class="row g-3 ">
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control form-section" id="yEmail">
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>



                                    <div class="col-12 mb-5">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-section" id="">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a
                                                href="signup">Sign Up</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>
    </main><!-- End #main -->
    <section class="to-top-arrow">
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short h4"></i></a>
    </section>






 <?php 
        $this->view('includes/footer');
  ?>