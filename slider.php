<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <!-- Main Carousel Section -->
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php
                $get3TinNoiBat = $item->getNewItem(0, 3);
                foreach ($get3TinNoiBat as $key => $value): ?>
                    <form action="single.php" method="get">
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="anh/<?php echo $value["image"] ?>" alt="Image"
                                style="object-fit: cover;">
                            <input type="hidden" name="id" value="<?php echo $value["id"]; ?>">

                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $value['nameCate'] ?> </a>
                                    <a class="text-white" href=""><small><?php echo $value["created_at"] ?></small></a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                    href="single.php?id=<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a>
                            </div>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>

        <!-- Side News Section -->
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <?php
                $get4TinTiepTheo = $item->getNewItem(3, 4);
                foreach ($get4TinTiepTheo as $key => $value): ?>
                    <div class="col-md-6 px-0">
                        <form action="single.php" method="get">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="anh/<?php echo $value["image"] ?>" alt="Image"
                                    style="object-fit: cover;">
                                <input type="hidden" name="id" value="<?php echo $value["id"]; ?>">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="single.php">
                                            <?php echo $value['nameCate'] ?></a>
                                        <a class="text-white" href="#"><small><?php echo $value["created_at"] ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                        href="single.php?id=<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a>
                                </div>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
</div>
<!-- Main News Slider End -->