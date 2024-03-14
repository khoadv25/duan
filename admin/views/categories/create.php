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

            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                            <label for="type" class="form-label">Trạng Thai:</label>
                            <select name="status" id="type" class="form-control">
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['status'] == 1 ? 'selected' : null ?> value="1">Hoạt Động</option>
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['status'] == 0 ? 'selected' : null ?> value="0">ngưng hoạt động</option>
                            </select>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=categories" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>