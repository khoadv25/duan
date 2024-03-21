<?php

function sizeListAll()
{
    $title = 'Danh sách size';
    $view = 'size/index';
    $script = 'datatable';
    $script2 = 'size/script';
    $style = 'datatable';

    $size = listAll('size');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function sizeShowOne($id)
{
    $size = showOne('size', $id);

    if (empty($size)) {
        e404();
    }

    $title = 'Chi tiết Size: ' . $size['name'];
    $view = 'size/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function sizeCreate()
{
    $title = 'Danh sách Size';
    $view = 'size/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "status" => $_POST['status'] ?? null,
        ];

        $errors = validateSizeCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=size-create');
            exit();
        }

        insert('size', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=size');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateSizeCreate($data)
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

    return $errors;
}

function sizeUpdate($id)
{
    $size = showOne('size', $id);

    if (empty($size)) {
        e404();
    }

    $title = 'Cập nhật Size: ' . $size['name'];
    $view = 'size/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            "status" => $_POST['status'] ?? null
            
        ];

        $errors = validateSizeUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('size', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=size-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=size');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validateSizeUpdate($id, $data)
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
    
    if ($data['status'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }
    return $errors;
}

function sizeDelete($id)
{
    delete2('size', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=size');
    exit();
}
