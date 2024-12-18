<?php
class Item extends Database
{
    public function getAllItem()
    {
        $sql = self::$con->prepare('SELECT * FROM items ORDER BY created_at desc');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllItemByAllTable()
    {
        $sql = self::$con->prepare('SELECT items.*, categories.name as nameCate, users.name as nameUser 
        FROM items
        JOIN categories ON categories.id = items.id
        JOIN users on users.id = items.id
        ORDER BY created_at desc');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function TotalCate($keyword)
    {
        $sql = self::$con->prepare('SELECT * FROM items 
        WHERE `content` LIKE ?');
        $keyword = "%$keyword%";
        $sql->bind_param('s', $keyword);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function search($keyword, $start, $count)
    {
        $sql = self::$con->prepare('SELECT items.*, categories.name as nameCate, users.name as nameUser
        FROM items
        JOIN categories ON categories.id = items.category
        JOIN users ON users.id = items.author
        WHERE items.content LIKE ? LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function pageInt($url, $total, $perPage, $page)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";

        // CSS trực tiếp
        $commonStyle = "text-decoration: none; padding: 8px 12px; margin: 0 5px; color: #007bff; border: 1px solid #ddd; border-radius: 4px; transition: all 0.3s ease;";
        $hoverStyle = "onmouseover=\"this.style.backgroundColor='#007bff'; this.style.color='white';\" onmouseout=\"this.style.backgroundColor=''; this.style.color='#007bff';\"";

        if ($page > 1) {
            $previousPage = $page - 1;
            $link .= "<a href='$url&page=$previousPage' style='$commonStyle' $hoverStyle>← Previous</a>";
        }

        for ($i = 1; $i <= $totalLinks; $i++) {
            $activeStyle = $i == $page ? "background-color: #007bff; color: white;" : "";
            $link .= "<a href='$url&page=$i' style='$commonStyle $activeStyle' $hoverStyle>$i</a>";
        }

        if ($page < $totalLinks) {
            $nextPage = $page + 1;
            $link .= "<a href='$url&page=$nextPage' style='$commonStyle' $hoverStyle>Next →</a>";
        }

        return $link;
    }
    public function delete($id)
    {
        $sql = self::$con->prepare('DELETE FROM items WHERE id = ?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    public function Add($title, $excerpt, $content, $image, $category, $featured, $view, $author)
    {
        // $nameCate = $this->nameCate($category);
        // $nameAuthor = $this->nameAuthor($author);
        $sql = self::$con->prepare('INSERT INTO `items`(`title`, `excerpt`, `content`, `image`, `category`, `featured`, `views`, `author`) 
        VALUES (?,?,?,?,?,?,?,?) ');
        $sql->bind_param('ssssiiii', $title, $excerpt, $content, $image, $category, $featured, $view, $author);
        $sql->execute();
        return $sql->affected_rows > 0;
    }
    public function Update($id, $title, $excerpt, $content, $image, $category, $featured, $view, $author)
    {
        $sql = self::$con->prepare('UPDATE `items`
       SET `title`= ?, `excerpt`=?, `content`=?, `image`=?, `category`=?, `featured`=?, `views`=?, `author`=?
        WHERE id = ?');
        $sql->bind_param('ssssiiiii', $title, $excerpt, $content, $image, $category, $featured, $view, $author, $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }


    public function nameCate($id)
    {
        $sql = self::$con->prepare('SELECT * FROM categories WHERE id = ?');
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item['name'];
    }
    public function nameAuthor($id)
    {
        $sql = self::$con->prepare('SELECT * FROM users WHERE id = ?');
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item['name'];
    }

    public function getAllByIdItems($id)
    {
        $sql = self::$con->prepare('SELECT items.*, categories.name as nameCate FROM items
        JOIN categories ON categories.id = items.category
        WHERE items.id =  ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }


}
