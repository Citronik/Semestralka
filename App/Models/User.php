<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public $id;
    public $username;
    public $password;
    public $created_at;
    public $email;

    static public function setDbColumns()
    {
        return ['id', 'username', 'password', 'created_at', 'email'];
    }

    static public function setTableName()
    {
        return "users";
    }
}