<?php
session_set_cookie_params(3600,"/");
session_start();

$_SESSION['pokusy'] = 0;

require "ClassLoader.php";

use App\App;

$app = new App();
$app->run();