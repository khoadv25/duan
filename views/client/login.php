<!-- breadcrumb start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="radios-breadcrumb breadcrumbs">
            <ul class="list-unstyled d-flex align-items-center">
                <li class="radiosbcrumb-item radiosbcrumb-begin">
                    <a href="index.html"><span>Home</span></a>
                </li>
                <li class="radiosbcrumb-item radiosbcrumb-end">
                    <span>Account</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->


<!-- account start -->

<section class="account pb-90">


    <div class="container">



        <div class="row mt-none-30">
            <div class="col-lg-6 mt-30">
                <div class="account__wrap pr-60">
                    <h2 class="account__title">Sign Up</h2>
                    <form action="#">
                        <div class="account__input-field">
                            <label for="name">Your Name</label>
                            <input id="name" type="text" placeholder="Enter your name*" name="username">
                        </div>
                        <div class="account__input-field">
                            <label for="name">Full Name</label>
                            <input id="name" type="text" placeholder="Enter full name*" name="fullname">
                        </div>
                        <div class="account__input-field">
                            <label for="name">Address</label>
                            <input id="name" type="text" placeholder="Địa chỉ của bạn*" name="address">
                        </div>
                        <div class="account__input-field">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" placeholder="Địa chỉ Email Address" name="email">
                        </div>
                        <div class="account__input-field">
                            <label for="email">Phone</label>
                            <input id="email" type="email" placeholder="Number phone" name="phone">
                        </div>
                        <div class="account__input-field">
                            <label for="password">New Password</label>
                            <input id="password" type="text" placeholder="Create password">
                        </div>
                        <div class="account__input-field">
                            <input class="form-check-input" id="checkbox" type="checkbox" name="check">
                            <label class="form-check-label" for="checkbox">I agree to al <a href="#!">Terms</a> & <a href="#!">Condition</a> and Feeds</label>
                        </div>
                        <div class="account__btn">
                            <a class="thm-btn thm-btn__2" href="#!">
                                <span class="btn-wrap">
                                    <span>Sign Up</span>
                                    <span>Sign Up</span>
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>



            <div class="col-lg-6 mt-30">
                <div class="account__wrap pl-60">
                    <h2 class="account__title">Login here</h2>

                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="account__input-field">
                            <label for="lemail">Email Address</label>
                            <input id="lemail" type="email" placeholder="Enter Email Address" name="email">
                        </div>
                        <div class="account__input-field">
                            <label for="lpassword">Password</label>
                            <input id="lpassword" type="text" placeholder="password" name="password">
                        </div>
                        <!-- <div class="account__input-field">
                            <input class="form-check-input" id="lcheckbox" type="checkbox" checked>
                            <label class="form-check-label" for="lcheckbox">Remember Me?</label>
                        </div> -->
                        <div class="account__btn">
                            <button class="thm-btn thm-btn__2">
                                <span class="btn-wrap">
                                    <span>Login here</span>
                                    <span>Login here</span>
                                </span>
                            </button>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account end -->