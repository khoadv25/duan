<?php

function colorListAll()
{
    $title = 'Danh sách color';
    $view = 'color/index';
    $script = 'datatable';
    $script2 = 'color/script';
    $style = 'datatable';

    $color = listAll('color');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function colorShowOne($id)
{
    $color = showOne('color', $id);

    if (empty($color)) {
        e404();
    }

    $title = 'Chi tiết color: ' . $color['name'];
    $view = 'color/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function colorCreate()
{
    $title = 'Danh sách color';
    $view = 'color/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "status" => $_POST['status'] ?? null,
            "code" => $_POST['code'] ?? null,
        ];

        $errors = validateColorCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=color-create');
            exit();
        }

        insert('color', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=color');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateColorCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự,không được trùng
   

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    } 
    else if(! checkUniqueName('size', $data['size_name'])) {
        $errors[] = 'Name đã được sử dụng';
    }


    if ($data['status'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }

    if (empty($data['code'])) {
        $errors[] = 'Trường code là bắt buộc';
    } else if (strlen($data['code']) > 50) {
        $errors[] = 'Trường code độ dài tối đa 50 ký tự';
    }

    return $errors;
}

function colorUpdate($id)
{
    $color = showOne('color', $id);

    if (empty($color)) {
        e404();
    }

    $title = 'Cập nhật Color: ' . $color['name'];
    $view = 'color/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            "code" => $_POST['code'] ?? null,
            "status" => $_POST['status'] ?? null
            
        ];

        $errors = validateColorUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('color', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=color-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=color');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validateColorUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
   

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueNameForUpdate('size', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }
    if (empty($data['code'])) {
        $errors[] = 'Trường code là bắt buộc';
    } else if (strlen($data['code']) > 50) {
        $errors[] = 'Trường code độ dài tối đa 50 ký tự';
    }
    if ($data['status'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }
    return $errors;
}

function colorDelete($id)
{
    delete2('color', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=color');
    exit();
}
