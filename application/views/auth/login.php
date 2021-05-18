    <div class="container">
        <!-- Membuat tampilan halaman login -->
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                       <!--  Membuat card untuk menempatkan form login  -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" action="<?= base_url('auth'); ?>" method="post">
                                        <div class="form-group">
                                            <!-- Form untuk input username -->
                                            <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address or Username..." name="username" value="<?= set_value('username'); ?>">
                                            <?= form_error(
                                                'username',
                                                '<small class="text-danger pl-3">',
                                                '</small>'
                                            ); ?>
                                        </div>
                                        <div class="form-group">
                                            <!-- Form untuk input password -->
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error(
                                                'password',
                                                '<small class="text-danger pl-3">',
                                                '</small>'
                                            ); ?>
                                        </div>
                                        <!-- Button untuk submit input dengan nama button Login -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- link jika user lupa password -->
                                        <a class="small" href="<?= base_url('auth/forgotpass'); ?>">Forgot Password?</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>