<?php

function productsDetailListAll($id)
{
    $title = 'Danh sách Product';
    $view = 'productDetail/index';
    $script = 'datatable';
    $script2 = 'productDetail/script';
    $style = 'datatable';
    $productDetail = showDetail('product_detail', $id);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    $_SESSION['productDetail']['product_id'] = $id;
    return $id;
}

// function productsDetailShowOne($id)
// {
//     $product = showOne('product', $id);

//     if (empty($tag)) {
//         e404();
//     }

//     $title = 'Chi tiết tag: ' . $product['name'];
//     $view = 'product/show';

//     require_once PATH_VIEW_ADMIN . 'layouts/master.php';
// }

function productsDetailCreate()
{

    // productsDetailListAll($id);
    $title = 'Danh sách product';
    $view = 'productDetail/create';

    //     session_start();

    //  Lấy ID sản phẩm từ session
    $product_id = $_SESSION['productDetail']['product_id'];
    // session_destroy($product_id);
    // print_r($product_id);
    // die;
    $size = listAll('size');
    $color = listAll('color');

    if (!empty($_POST)) {
        $data = [
            'image_url' => $_POST['images'] ?? null,
            'product_id' => $product_id,
        ];
        // co bảng image : gồm name và product_id
        $img = $_FILES['images'] ?? null;
        if (!empty($img)) {
            $data['image_url'] = upload_file($img, 'uploads/product/');    
        }

       
        $image_id =insert('image', $data);
    //     print_r($data['image_url']);
    // die;
        // trong bảng product_detail có truy vấn đến image thông qua khóa chính bảng image


        // var_dump($id_product);
        // die;
        $data1 = [
            "size_id" => $_POST['size'] ?? null,
            "quantity" => $_POST['soluong'] ?? null,
            "color_id" => $_POST['color'] ?? null,
            "price" => $_POST['price'] ?? null, 
            "image_id" => $image_id,
            "product_id" => $product_id,
            "sale" => $_FILES['sale'] ?? null,
        ];
        // var_dump($data1);
        // die;
       
        insert('product_detail', $data1);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=product');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateProductsDetailCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    } else if (!checkUniqueName('product', $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    return $errors;
}

function productsDetailUpdate($id)
{
    $productDetail = showOne('product_detail', $id);
    $image = showOne('image', $id);
    $size = listAll('size');
    $color = listAll('color');
    if (empty($productDetail)) {
        e404();
    }
    // var_dump($product['thumbnail']);
    // die;
    $title = 'Cập nhật product Detail: ' ;
    $view = 'productDetail/update';

    if (!empty($_POST)) {
        $data = [
            'image_url' => $_POST['images'] ?$_POST['images'] : $image['image_url'],
            'product_id' => $productDetail['product_id'],
        ];
        // co bảng image : gồm name và product_id
        $img = $_FILES['images'] ?? null;
        if (!empty($img)) {
            $data['image_url'] = upload_file($img, 'uploads/product/');    
        }

       $img = $image['id'];
        $image_id = update('image', $img, $data);

        
        $data1 = [
            "size_id" => $_POST['size'] ?  $_POST['size'] : $productDetail['product_id'],
            "quantity" => $_POST['soluong'] ?  $_POST['soluong'] : $productDetail['quantity'],
            "color_id" => $_POST['color'] ?$_POST['color'] : $productDetail['color_id'],
            "price" => $_POST['price'] ?? null, 
            "image_id" => $img,
            "product_id" => $productDetail['product_id'],
            "sale" => $_POST['sale'] ?$_POST['sale'] : null,
        ];

        $dt = $productDetail['id'];
        update('product_detail', $dt, $data1);

        $_SESSION['success'] = 'Thao tác thành công!';


        header('Location: ' . BASE_URL_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateProductsDetailUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    // else if(! checkUniqueNameForUpdate('product', $id, $data['name'])) {
    //     $errors[] = 'Name đã được sử dụng';
    // }

    return $errors;
}

function productsDetailtDelete($id)
{
    delete2('product', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=product');
    exit();
}
