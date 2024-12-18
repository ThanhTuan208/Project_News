<?php

include "connect.php";
include "model/database.php";
include "model/item.php";
include "model/users.php";
include "model/account.php";
include "model/category.php";

$item = new Item();
$cate = new Category();
$account = new Account();

$item_id = isset($_GET['item_id']) ? $_GET['item_id'] : 0;
if (isset($_GET['id'])) {
    $item->delete($item_id);
    header('location:items.php');
    exit();
}
$cate_id = isset($_GET['cate_id']) ? $_GET['cate_id'] : 0;
if (isset($cate_id)) {
    $cate->Delete($cate_id);
    header('location:categories.php');
    exit();
}

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
if (isset($user_id)) {
    $account->Delete($user_id);
    header('location:users.php');
    exit();
}
