<?php

namespace App;

use App\Controllers\AuthController;
use App\Controllers\RedirectController;
use App\Core\DB\Connection;
use App\Models\User;

class Auth
{
    /**
     * @param $username
     * @param $passwd
     * @return string
     */
    public function login($username, $passwd) : string
    {
        if ($_SESSION['pokusy'] > 3) {
            $_SESSION['pokusy'] = 0;
            return "wrong";
        }
        if (!Auth::isLogged()) {
            if ($this->haveAccount($username, $passwd)) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $passwd;
                $_SESSION['pokusy'] = 0;
                return " ";
            } else if ($this->isThereUsername($username)) {
                $_SESSION['pokusy'] += 1;
                return "wrong";
            } else {
                $_SESSION['pokusy'] = 0;
                return "No";
            }
        }
        $_SESSION['pokusy'] = 0;
        return "logged";
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        if (Auth::isLogged()) {
            $_SESSION['pokusy'] = 0;
        }
    }

    public static function isLogged()
    {
        return isset($_SESSION['username']) & isset($_SESSION['password']);
    }

    public function haveAccount($username, $passwd)
    {
        $conn = Connection::connect()->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $conn->execute([$username, $passwd]);
        $users = $conn->fetchAll();
        return !empty($users);
    }

    public function isThereUsername($username)
    {
        $conn = Connection::connect()->prepare('SELECT * FROM users WHERE username = ?');
        $conn->execute([$username]);
        $users = $conn->fetchAll();
        return !empty($users);
    }

    public function registration($username, $passwd, $email) : string
    {
        if (!$this->isThereUsername($username)) {
            if (!$this->isThereEmail($email)) {
                $user = new User();
                $user->username = $username;
                $user->password = $passwd;
                $user->created_at = date('Y-m-d H:i:s');
                $user->email = $email;
                $user->save();
                $this->login($username, $passwd);
                return "succesfull";
            } else {
                return "email";
            }
        }
        return "user";
    }

    private function isThereEmail($email)
    {
        $conn = Connection::connect()->prepare('SELECT * FROM users WHERE email = ?');
        $conn->execute([$email]);
        $users = $conn->fetchAll();
        return !empty($users);
    }

    /**
     * @param $newUser
     */
    public function changeData($newUser)
    {
        $_SESSION['username'] = $newUser->username;
        $_SESSION['password'] = $newUser->password;
    }

    public function deleteAcc()
    {
        $username = $_SESSION['username'];
        $conn = Connection::connect()->prepare('DELETE FROM users WHERE username = ?');
        $conn->execute([$username]);
    }
    
}