<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="container">
        <div class="row mx-auto">


            <div class="col-xs-12 col-md-3 p-5">
                <div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20" style="padding-right: 0;">
                    <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                    <div class="c-content-title-3 c-title-md c-theme-border">
                        <h3 class="c-left c-font-uppercase">MENU TÀI KHOẢN</h3>
                        <div class="c-line c-dot c-dot-left "></div>
                    </div>

                    <div class="c-content-ver-nav">
                        <ul class="c-menu c-arrow-dot c-square c-theme">
                            <li><a href="<?= BASE_URL . "?act=profile" ?>">Thông tin tài khoản</a></li>
                            <li><a href="<?= BASE_URL . "?act=lichsudonhang" ?>">Lịch sử giao dịch</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-6 m-t-15">
                    <div class="c-content-title-3 c-title-md c-theme-border">
                        <h3 class="c-left c-font-uppercase">Menu giao dịch</h3>
                        <div class="c-line c-dot c-dot-left "></div>
                    </div>
                    <div class="c-content-ver-nav m-b-20">
                        <ul class="c-menu c-arrow-dot c-square c-theme">
                            <li><a href="/Home/BuyRandomNickLog">Lịch sử vận may</a></li>
                            <li><a href="/Home/BuyNickLog">Tài khoản đã mua</a></li>
                            <li><a href="/Home/TaiKhoanTraGop">Tài khoản trả góp</a></li>
                            <li><a href="/Home/Dichvudathue">Dịch vụ đã thuê</a></li>

                            <li><a href="/Home/SellNick">Quản lý bán nick</a></li>
                            <li><a href="/Home/MenuCongtacvien">Quản lý dịch vụ</a></li>


                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-md-9 mt-4">
                <?php require_once PATH_VIEW . $main . '.php'; ?>
            </div>

        </div>
    </div>