<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Create
            </h6>
        </div>
        <div class="card-body">

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
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Mô Tả:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="mota">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="cars">Brand:</label>
                            <select name="brand" id="cars">
                                <?php foreach ($brand as $key => $value) : ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="cars">danh mục:</label>
                            <select name="cate" id="cars">
                                <?php foreach ($categories as $key => $value) : ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="avatar" class="form-label">Avatar(Thumbnail):</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                    </div>

                <!-- bảng bien thẻ -->

                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="cars">Dung Lượng:</label>
                            <select name="size" id="cars">
                                <?php foreach ($size as $key => $value) : ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">số lượng:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="soluong">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="cars">Màu:</label>
                            <select name="color" id="cars">
                                <?php foreach ($color as $key => $value) : ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Giá :</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="price">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="avatar" class="form-label">image:</label>
                            <input type="file" class="form-control" id="avatar" name="images">
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">sale :</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="sale">
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=product" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>