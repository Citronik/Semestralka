<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fortinet_by_FP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/Semestralka/public/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <script>
        function checkDivForLogged(userRole) {
            var elements = document.querySelectorAll("div." + userRole);
            for(var i=0; i<elements.length; i++){
                elements[i].style.display = "flex";
            }
        }

    </script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-end">
    <div class="container-fluid">
        <a class="navbar-brand" href="?c=home">Frotinet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?c=home">Fortigate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=presentations">Prezentácie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=about">O nás</a>
                </li>
            </ul>
            <?php if (!\App\Auth::isLogged()) {?>
                    <script>checkDivForLogged("anonym")</script>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?c=auth&a=loginForm">
                        <button type="button" class="btn btn-primary btn-small btn-nav">Sign in</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=auth&a=registrationForm">
                        <button type="button" class="btn btn-primary btn-small btn-nav">Sign up</button>
                    </a>
                </li>
            </ul>
            <?php } else {?>
                <script>checkDivForLogged("logged")</script>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?c=auth&a=changeDataForm">
                            <button type="button" class="btn btn-primary btn-small btn-nav">Change personal info</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=auth&a=logout">
                            <button type="button" class="btn btn-primary btn-small btn-nav">Sign out</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=auth&a=deleteAcc">
                            <button type="button" class="btn btn-primary btn-small btn-nav"><i class="bi bi-x-circle-fill"></i></button>
                        </a>
                    </li>
                </ul>
            <?php }?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-2">
        <div class="col">
            <?= $contentHTML ?>
        </div>
    </div>
</div>
<div class="footer">
    <p>Forti</p>
</div>
</body>
</html>

