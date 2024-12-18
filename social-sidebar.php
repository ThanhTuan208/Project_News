<!-- Social Follow Start -->

<!-- Social Follow End -->

<!-- Ads Start -->
<!-- Ads End -->

<!-- Popular News Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
    </div>
    <?php
    $TinNoiBat = $item->TinNoiBat(0, 5);
    foreach ($TinNoiBat as $key => $value):
        $date = date("y, M, d", strtotime($value["created_at"]));
        ?>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex align-items-center bg-white mb-3" style="width: 170px; height: 100px ;">
                <img class="img-fluid" src="anh/<?php echo $value["image"] ?>" alt="">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href=""><?php echo $value["tenCate"] ?></a>
                        <a class="text-body" href=""><small><?php echo $date ?></small></a>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<!-- Newsletter Start -->

<!-- Newsletter End -->

<!-- Tags Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            <?php
            $getAllCate = $categories->getAllCate();
            foreach ($getAllCate as $key => $value): ?>
                <a href="archive.php?cate-id=<?php echo $value["id"] ?>"
                    class="btn btn-sm btn-outline-secondary m-1"><?php echo $value["slug"] ?></a>
            <?php endforeach ?>

        </div>
    </div>
</div>
<!-- Tags End -->