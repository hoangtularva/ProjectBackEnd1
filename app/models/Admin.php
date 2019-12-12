<?php
class Admin extends Db
{  
    public function login($username, $password) {
      $sql = parent::$connection->prepare('SELECT * FROM admins WHERE admin_name = ? AND admin_password = ?');
      $sql->bind_param('ss', $username, $password);
      return parent::select($sql);
    }
}  