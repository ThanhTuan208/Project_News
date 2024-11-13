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
        $sql = self::$connection->prepare('SELECT * FROM items WHERE content LIKE ? LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

}
