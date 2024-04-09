<main>

    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="index.html"><span>Home</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>Product Detail</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- start shop-single-section -->
    <section class="shop-single-section pb-70">
        <div class="container">


            <div class="row">
                <div class="col-md-6">
                    <div class="product-single-wrap mb-30">



                        <div class="product_details_img ">
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="pl_thumb">
                                        <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" width="100%">
                                    </div>
                                </div>
                                <?php foreach ($productDetail as $key => $value) : ?>
                                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="pl_thumb">
                                            <img src="<?= BASE_URL . $value['image_url'] ?>" alt="" width="100%">
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>


                        <div class="shop_thumb_tab">

                            <ul class="nav" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" width="100%">
                                    </button>
                                </li>
                                <?php foreach ($productDetail as $key => $value) : ?>

                                    <li class="nav-item">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                            <img src="<?= BASE_URL . $value['image_url'] ?>" alt="" width="100%">
                                        </button>
                                    </li>
                                <?php endforeach; ?>

                                <!-- <li class="nav-item">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <img src="<?= BASE_URL . $value['image_url'] ?>" alt="" width="100%">
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2" aria-selected="false">
                                        <img src="<?= BASE_URL . $value['image_url'] ?>" alt="" width="100%">
                                    </button>
                                </li> -->
                            </ul>


                        </div>


                    </div>

                </div>


                <div class="col-md-6 product-details-col">
                    <div class="product-details">
                        <h2><?= $product['product_name'] ?></h2>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(2 Customer review)</span>
                        </div>
                        <div class="price">
                            <span class="current"><?= number_format($value['price']) ?> VND</span>
                            <span class="old"><?= $value['sale'] ?></span>
                        </div>
                        <p>Mô Tả : <?= $product['description'] ?></p>

                        <div class="model-option-wrap ul_li mt-25">
                            <span>Model : </span>
                            <ul class="model-option ul_li">
                                <?php foreach ($productDetail as $key => $value) : ?>

                                    <li class="active"><?= $value['size_name'] ?></li>

                                <?php endforeach; ?>

                                <?php
                                foreach ($allProductDetail as $key => $sizeAll) : ?>
                                    <?php
                                    $foundSize = false;
                                    if ($value['size_name'] == $sizeAll['size_name']) {
                                        $foundSize = true;
                                        continue;
                                    } ?>
                                    <li><a href="<?= BASE_URL . '?act=chitiet&id=' . $idDetail . '&dungluong=' . $sizeAll['size_id'] ?>"><?= $sizeAll['size_name'] ?></a></li>

                                <?php endforeach; ?>






                            </ul>
                        </div>

                        <div class="thb-product-meta-before mt-20">
                            <div class="product_meta">
                                <span class="posted_in">Categories: <?= $product['category_name'] ?></span>
                                <span class="tagged_as">Color:
                                    <?php foreach ($productDetail as $key => $value) : ?>

                                        <a href="#!"><?= $value['color_name'] ?></a>,

                                    <?php endforeach; ?>

                                    <span class="product-share-wrap ul_li">Share:
                                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#!"><i class="fab fa-instagram"></i></a>
                                        <a href="#!"><i class="fab fa-twitter"></i></a>
                                        <a href="#!"><i class="fab fa-linkedin "></i></a>
                                    </span>
                            </div>
                        </div>







                        <div class="product-option">

                            <form class="form" method="GET">

                                <div class="product-row">

                                    <div>
                                        <input class="product-count" type="text" value="1" name="soluong">
                                    </div>

                                    <div class="add-to-cart-btn">
                                        <?php
                                        if (isset($_GET['soluong'])) {
                                            $soluong = $_GET['soluong'];
                                        } else {
                                            $soluong = 1; // Giá trị mặc định nếu soluong không được xác định
                                        }
                                        ?>


                                        <span class="btn-wrap">

                                            <a type="submit" href="<?= BASE_URL . '?act=cart-add&productID=' . $value['id'] . '&quantity=' . $soluong ?>">
                                                <span>Add Card</span>
                                                <span>Add Card</span>
                                            </a>

                                        </span>

                                    </div>


                                </div>

                            </form>

                        </div>


                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->




            <div class="row">
                <div class="col col-xs-12">
                    <div class="single-product-info">
                        <!-- Nav tabs -->
                        <div class="tablist">
                            <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                                <li><button class="active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#tb-01">Product Details</button></li>
                                <li><button id="tab-two" data-bs-toggle="pill" data-bs-target="#tb-02">Additional imformation</button></li>
                                <li><button id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#tb-03">Review (09)</button></li>
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="tb-01">
                                <p>Travelling salesman and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer</p>
                                <p> waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar wallstrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather</p>
                            </div>
                            <div class="tab-pane fade" id="tb-02">
                                <p>Travelling salesman and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer</p>
                                <p> waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar wallstrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather</p>
                            </div>
                            <div class="tab-pane fade" id="tb-03">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                        <div class="client-rv">
                                            <div class="client-pic">
                                                <img src="assets/img/avatar/comments/img_01.jpg" alt>
                                            </div>
                                            <div class="details">
                                                <div class="name-rating-time">
                                                    <div class="name-rating">
                                                        <div>
                                                            <h4>Mice</h4>
                                                        </div>
                                                        <div class="rating">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="time">
                                                        <span>1 day ago</span>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Helplessly as he looked What's happened to me he thought. It wasn't a dreamtrated magazine and housed in a nice, gilded frame. It showed a lady fitted</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="client-rv">
                                            <div class="client-pic">
                                                <img src="assets/img/avatar/comments/img_02.jpg" alt>
                                            </div>
                                            <div class="details">
                                                <div class="name-rating-time">
                                                    <div class="name-rating">
                                                        <div>
                                                            <h4>Hone</h4>
                                                        </div>
                                                        <div class="rating">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="time">
                                                        <span>1 day ago</span>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Helplessly as he looked What's happened to me he thought. It wasn't a dreamtrated magazine and housed in a nice, gilded frame. It showed a lady fitted</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="client-rv">
                                            <div class="client-pic">
                                                <img src="assets/img/avatar/comments/img_01.jpg" alt>
                                            </div>
                                            <div class="details">
                                                <div class="name-rating-time">
                                                    <div class="name-rating">
                                                        <div>
                                                            <h4>Piloa</h4>
                                                        </div>
                                                        <div class="rating">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="time">
                                                        <span>2 days ago</span>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Helplessly as he looked What's happened to me he thought. It wasn't a dreamtrated magazine and housed in a nice, gilded frame. It showed a lady fitted</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6 col-sm-12 col-xs-12 review-form-wrapper">
                                        <div class="review-form">
                                            <h4>Here you can review the item</h4>
                                            <form>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="Name *" required>
                                                </div>
                                                <div>
                                                    <input type="email" class="form-control" placeholder="Email *" required>
                                                </div>
                                                <div>
                                                    <textarea class="form-control" placeholder="Review *"></textarea>
                                                </div>
                                                <div class="rating-wrapper">
                                                    <div class="rating">
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                    </div>
                                                    <div class="submit">
                                                        <button class="thm-btn thm-btn__2 no-icon" type="submit">
                                                            <span class="btn-wrap">
                                                                <span>Shop Now</span>
                                                                <span>Shop Now</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->



            <div class="row ">
                <div class="col col-xs-12">
                    <div class="realted-porduct">
                        <h3>Sản Phẩm Liên Quan</h3>
                        <div class="shop-area mx-auto">
                            <ul class="products clearfix">
                                <?php foreach ($productCate as $key => $pro) : ?>
                                    <li class="product">

                                        <div class="product-holder">
                                            <a href="<?= BASE_URL . '?act=chitiet&id=' . $pro['id'] ?>"><img src="<?= BASE_URL . $pro['thumbnail'] ?>" alt width="200"></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html"><?= $pro['product_name'] ?></a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end of container -->
    </section>
    <!-- end of shop-single-section -->


</main>





</div>