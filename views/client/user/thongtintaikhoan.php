
<div class="panel">

<div class="panel">
    <div class="col-sm-12 dv-title">
        <h2>THÔNG TIN TÀI KHOẢN</h2>
        <div class="gach"></div>
    </div>
</div>
<div class="content_post">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <div class="col-md-12 has-textbox">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">ID của bạn:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al bb"><?= $user['id'] ?></spam>
                </div>
            </div>
            <div class="col-md-12 has-textbox">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">Tên tài khoản:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al bb"><?= $user['fullname'] ?></spam>
                </div>
            </div>

            <div class="col-md-12 has-textbox">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">Email:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al"><?= $user['email'] ?></spam>
                </div>
            </div>
            <div class="col-md-12 has-textbox">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">Mật khẩu:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al"><a href="<?= BASE_URL . '?act=changepassword' ?>" style="color:#19b1ff; font-weight:bold;">Nhấn đổi mật khẩu</a></spam>
                </div>
            </div>
            <div class="col-md-12 has-textbox">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">address:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al bb" style="color:#d70f0f;"><?= $user['address'] ?></spam>
                </div>
            </div>
            <div class="col-md-12 has-textbox">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">Số điện thoại:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al"><a href="/Home/ChangeMobile" style="color:#d70f0f;font-weight:bold;"><?= $user['phone'] ?></a></spam>
                </div>
            </div>
            <div class="col-md-12 has-textbox hide">
                <div class="form-group row">
                    <spam class="col-md-3 col-xs-6 control-label bb ar">Nhóm tài khoản:</spam>
                    <spam class="col-md-8 col-xs-6 control-label al"></spam>
                </div>
            </div>


        </div>
    </div>
</div>
</div>