<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">News</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <?php
                    $start = rand(10, 22);
                    if ($start > 3):
                        $TinNoiBat = $item->TinNoiBat($start, 4);
                        foreach ($TinNoiBat as $key => $value):
                            $date = date("Y, M, d", strtotime($value["created_at"]));
                            ?>
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="anh/<?php echo $value["image"] ?>"
                                        style="object-fit: cover; width: 300px; height: 300px">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href=""><?php echo $value["tenCate"] ?></a>
                                            <a class="text-body" href=""><small><?php echo $date ?></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="single.php?id=<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a>
                                        <p class="m-0"><?php echo $value["excerpt"] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                            <small><?php echo $value["authors"] ?></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i
                                                    class="far fa-eye mr-2"></i><?php echo $value["views"] ?></small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123 </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; endif ?>



                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php include "social-sidebar.php" ?>
            </div>

        </div>
    </div>
</div>