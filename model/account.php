<?php
class Account extends Db
{
    public function getAllAccount()
    {
        $sql = self::$connection->prepare('SELECT * FROM account');
        $sql->execute();
        $user = array();
        $user = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $user;
    }


}