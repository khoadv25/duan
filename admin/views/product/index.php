<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>

        <a href="<?= BASE_URL_ADMIN ?>?act=product-create" class="btn btn-primary">Create</a>
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
                            <th>Name</th>
                            <th>mô tả</th>
                            <th>Brand</th>
                            <th>danh mục</th>
                            <th>ảnh đại diện</th>
                            <th>Thao Tác</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>mô tả</th>
                            <th>Brand</th>
                            <th>danh mục</th>
                            <th>ảnh đại diện</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($product as $product) : ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['product_name'] ?></td>
                                <td><?= $product['description'] ?></td>
                                <td><?= $product['brand_name'] ?></td>
                                <td><?= $product['category_name'] ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" width="100px">
                                </td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=product-s&id=<?= $product['id'] ?>" class="btn btn-info">Detail</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=product-update&id=<?= $product['id'] ?>" class="btn btn-warning">Update</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=product-delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>