<?php

function paymentListAll()
{
    $title = 'Danh sách Payment';
    $view = 'payments/index';
    $script = 'datatable';
    $script2 = 'payments/script';
    $style = 'datatable';

    $payment = listAll('payments');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function paymentShowOne($id)
{
    $payment = showOne('payment', $id);

    if (empty($payment)) {
        e404();
    }

    $title = 'Chi tiết Payment: ' . $payment['payment_method'];
    $view = 'users/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function paymentCreate()
{
    $title = 'Danh sách Payment: ';
    $view = 'payments/create';

    if (!empty($_POST)) {

        $data = [
            "payment_method" => $_POST['payment_method'] ?? null,
            "status" => $_POST['status'] ?? null,
        ];

        $errors = validatePaymentCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=payment-create');
            exit();
        }

        insert('payments', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=payments');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatePaymentCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['payment_method'])) {
        $errors[] = 'Trường payment_method là bắt buộc';
    } else if (strlen($data['payment_method']) > 50) {
        $errors[] = 'Trường payment_method độ dài tối đa 50 ký tự';
    }

    if ($data['status'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }

    return $errors;
}

function paymentUpdate($id)
{
    $user = showOne('payments', $id);

    if (empty($payment)) {
        e404();
    }

    $title = 'Cập nhật Payment: ' . $payment['payment_method'];
    $view = 'payments/update';

    if (!empty($_POST)) {
        $data = [
            "payment_method" => $_POST['payment_method'] ?? null,
            "status" => $_POST['role'] ?? null,
            
        ];

        $errors = validatePaymentUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('payments', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=payments');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validatePaymentUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['payment_method'])) {
        $errors[] = 'Trường payment_method là bắt buộc';
    } else if (strlen($data['payment_method']) > 50) {
        $errors[] = 'Trường payment_method độ dài tối đa 50 ký tự';
    }

    return $errors;
}

function paymentDelete($id)
{
    delete2('payments', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=payments');
    exit();
}
