<header class="header header__style-one">
    <div class="header__top-info-wrap d-none d-lg-block">
        <div class="container">
            <div class="header__top-info ul_li_between mt-none-10">
                <ul class="ul_li mt-10">
                    <li><i class="far fa-map-marker-alt"></i>Store Location</li>
                    <!-- <li><i class="far fa-truck"></i>Track Your Order</li>
                    <li><i class="fas fa-phone"></i>Call Us For Enquiry</li>
                    <li><i class="fas fa-heart"></i>Welcome to Radios. We provides Best Electronics item</li> -->
                </ul>
                <div class="header__top-right ul_li mt-10">
                    <div class="date">
                        <i class="fal fa-calendar-alt"></i> Friday, July 27, 2020
                    </div>
                    <div class="header__social ml-25">
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                        <a href="#!"><i class="fab fa-instagram"></i></a>
                        <a href="#!"><i class="fab fa-youtube"></i></a>
                        <a href="#!"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header__middle ul_li_between justify-content-xs-center">
            <div class="header__logo">
                <a href="<?= BASE_URL ?>">
                    <img src="<?= BASE_URL ?>assets/client/assets/img/logo/logo.svg" alt="">
                </a>
            </div>
            <form class="header__search-box" action="#">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value="">All Categories</option>
                        <option value="4">Summer collections</option>
                        <option value="5">Breakfast & Dairy</option>
                        <option value="6">Beverage & Drinks</option>
                        <option value="7">Cocolate Box</option>
                        <option value="8">Dried Food Corner</option>
                        <option value="9">Frozen Foods</option>
                        <option value="10">Baby Food Corner</option>
                        <option value="11">Milk & Juices</option>
                        <option value="12">Organic & Snacks</option>
                    </select>
                </div>
                <input type="text" name="search" id="search" placeholder="Search For Products" required />
                <button type="submit"><i class="far fa-search"></i>
                </button>
            </form>

            <div class="header__icons ul_li">

                <div class="icon">

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <a href=" <?= BASE_URL . '?act=login' ?>"><img src="<?= BASE_URL ?>assets/client/assets/img/icon/user.svg" alt=""></a>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                            <li><a class="dropdown-item" href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                            <?php if (!isset($_SESSION['user'])): ?>
                            <li><a class="dropdown-item" href="<?= BASE_URL . '?act=login' ?>">Đăng Nhập</a></li>
                            <?php endif; ?>

                            <li><a class="dropdown-item" href="<?= BASE_URL . '?act=cart-list' ?>">Giỏ Hàng</a></li>

                        </ul>
                    </div>

                </div>


                <div class="icon wishlist-icon">
                    <a href="#!">
                        <img src="<?= BASE_URL ?>assets/client/assets/img/icon/heart.svg" alt="">
                        <span class="count">0</span>
                    </a>
                </div>
                <div class="cart_btn icon">
                    <img src="<?= BASE_URL ?>assets/client/assets/img/icon/shopping_bag.svg" alt="">
                    <span class="count">0</span>
                </div>
            </div>
        </div>
    </div>
    <div class="header__cat-wrap" data-uk-sticky="top: 200; animation: uk-animation-slide-top;">
        <div class="container">
            <div class="header__wrap ul_li_between">
                <div class="header__cat ul_li">
                    <div class="hamburger_menu">
                        <a href="javascript:void(0);" class="active">
                            <div class="icon bar">
                                <span><i class="fal fa-bars"></i></span>
                            </div>
                        </a>
                    </div>
                    <ul class="category ul_li">
                        <li><a href="<?= BASE_URL ?>"><span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/hc_01.svg" alt=""></span>Trang Chủ</a></li>
                        <li><a href="#!"><span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/hc_02.svg" alt=""></span>Phụ Kiện</a></li>
                        <li><a href="#!"><span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/hc_04.svg" alt=""></span>Tv & Audios</a></li>
                        <li><a href="#!"><span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/hc_05.svg" alt=""></span>Printers & Ink</a></li>
                        <li><a href="#!"><span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/hc_06.svg" alt=""></span>Gaming & Fun</a></li>
                    </ul>
                </div>
                <div class="login-sign-btn">
                    <?php if (empty($_SESSION['user'])) : ?>
                        <a class="thm-btn" href="<?= BASE_URL . '?act=login' ?>">
                            <span class="btn-wrap">
                                <span>Login / Sign Up</span>
                                <span>Login / Sign Up</span>
                            </span>
                        </a>
                    <?php elseif (!empty($_SESSION['user'])) : ?>
                        <div class="icon">

                            <div class="dropdown">

                                <a class="thm-btn border rounded" data-bs-toggle="dropdown" href="<?= BASE_URL . '?act=login' ?>">
                                    <span class="btn-wrap">
                                        <span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/user.svg" alt=""><?= $_SESSION['user']['fullname'] ?></span>
                                        <span><img src="<?= BASE_URL ?>assets/client/assets/img/icon/user.svg" alt=""><?= $_SESSION['user']['fullname'] ?></span>
                                    </span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                                    
                                    <li><a class="dropdown-item" href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                                    <li><a class="dropdown-item" href="<?= BASE_URL . '?act=cart-list' ?>">Giỏ Hàng</a></li>

                                   
                                    
                                </ul>
                            </div>
                        <?php endif; ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</header>