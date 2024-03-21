<?php

function billStatusListAll()
{
    $title = 'Danh sách Bill Status';
    $view = 'billstatus/index';
    $script = 'datatable';
    $script2 = 'billstatus/script';
    $style = 'datatable';

    $billStatus = listAll('billstatus');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function billStatusShowOne($id)
{
    $billStatus = showOne('billstatus', $id);

    if (empty($billStatus)) {
        e404();
    }

    $title = 'Chi tiết Bill Status: ' . $billStatus['status_name'];
    $view = 'billstatus/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function billStatusCreate()
{
    $title = 'Danh sách Bill Status';
    $view = 'billstatus/create';

    if (!empty($_POST)) {

        $data = [
            "status_name" => $_POST['status_name'] ?? null,
        ];

        $errors = validateBillStatusCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=billstatus-create');
            exit();
        }

        insert('billstatus', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=billstatus');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateBillStatusCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['status_name'])) {
        $errors[] = 'Trường status_name là bắt buộc';
    } else if (strlen($data['status_name']) > 50) {
        $errors[] = 'Trường status_name độ dài tối đa 50 ký tự';
    }

    return $errors;
}

function billStatusUpdate($id)
{
    $billStatus = showOne('billstatus', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Cập nhật Bill Status: ' . $billStatus['status_name'];
    $view = 'billstatus/update';

    if (!empty($_POST)) {
        $data = [
            "status_name" => $_POST['status_name'] ?? null,
        ];

        $errors = validateBillStatusUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('billstatus', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=billstatus');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validateBillStatusUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['status_name'])) {
        $errors[] = 'Trường status_name là bắt buộc';
    } else if (strlen($data['status_name']) > 50) {
        $errors[] = 'Trường status_name độ dài tối đa 50 ký tự';
    }

    return $errors;
}

function billStatusDelete($id)
{
    delete2('billstatus', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=billstatus');
    exit();
}
