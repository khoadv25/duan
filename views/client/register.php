<!-- breadcrumb start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="radios-breadcrumb breadcrumbs">
            <ul class="list-unstyled d-flex align-items-center">
                <li class="radiosbcrumb-item radiosbcrumb-begin">
                    <a href="index.html"><span>Home</span></a>
                </li>
                <li class="radiosbcrumb-item radiosbcrumb-end">
                    <span>Register</span>
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

            <div class="row mt-none-30">




                <div class="col-lg-6 mt-30 mx-auto">
                    <div class="account__wrap pr-60">
                        <h2 class="account__title">Sign Up</h2>

                        <?php if (isset($_SESSION['errors'])) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php unset($_SESSION['errors']); ?>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="account__input-field">
                                        <label for="name">Full Name</label>
                                        <input id="name" type="text" placeholder="Enter full name*" name="fullname"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['fullname'] : null ?>">
                                    </div>
                                    <div class="account__input-field">
                                        <label for="name">Address</label>
                                        <input id="name" type="text" placeholder="Địa chỉ của bạn*" name="address"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['address'] : null ?>">

                                    </div>
                                    <div class="account__input-field">
                                        <label for="email">Email Address</label>
                                        <input id="email" type="email" placeholder="Địa chỉ Email Address" name="email"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>">

                                    </div>
                                </div>

                                <div class="col-lg-6 ">
                                    <div class="account__input-field">
                                        <label for="email">Phone</label>
                                        <input id="text" type="text" placeholder="Number phone" name="phone"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phone'] : null ?>">

                                    </div>
                                    <div class="account__input-field">
                                        <label for="password">New Password</label>
                                        <input id="password" type="text" placeholder="Create password" name="password"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>">

                                    </div>
                                </div>
                            </div>


                            <div class="account__btn">
                                <button class="thm-btn thm-btn__2">
                                    <span class="btn-wrap">
                                        <span>Sign Up</span>
                                        <span>Sign Up</span>
                                    </span>
                                </button>

                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account end -->
<?php 

if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);} 
?>