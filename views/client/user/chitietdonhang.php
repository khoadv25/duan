<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <a href="<?= BASE_URL ?>?act=lichsudonhang" class="btn btn-danger">Back to list</a>
        
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Bill</th>
                            <th>product name</th>
                            <th>product image</th>
                            <th>Dung Lượng</th>
                            <th>Màu</th>
                            <th>Số Lượng</th>
                           

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Bill</th>
                            <th>product name</th>
                            <th>product image</th>
                            <th>Dung Lượng</th>
                            <th>Màu</th>
                            <th>Số Lượng</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($detail as $show) : ?>
                            <tr>
                                <td><?= $show['ma_bill'] ?></td>
                                <td><?= $show['name'] ?></td>
                                <td><img src="<?= BASE_URL . $show['image_url']?>" alt="" width="50px"></td>
                                <td><?= $show['size_name'] ?></td>
                                <td><?= $show['mau_name'] ?></td>

                                <td><?= $show['quantity'] ?></td>
                                
                               

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center">
       
    </div>
</div>