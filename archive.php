<!-- News With Sidebar End -->
<?php include "header.php";

if (isset($_GET['cate-id'])):
    $cate_id = $_GET['cate-id'];
    $perPage = 4;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $total = count($item->getAllItemByCate($cate_id));
    $url = $_SERVER['PHP_SELF'] . "?cate-id=" . $cate_id;
    ?>
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Category: <?php echo $total ?> items</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <?php
                        $getInfoItemByCate = $item->getItemByCate($cate_id, $page, $perPage);
                        foreach ($getInfoItemByCate as $key => $value):
                            ?>
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="anh/<?php echo $value['image'] ?>"
                                        style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href=""><?php echo $value['nameCate'] ?></a>
                                            <a class="text-body"
                                                href=""><small><?php echo date('M d, Y', strtotime($value['created_at'])) ?></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="single.php?id=<?php echo $value["id"] ?>"><?php echo $value['title'] ?></a>
                                        <p class="m-0"><?php echo substr($value['excerpt'], 0, 150) . '...' ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                            <small><?php echo $value['authors'] ?></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i
                                                    class="far fa-eye mr-2"></i><?php echo $value['views'] ?></small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row mx-0">
                        <div class="col-12 text-center pb-4 pt-5">
                            <?php echo $item->pageInt($url, $total, $perPage, $page); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php include "social-sidebar.php" ?>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
    <?php
endif;
require "footer.php";