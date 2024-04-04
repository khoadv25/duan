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



        <div class="row mt-none-30 mx-auto">

            <div class="mt-30 mx-auto" style="width: 500px;">
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
                        <div class="d-flex justifiy justify-content-evenly">
                            <div class="account__btn">
                                <button class="thm-btn thm-btn__2">
                                    <span class="btn-wrap">
                                        <span>Login</span>
                                        <span>Login</span>
                                    </span>
                                </button>

                            </div>
                            <div class="account__btn align-items-end">
                                <p class="thm-btn thm-btn__2">
                                    <a class="btn-wrap" href="<?= BASE_URL . '?act=register' ?>">
                                        <span>Sign Up</span>
                                        <span>Sign Up</span>
                                    </a>
                                </p>

                            </div>
                        </div>
                        <div class="account__btn d-flex justify-content-center mt-4 ">
                                <p class="thm-btn thm-btn__2">
                                    <a class="btn-wrap" href="<?= BASE_URL . '?act=resetpassword' ?>">
                                        <span>Quên Mật Khẩu</span>
                                        <span>Quên Mật Khẩu</span>
                                    </a>
                                </p>

                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account end -->