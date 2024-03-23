<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

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

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-8">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= $product['name'] ?>" placeholder="Enter name" name="name">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Mô tả :</label>
                            <input type="text" class="form-control" id="name" value="<?= $product['description'] ?>" placeholder="Enter name" name="description">
                        </div>
                        
                        <label for="cars">Brand:</label>
                        <select name="brand" id="cars">
                            <?php foreach ($brand as $key => $br) : ?>
                                <option value="<?= $br['id'] ?>" <?= $product['brand_id'] ?> <?= ($br['id'] == $product['brand_id']) ? "selected" : "" ?>><?= $br['name'] ?></option>
                                </option>
                            <?php endforeach ?>
                        </select>

                        <label for="cars">Danh mục:</label>
                        <select name="cate" id="cars">
                            <?php foreach ($categories as $key => $cate) : ?>
                                <option value="<?= $cate['id'] ?>" <?= $product['category_id'] ?> <?= ($cate['id'] == $product['category_id']) ? "selected" : "" ?>><?= $cate['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="mb-3 mt-3">
                            <label for="avatar" class="form-label">Avatar:</label>
                            <input type="file" class="form-control"  name="avatar" value="" name="avatar">
                            <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" width="100px">
                        </div>

                    </div>
                    

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=product" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>