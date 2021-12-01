<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use http\Header;

abstract class RedirectController extends AControllerBase
{
    protected function redirectToHome() {
        header("Location: ?c=home");
    }

    protected function redirectToLogin() {
        header("Location: ?c=auth&a=loginForm");
    }

    protected function redirectToRegistration()
    {
        header("Location: ?c=auth&a=registrationForm");
    }

    protected function redirectToChangeData()
    {
        header("Location: ?c=auth&a=changeDataForm");
    }
}