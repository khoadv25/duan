<?php

function productsListAll()
{
    $title = 'Danh sách Product';
    $view = 'product/index';
    $script = 'datatable';
    $script2 = 'product/script';
    $style = 'datatable';
    
    $product = showList('product');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productShowOne($id)
{
    $product = showOne('product', $id);

    if(empty($tag)) {
        e404();
    }

    $title = 'Chi tiết tag: ' . $product['name'];
    $view = 'product/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productCreate()
{
    $title = 'Danh sách product';
    $view = 'product/create';
    $brand = listAll('brand');
    $categories = listAll('categories');
    $size = listAll('size');
    $color = listAll('color');

    if (!empty($_POST)) {   
       
        // var_dump($img);
        // die;
        $data = [
            "name" => $_POST['name'] ?? null,
            "description" => $_POST['mota'] ?? null,
            "brand_id" => $_POST['brand'] ?? null,
            "category_id" => $_POST['cate'] ?? null,
            "thumbnail" => $_FILES['avatar'] ?? null,
        ];

        $errors = validateProductCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=product-create');
            exit();
        }
        
        $img = $_FILES['avatar'] ?? null;
        if (!empty($img)) {
            $data['thumbnail'] = upload_file($img, 'uploads/product/');    
        }

        insert('product', $data);

        // $id_product = insert('product', $data);
        
        // // var_dump($id_product);
        // // die;
        // $data1 = [
        //     "size_id" => $_POST['size'] ?? null,
        //     "quantity" => $_POST['soluong'] ?? null,
        //     "color_id" => $_POST['color'] ?? null,
        //     "price" => $_POST['price'] ?? null, 
        //     "image_id" => $_FILES['images'] ?? null,
        //     "product_id" => $id_product ?? null,
        //     "sale" => $_FILES['sale'] ?? null,
        // ];
        // // var_dump($data1);
        // // die;
        // $img = $_FILES['images'] ?? null;
        // if (!empty($img)) {
        //     $data['image_id'] = upload_file($img, 'uploads/product/');    
        // }
        // insert('product_detail', $data1);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=product');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateProductCreate($data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    } 
    else if(! checkUniqueName('product', $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    return $errors;
}

function productUpdate($id)
{
    $product = showOne('product', $id);

    if(empty($tag)) {
        e404();
    }

    $title = 'Cập nhật tag: ' . $product['name'];
    $view = 'product/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
        ];

        $errors = validateProductUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } 
        else {
            update('tags', $id, $data);

            $_SESSION['success'] = 'Thao tác thành công!';
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateProductUpdate($id, $data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueNameForUpdate('tags', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    return $errors;
}

function productDelete($id)
{
    delete2('tags', $id);

    $_SESSION['success'] = 'Thao tác thành công!';
    
    header('Location: ' . BASE_URL_ADMIN . '?act=product');
    exit();
}
