
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body "  style="font-size: 10px;">

            

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
                            <th>Trạng Tháo</th>    
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
                            <th>Trạng Tháo</th>    
  
                            <th>Thao Tac</th>    
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (isset($billUser)) :?>
                            <?php foreach ($billUser as $list) : ?>
                            <tr>
                                <td><?= $list['ma_bill'] ?></td>
                                <!-- <td><?= $list['email_user'] ?></td> -->
                                <td><?= $list['order_date'] ?></td>
                                <td><?= $list['address'] ?></td>
                                <td><?= $list['total_money'] ?></td>
                                <td><?= $list['reciver'] ?></td>
                                <td><?= $list['payment_id'] == 0 ? 'Thanh Toán Khi Nhận Hàng' : 'Thanh Toán Momo' ?></td>
                                <!-- <td><?= $list['id_voucher'] == 0 ? "Không" : $list['id_voucher']?></td> -->
                                <td><?= $list['note'] == "" ? "Không" : $list['note']?></td>
                                <td><?= $list['phone'] ?></td>
                                <td><?= $list['full_name'] ?></td>
                                <td><?= number_format($list['total_money']) ?> $</td>
                                <td><?=$list['status_name'] ?></td>
                                <td>
                                    <a  href="<?= BASE_URL ?>?act=chitietdonhang&id=<?= $list['id'] ?>" class="btn btn-info "
                                     style="font-size: 10px;">Chi Tiết</a>
                                    <?php if ($list['status_id'] == 1):?>
                                    <a
                                     href="<?= BASE_URL ?>?act=huydon&id=<?= $list['id'] ?>" class="btn bg-success"></a>
                                    <?php endif ;?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif;?>
                        <?php if (!isset($billUser)) :?>
                            <h2>Không tồn tại trạnh thái đơn hàng nào</h2>
                        <?php endif;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>