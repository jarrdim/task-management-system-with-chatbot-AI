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
                                    <h5 class="card-title text-center pb-0 fs-3">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <form  method="post" class="row g-3 ">
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Name</label>
                                        <input class="form-control p-2 form-section" type=" text" name="username" placeholder="">
                                            <?php if(!empty($errors['username'])):?>
                                        <div class="text-danger"><?php echo $errors['username'] ?></div>
                                            <?php endif;?>
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control form-section" id="yEmail">

                                            <?php if(!empty($errors['email'])):?>
                                        <div class="text-danger"><?php echo $errors['email'] ?></div>
                                            <?php endif;?>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>



                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-section" id="">
                                            <?php if(!empty($errors['password'])):?>
                                        <div class="text-danger"><?php echo $errors['password'] ?></div>
                                            <?php endif;?>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input " style="border:solid thin !important ;"
                                                name="terms" type="checkbox" value="1" id="acceptTerms">
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                <a href="#">terms and conditions</a></label>
                                                    <?php if(!empty($errors['terms'])):?>
                                            <div class="text-danger"><?php echo $errors['terms'] ?></div>
                                                     <?php endif;?>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="login.html">Log
                                                in</a></p>
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