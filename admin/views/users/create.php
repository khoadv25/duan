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
                            <label for="name" class="form-label">username:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['username'] : null ?>" placeholder="Enter name" name="username">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>" placeholder="Enter password" name="password">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">address:</label>
                            <input type="text" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['address'] : null ?>" placeholder="Enter address" name="address">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">fullname:</label>
                            <input type="text" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['fullname'] : null ?>" placeholder="Enter fullname" name="fullname">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">phone:</label>
                            <input type="number" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phone'] : null ?>" placeholder="Enter phone" name="phone">
                        </div>  
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" placeholder="Enter email" name="email">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="mb-3 mt-3">
                            <label for="type" class="form-label">Chức vụ:</label>
                            <select name="role" id="type" class="form-control">
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['role'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['role'] == 0 ? 'selected' : null ?> value="0">Member</option>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="type" class="form-label">Trạng Thai:</label>
                            <select name="status" id="type" class="form-control">
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['role'] == 1 ? 'selected' : null ?> value="1">Hoạt Động</option>
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['role'] == 0 ? 'selected' : null ?> value="0">ngưng hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>