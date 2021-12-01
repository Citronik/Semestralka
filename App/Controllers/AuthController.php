<?php

namespace App\Controllers;

use App\Auth;
use App\Core\AControllerBase;
use App\Core\DB\Connection;
use App\Core\Responses\Response;
use App\Models\User;

class AuthController extends RedirectController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm()
    {
        return $this->html(
            []
        );
    }

    public function registrationForm()
    {
        return $this->html(
            []
        );
    }

    public function changeDataForm()
    {
        $username = $_SESSION['username'];
        $passwd = $_SESSION['password'];
        $users = User::getAll("username = ? AND password = ?", [$username, $passwd]);
        $user = $users[0];
        return $this->html($user);
    }
    
    public function login()
    {
        $auth = new Auth();
        if (!Auth::isLogged()) {
            $username = $this->request()->getValue("username");
            $passwd = $this->request()->getValue("password");
            if ($username & $passwd) {
                $response = $auth->login($username, $passwd);
                if ($response == " ") {
                    $this->redirectToHome();
                    return;
                } else if ($response == "wrong") {
                    $this->redirectToLogin();
                    return;
                }
            }
            $this->redirectToRegistration();
            return;
        } else {
            $this->redirectToHome();
            return;
        }
    }
    
    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
        $this->redirectToHome();
    }

    /**
     *
     */
    public function registration()
    {
        $auth = new Auth();
        if (!Auth::isLogged())
        $username = $this->request()->getValue("username");
        $passwd = $this->request()->getValue("password");
        $email = $this->request()->getValue("email");
        if ($username & $passwd & $email) {
            $response = $auth->registration($username, $passwd, $email);
            if ($response == "succesfull") {
                $this->redirectToHome();
            } else if ($response == "email" || $response == "user") {
                $this->redirectToRegistration();
            }
        } else {
            $this->redirectToHome();
        }
    }

    public function changeData()
    {
        $username = $this->request()->getValue("username");
        $passwd = $this->request()->getValue("password");
        $email = $this->request()->getValue("email");
        $id = $this->request()->getValue("id");
        if ($username || $passwd || $email) {
            $auth = new Auth();
            $newUser = User::getOne($id);
            $newUser->username = $username;
            $newUser->password = $passwd;
            $newUser->email = $email;
            $newUser->save();
            $auth->changeData($newUser);
            $this->redirectToHome();
        } else {
            $this->redirectToChangeData();
        }
    }

    public function deleteAcc()
    {
        if (Auth::isLogged()) {
            $auth = new Auth();
            $auth->deleteAcc();
            $this->logout();
        }
        $this->redirectToHome();
    }
}