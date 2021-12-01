<?php

namespace App\Controllers;

use App\Core\AControllerBase;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends RedirectController
{

    public function index()
    {
        return $this->html(
            []
        );
    }

    public function about()
    {
        return $this->html(
            []
        );
    }

    public function presentations() {
        return $this->html(
            []
        );
    }
}