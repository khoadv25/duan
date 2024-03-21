<?php

function voucherListAll()
{
    $title = 'Danh sách Voucher: ';
    $view = 'vouchers/index';
    $script = 'datatable';
    $script2 = 'vouchers/script';
    $style = 'datatable';

    $voucher = listAll('vouchers');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function voucherShowOne($id)
{
    $voucher = showOne('vouchers', $id);

    if (empty($voucher)) {
        e404();
    }

    $title = 'Chi tiết Voucher: ' . $voucher['voucher_name'];
    $view = 'vouchers/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function voucherCreate()
{
    $title = 'Danh sách Vouchers';
    $view = 'vouchers/create';

    if (!empty($_POST)) {

        $data = [
            "voucher_name" => $_POST['voucher_name'] ?? null,
            "discount" => $_POST['discount'] ?? null,
            "point_discount" => $_POST['point_discount'] ?? null,
        ];

        $errors = validateVoucherCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=vouchers-create');
            exit();
        }

        insert('vouchers', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=vouchers');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateVoucherCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['voucher_name'])) {
        $errors[] = 'Trường voucher_name là bắt buộc';
    } else if (strlen($data['voucher_name']) > 50) {
        $errors[] = 'Trường voucher_name độ dài tối đa 50 ký tự';
    }

    if (empty($data['discount'])) {
        $errors[] = 'Trường discount là bắt buộc';
    } else if (strlen($data['discount']) > 100) {
        $errors[] = 'Trường discount độ dài tối đa 50 ký tự';
    }

    if (empty($data['point_discount'])) {
        $errors[] = 'Trường point_discount là bắt buộc';
    } else if (strlen($data['point_discount']) > 100) {
        $errors[] = 'Trường point_discount độ dài tối đa 50 ký tự';
    }

    return $errors;
}

function voucherUpdate($id)
{
    $user = showOne('vouchers', $id);

    if (empty($voucher)) {
        e404();
    }

    $title = 'Cập nhật Voucher: ' . $voucher['voucher_name'];
    $view = 'vouchers/update';

    if (!empty($_POST)) {
        $data = [
            "voucher_name" => $_POST['voucher_name'] ?? null,
            "discount" => $_POST['discount'] ?? null,
            "point_discount" => $_POST['point_discount'] ?? null,
            
        ];

        $errors = validateVoucherUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('vouchers', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=vouchers');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validateVoucherUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['voucher_name'])) {
        $errors[] = 'Trường voucher_name là bắt buộc';
    } else if (strlen($data['voucher_name']) > 50) {
        $errors[] = 'Trường voucher_name độ dài tối đa 50 ký tự';
    }

    if (empty($data['discount'])) {
        $errors[] = 'Trường discount là bắt buộc';
    } else if (strlen($data['discount']) > 100) {
        $errors[] = 'Trường discount độ dài tối đa 50 ký tự';
    }

    if (empty($data['point_discount'])) {
        $errors[] = 'Trường point_discount là bắt buộc';
    } else if (strlen($data['point_discount']) > 10) {
        $errors[] = 'Trường point_discount độ dài tối đa 50 ký tự';
    }

    return $errors;
}

function voucherDelete($id)
{
    delete2('vouchers', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=vouchers');
    exit();
}
