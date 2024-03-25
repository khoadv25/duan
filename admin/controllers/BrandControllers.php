<?php

function brandListAll()
{
    $title = 'Danh sách brand';
    $view = 'brand/index';
    $script = 'datatable';
    $script2 = 'brand/script';
    $style = 'datatable';

    $brand = listAll('brand');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function brandShowOne($id)
{
    $color = showOne('brand', $id);

    if (empty($brand)) {
        e404();
    }

    $title = 'Chi tiết brand: ' . $brand['name'];
    $view = 'brand/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function brandCreate()
{
    $title = 'Danh sách brand';
    $view = 'brand/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "status" => $_POST['status'] ?? null,
            // "origin" => $_POST['origin'] ?? null,
        ];

        $errors = validateBrandCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=brand-create');
            exit();
        }

        insert('brand', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=brand');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateBrandCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự,không được trùng
   

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    } 
    else if(! checkUniqueName('brand', $data['brand_name'])) {
        $errors[] = 'Name đã được sử dụng';
    }


    if ($data['status'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }

    // if (empty($data['origin'])) {
    //     $errors[] = 'Trường code là bắt buộc';
    // } else if (strlen($data['origin']) > 50) {
    //     $errors[] = 'Trường origin độ dài tối đa 50 ký tự';
    // }

    return $errors;
}

function brandUpdate($id)
{
    $brand = showOne('brand', $id);

    if (empty($brand)) {
        e404();
    }

    $title = 'Cập nhật Brand: ' . $brand['name'];
    $view = 'brand/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            // "origin" => $_POST['origin'] ?? null,
            "status" => $_POST['status'] ?? null
            
        ];

        $errors = validateBrandUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('brand', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        // header('Location: ' . BASE_URL_ADMIN . '?act=brand-update&id=' . $id);
        header('Location: ' . BASE_URL_ADMIN . '?act=brand');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    
}

function validateBrandUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự
   

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueNameForUpdate('brand', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }
    // if (empty($data['origin'])) {
    //     $errors[] = 'Trường origin là bắt buộc';
    // } else if (strlen($data['origin']) > 50) {
    //     $errors[] = 'Trường origin độ dài tối đa 50 ký tự';
    // }
    if ($data['status'] === null) {
        $errors[] = 'Trường role là bắt buộc';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors[] = 'Trường role phải là 0 or 1';
    }
    return $errors;
}

function brandDelete($id)
{
    delete2('brand', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=brand');
    exit();
}
