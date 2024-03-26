<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>

        <a href="<?= BASE_URL_ADMIN ?>?act=product-s-create" class="btn btn-primary">Create</a>
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
                            <th>ID</th>
                            <th>DUng Lượng</th>
                            <th>Số Lượng</th>
                            <th>Màu</th>
                            <th>Giá SP</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Sản Phẩm Gốc</th>
                            <th>Sale</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>DUng Lượng</th>
                            <th>Số Lượng</th>
                            <th>Màu</th>
                            <th>Giá SP</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Sản Phẩm Gốc</th>
                            <th>Sale</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                    <tbody>

                   <?php foreach ($show as $key => $show) :?>
                        <tr>
                            <td><?= $show['id'] ?? '' ?></td>
                            <td><?= $show['size_name'] ?? ''  ?></td>
                            <td><?= $show['quantity'] ?? ''  ?></td>
                            <td><?= $show['color_name'] ?? '' ?></td>
                            <td><?= $show['price'] ?? ''  ?></td>

                            <td>
                                <img src="<?= BASE_URL . $show['image_url'] ?? ''  ?>" alt="" width="100px">
                            </td>

                            <td class="text-center">
                                
                                    <div>
                                        <img src="<?= BASE_URL . $show['image_product'] ?? ''  ?>" alt="" width="50px">
                                    </div>

                                    <div>
                                        <?= $show['product_name'] ?? ''  ?>
                                    </div>
                                
                            </td>

                            <td><?= $show['sale'] ?? 'Không' ?></td>

                            <td>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product" class="btn btn-info">Back</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-s-update&id=<?= $productDetail['id'] ?>" class="btn btn-warning">Update</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-delete&id=<?= $productDetail['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Delete</a>
                            </td>


                            <?php endforeach;?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>