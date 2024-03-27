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
            "thumbnail" => $_FILES['avatar']['name'] ?? null,
        ];

        // print_r($data['thumbnail']);
       
        // die;

        validateProductCreate($data);

        // print_r($_FILES['avatar']);
        // die;
        $img = $_FILES['avatar'];
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

    if (empty($data['description'])) {
        $errors[] = 'Trường mô tả là bắt buộc';
    } 
    else if(strlen($data['description']) > 100) {
        $errors[] = 'Trường mô tả độ dài tối đa 100 ký tự';
    } 
   


    // if (empty($data['brand_id'])) {
    //     $errors[] = 'Trường brand là bắt buộc';
    // } 
    


    // if (empty($data['category_id'])) {
    //     $errors[] = 'Trường cate là bắt buộc';
    // } 
   
    if (!empty($data['thumbnail']['name']) && $data['thumbnail']['size'] > 0) {
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['thumbnail']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['thumbnail']['type'], $typeImage)) {
            $errors[] = 'Trường avatar chỉ chấp nhận định dạng file: png, jpg, jpeg';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=product-create');
        exit();
    }


    return $errors;
}

function productUpdate($id)
{
    $product = showOne('product', $id);
    $brand = listAll('brand');
    $categories = listAll('categories');
    
    if(empty($product)) {
        e404();
    }
    // var_dump($product['thumbnail']);
    // die;
    $title = 'Cập nhật product: ' . $product['name'];
    $view = 'product/update';

    if (!empty($_POST)) {

       
        $data = [
            "name" => $_POST['name'] ?? $product['name'],
            "description" => $_POST['mota'] ?? $product['description'],
            "brand_id" => $_POST['brand'] ?? $product['brand_id'],
            "category_id" => $_POST['cate'] ?? $product['category_id'],
            "thumbnail" => $_FILES['avatar']['name'] ? $_FILES['avatar']['name'] : $product['thumbnail'],

        ];
       
        $img = $_FILES['avatar'];
        if (!empty($img)) {
            if (!empty($img['name']) && $img['size'] > 0){
                $data['thumbnail'] = upload_file($img, 'uploads/product/');    
            }else{
                $data['thumbnail'] =$product['thumbnail'] ;    

            }
            
        }
        

        $errors = validateProductUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } 
        else {
            update('product', $id, $data);

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
    // else if(! checkUniqueNameForUpdate('product', $id, $data['name'])) {
    //     $errors[] = 'Name đã được sử dụng';
    // }
    if (!empty($data['thumbnail']['name']) && $data['thumbnail']['size'] > 0) {
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['thumbnail']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['thumbnail']['type'], $typeImage)) {
            $errors[] = 'Trường avatar chỉ chấp nhận định dạng file: png, jpg, jpeg';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=product-create');
        exit();
    }



    return $errors;
}

function productDelete($id)
{
    delete2('product', $id);

    $_SESSION['success'] = 'Thao tác thành công!';
    
    header('Location: ' . BASE_URL_ADMIN . '?act=product');
    exit();
}
