<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div>
        <div class="mx-4">
            <form action="" method="POST">
                <div>
                    <label for="">từ ngày</label>
                    <input type="date" name="star_date">
                </div>
                <div>
                    <label for="">đến ngày</label>
                    <input type="date" name="end_date">
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh Thu Theo tìm kiếm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($totalRevenue) ?> $</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    DataTables
                </h6>
            </div>
            <div class="card-body " style="font-size: 10px;">



                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã Bill</th>
                                <!-- <th>email user</th> -->
                                <th>ngày Oder</th>
                                <th>address</th>
                                <th>tổng tiền</th>
                                <th>NgườiNhận</th>
                                <th>payment_id</th>
                                <!-- <th>id_voucher</th> -->
                                <th>note</th>
                                <th>full_name</th>
                                <th>phone</th>
                                <th>Tổng tiền</th>
                                <th>Thao Tac</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã Bill</th>
                                <!-- <th>email user</th> -->
                                <th>ngày Oder</th>
                                <th>address</th>
                                <th>tổng tiền</th>
                                <th>NgườiNhận</th>
                                <th>payment_id</th>
                                <!-- <th>id_voucher</th> -->
                                <th>note</th>
                                <th>full_name</th>
                                <th>phone</th>
                                <th>Tổng tiền</th>
                                <th>Thao Tac</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if (isset($donHangTheoNgay)) : ?>
                                <?php foreach ($donHangTheoNgay as $list) : ?>
                                    <tr>
                                        <td><?= $list['ma_bill'] ?></td>
                                        <!-- <td><?= $list['email_user'] ?></td> -->
                                        <td><?= $list['order_date'] ?></td>
                                        <td><?= $list['address'] ?></td>
                                        <td><?= $list['total_money'] ?></td>
                                        <td><?= $list['reciver'] ?></td>
                                        <td><?= $list['payment_id'] == 0 ? 'Thanh Toán Khi Nhận Hàng' : 'Thanh Toán Momo' ?></td>
                                        <!-- <td><?= $list['id_voucher'] == 0 ? "Không" : $list['id_voucher'] ?></td> -->
                                        <td><?= $list['note'] == "" ? "Không" : $list['note'] ?></td>
                                        <td><?= $list['phone'] ?></td>
                                        <td><?= $list['full_name'] ?></td>
                                        <td><?= number_format($list['total_money']) ?> $</td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=donhang-detail&id=<?= $list['id'] ?>" class="btn btn-info">Chi Tiết</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (!isset($donHangTheoNgay)) : ?>
                                <h2>Không tồn tại trạng thái đơn hàng nào</h2>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>