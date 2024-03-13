<?php

function userListAll()
{
    $title = 'Danh sách User';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';

    $users = listAll('users');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userShowOne($id)
{
    $user = showOne('users', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Chi tiết User: ' . $user['name'];
    $view = 'users/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = 'Danh sách User';
    $view = 'users/create';

    if (!empty($_POST)) {

        $data = [
            "username" => $_POST['username'] ?? null,
            "email" => $_POST['email'] ?? null,
            "address" => $_POST['address'] ?? null,
            "fullname" => $_POST['fullname'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "password" => $_POST['password'] ?? null,
            "role" => $_POST['role'] ?? null,
        ];

        $errors = validateUserCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=user-create');
            exit();
        }

        insert('users', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUserCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['username'])) {
        $errors[] = 'Trường username là bắt buộc';
    } else if (strlen($data['username']) > 50) {
        $errors[] = 'Trường username độ dài tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    } else if (!checkUniqueEmail('users', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }

    if (empty($data['address'])) {
        $errors[] = 'Trường address là bắt buộc';
    } else if (strlen($data['address']) > 100) {
        $errors[] = 'Trường address độ dài tối đa 50 ký tự';
    }

    if (empty($data['phone'])) {
        $errors[] = 'Trường phone là bắt buộc';
    } else if (strlen($data['phone']) > 10) {
        $errors[] = 'Trường phone độ dài tối đa 50 ký tự';
    }


    if (empty($data['password'])) {
        $errors[] = 'Trường password là bắt buộc';
    } else if (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
    }


    if ($data['role'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['role'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }

    return $errors;
}

function userUpdate($id)
{
    $user = showOne('users', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Cập nhật User: ' . $user['username'];
    $view = 'users/update';

    if (!empty($_POST)) {
        $data = [
            "username" => $_POST['username'] ?? null,
            "email" => $_POST['email'] ?? null,
            "address" => $_POST['address'] ?? null,
            "fullname" => $_POST['fullname'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "password" => $_POST['password'] ?? null,
            "role" => $_POST['role'] ?? null,
        ];

        $errors = validateUserUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('users', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validateUserUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['username'])) {
        $errors[] = 'Trường username là bắt buộc';
    } else if (strlen($data['username']) > 50) {
        $errors[] = 'Trường username độ dài tối đa 50 ký tự';
    }

    if (empty($data['address'])) {
        $errors[] = 'Trường address là bắt buộc';
    } else if (strlen($data['address']) > 100) {
        $errors[] = 'Trường address độ dài tối đa 50 ký tự';
    }

    if (empty($data['phone'])) {
        $errors[] = 'Trường phone là bắt buộc';
    } else if (strlen($data['phone']) > 10) {
        $errors[] = 'Trường phone độ dài tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    } else if (!checkUniqueEmailForUpdate('users', $id, $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }

    if (empty($data['password'])) {
        $errors[] = 'Trường password là bắt buộc';
    } else if (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
    }


    if ($data['role'] === null) {
        $errors[] = 'Trường type là bắt buộc';
    } else if (!in_array($data['role'], [0, 1])) {
        $errors[] = 'Trường type phải là 0 or 1';
    }

    return $errors;
}

function userDelete($id)
{
    delete2('users', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}
