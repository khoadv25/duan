<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mx-4">
        <h1 class="h3 mb-2 text-gray-800">
            <?= $title ?>
        </h1>
        <div class="mx-4 ">
            <form action="" method="POST">
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Danh sách đơn hàng</option>
                    <?php foreach ($trangthai as $key => $value): ?>
                        <option value="<?= $value['id']?>"><?= $value['status_name']?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary">click</button>
            </form>
        </div>


    </div>

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
                        <?php if (isset($listAllDonHang)) : ?>
                            <?php foreach ($listAllDonHang as $list) : ?>
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
                                        <a href="<?= BASE_URL_ADMIN ?>?act=donhang-active&id=<?= $list['id'] ?>" class="btn bg-success"><?= $list['status_name'] ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!isset($listAllDonHang)) : ?>
                            <h2>Không tồn tại trạnh thái đơn hàng nào</h2>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>