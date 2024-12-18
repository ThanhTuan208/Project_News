<?php
require "config.php";
require "model/db.php";
require "model/categories.php";
require "model/items.php";
require "model/users.php";
require "model/account.php";

$item = new Item();
$getAllItem = $item->getAllItem();
$getTinNoiBatKhac = $item->TinNoiBat(2, 4);


$categories = new categories();
$getAllCate = $categories->getAllCate();

$users = new User();

$account = new Account();
