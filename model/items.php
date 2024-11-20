<?php
class item extends Db
{
    public function getAllItem()
    {
        $sql = self::$connection->prepare("SELECT * FROM items");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }


    public function TinNoiBat($start, $end)
    {
        $sql = self::$connection->prepare('SELECT items.*, categories.name AS tenCate
        FROM items
        JOIN categories ON items.category = categories.id
        ORDER BY items.created_at DESC
        LIMIT ?, ?');
        $sql->bind_param('ii', $start, $end);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getNewItem($start, $end)
    {
        $sql = self::$connection->prepare("SELECT items.*, categories.name as nameCate 
        FROM items  
        JOIN categories on categories.id = items.category
        ORDER BY created_at DESC 
        LIMIT ?,?");
        $sql->bind_param('ii', $start, $end);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function search($keyword, $start, $count)
    {
        $sql = self::$connection->prepare('SELECT items.*, categories.name AS nameCate, users.name as authors FROM items 
        JOIN categories on categories.id = items.category
        JOIN users on users.id = items.author
        WHERE content LIKE ? LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllItemByCate($cate_id)
    {
        $sql = self::$connection->prepare('SELECT * FROM items WHERE category = ? ');
        $sql->bind_param('i', $cate_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getItemByCate($cate_id, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare('SELECT items.*, categories.name AS nameCate, users.name as authors FROM items
        JOIN categories on categories.id = items.category
        JOIN users on users.id = items.author
        WHERE category LIKE ? 
        ORDER BY created_at desc
        LIMIT ?, ?');
        $sql->bind_param('iii', $cate_id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getFeatureItem1($featured, $start, $count)
    {
        $sql = self::$connection->prepare("SELECT items.*, categories.name as nameCate FROM items
        JOIN categories on categories.id = items.category
        WHERE `featured` like ?
        ORDER BY `created_at` desc 
        LIMIT ?, ?");
        $sql->bind_param('iii', $featured, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function pageInt($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($i = 1; $i <= $totalLinks; $i++) {
            $link = $link . "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2' href='$url&page=$i'> $i </a>";
        }
        return $link;
    }

    public function getNameCateByIdItems($name)
    {
        $sql = self::$connection->prepare('SELECT items.*, categories.name as nameCate 
        JOIN categories on categories.id = items.category
        FROM items WHERE category = ? ');
        $sql->bind_param('i', $cate_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function TotalCate($keyword)
    {
        $sql = self::$connection->prepare('SELECT * FROM items 
        WHERE content LIKE ?');
        $keyword = "%$keyword%";
        $sql->bind_param('s', $keyword);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }


}

