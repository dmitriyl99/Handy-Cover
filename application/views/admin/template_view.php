<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <link rel="stylesheet" href="/static/css/admin-style.css">
    <title><?php echo $data->getTitle(); ?> - Handy Cover Admin</title>
</head>
<body class="bg-white">
<nav class="navbar navbar-dark fixed-top bg-dark p-0 shadow">
    <a href="/admin/" class="navbar-brand">Handy Cover Admin</a>
    <button class="navbar-toggler d-sm-block d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav navbar-fill mr-auto">
            <li class="nav-item"><a href="/admin/" class="nav-link <?php echo ($data->getPage() === DASHBOARD_PAGE ? 'active' : '') ?>">Административная панель</a></li>
            <li class="nav-item"><a href="/admincategories/" class="nav-link <?php echo $data->getPage() === CATALOG_PAGE ? 'active' : ''?>">Каталог</a></li>
            <li class="nav-item"><a href="/admincontacts/" class="nav-link <?php echo $data->getPage() === CONTACTS_PAGE ? 'active' : '' ?>">Контакты</a></li>
            <li class="nav-item"><a href="/adminreviews/" class="nav-link <?php echo $data->getPage() === REVIEWS_PAGE ? 'active' : ''?>">Отзывы</a></li>
            <li class="nav-item"><a href="/adminvacancies/" class="nav-link <?php echo $data->getPage() === VACANCIES_PAGE ? 'active' : ''?>">Вакансии</a></li>
            <li class="nav-item"><a href="/" class="nav-link" target="_blank"></i>Открыть сайт</a></li>
        </ul>
        <div class="my-2 my-lg-0">
            <ul class="navbar-nav px-3">
                <li class="nav-item">
                    <i class="far fa-user-circle text-light"></i>
                    <span class="user-name text-light"><?php echo $data->getUserName() ?></span>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light text-center" href="/admin/logout">Выход</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="my-2 my-lg-0 d-sm-none d-md-block">
        <ul class="navbar-nav px-3">
            <li class="nav-item">
                <i class="far fa-user-circle text-light"></i>
                <span class="user-name text-light"><?php echo $data->getUserName() ?></span>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-center" href="/admin/logout">Выход</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-sm-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/admin/" class="nav-link <?php echo $data->getPage() === DASHBOARD_PAGE ? 'active' : '' ?>"><i class="fas fa-home feather"></i>Административная панель</a></li>
                    <li class="nav-item"><a href="/admincatalog/" class="nav-link <?php echo $data->getPage() === CATALOG_PAGE ? 'active' : ''?>"><i class="fas fa-shopping-cart feather"></i>Каталог</a></li>
                    <li class="nav-item"><a href="/admincontacts/" class="nav-link <?php echo $data->getPage() === CONTACTS_PAGE ? 'active' : '' ?>"><i class="far fa-address-card feather"></i>Контакты</a></li>
                    <li class="nav-item"><a href="/adminreviews/" class="nav-link <?php echo $data->getPage() === REVIEWS_PAGE ? 'active' : ''?>"><i class="fas fa-comments feather"></i>Отзывы</a></li>
                    <li class="nav-item"><a href="/adminvacancies/" class="nav-link <?php echo $data->getPage() === VACANCIES_PAGE ? 'active' : ''?>"><i class="fas fa-user-tag feather"></i>Вакансии</a></li>
                    <li class="sidebar-divider"></li>
                    <li class="nav-item"><a href="/" class="nav-link" target="_blank"><i class="fas fa-desktop feather"></i>Открыть сайт</a></li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php include 'application/views/'.$content_view?>
        </main>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/adminScript.js"></script>
<script src="/static/js/inputFile.js"></script>
<?php if (stristr($_SERVER['REQUEST_URI'], 'createProduct') !== FALSE) echo '<script src="/static/js/createProduct.js"></script>'; ?>
<?php if (stristr($_SERVER['REQUEST_URI'], 'editProduct') !== FALSE) echo '<script src="/static/js/editProduct.js"></script>'?>
<?php if (stristr($_SERVER['REQUEST_URI'], 'contacts') !== FALSE) echo '<script src="/static/js/adminPhones.js"></script>'?>

</body>
</html>