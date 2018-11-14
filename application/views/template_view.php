<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/slick/slick.css">
    <link rel="stylesheet" href="/static/slick/slick-theme.css">
    <link rel="stylesheet" href="/static/css/animate.css">
    <link rel="stylesheet" href="/static/css/style.css">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="/static/favicon/favicon16x16.png" sizes="16x16">
    <link rel="icon" href="/static/favicon/favicon32x32.png" sizes="32x32">
    <title><?php echo $data->getTitle(); ?> - Handy Cover</title>
</head>

<body>
    <?php
        $requestUri = $_SERVER['REQUEST_URI'];
        $contacts = $data->getContacts();
    ?>
    <nav class="navbar navbar-expand-lg <?php if ($requestUri == '/') echo 'fixed-top bg-transparent'; else echo 'sticky-top bg-white shadow' ?> navbar-light">
        <div class="container">
            <a class="navbar-brand <?php if ($requestUri == '/') echo 'text-white'; ?>" href="/"><img src="/static/img/logo.png" class="d-inline-block align-top" alt="HandyCover Logo">Handy Cover</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-fill mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="btn-group">
                            <a href="/services" class="nav-link">Услуги</a>
                            <a href="#!" class="nav-link dropdown-toggle" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></a>
                            <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <a class="dropdown-item" href="/services/clothes">Пошив одежды</a>
                                <a class="dropdown-item" href="/services/curve">Разработка лекал</a>
                                
                            </div>
                        </div>

                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a href="/catalog/" class="nav-link">Каталог</a>
                            <a href="#!" class="nav-link dropdown-toggle dropdown-toggle-split" id="catalogDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></a>
                            <div class="dropdown-menu" aria-labelledby="catalogDropdown">
                                <a href="/catalog?id=1" class="dropdown-item">Мужская одежда</a>
                                <a href="/catalog?id=2" class="dropdown-item">Женская одежда</a>
                                <a href="/catalog?id=3" class="dropdown-item">Детская одежда</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/vacancies/" class="nav-link">Вакансии</a>
                    </li>
                    <li class="nav-item"><a href="/contacts/" class="nav-link">Контакты</a></li>
                </ul>
                <div class="header-contacts <?php if ($requestUri == '/') echo 'text-white'; ?>">
                    <h6 class="text-center">Наши контакты</h6>
                    <div class="header-contacts-phones">
                        <?php
                        foreach ($contacts[0]['phones'] as $phone) {
                            echo "<span>$phone </span>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php include 'application/views/'.$content_view; ?>
    <footer class="bg-light shadow">
    <div class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h3 class="text-center">Мы в социальных сетях</h3>
                <ul class="social-links d-flex justify-content-center">
                    <?php
                    foreach ($contacts[0]['socialLinks'] as $key => $link) {
                        if (!empty($link)) {
                            switch ($key) {
                                case 'OK':
                                    echo "<li><a href='$link' target='_blank'><i class='fab fa-odnoklassniki'></i></a></li>";
                                    break;
                                case 'TG':
                                    echo "<li><a href='$link' target='_blank'><i class='fab fa-telegram-fly'></i></a></li>";
                                    break;
                                case 'INST':
                                    echo "<li><a href='$link' target='_blank'><i class='fab fa-instagram'></i></a></li>";
                                    break;
                                case 'FB':
                                    echo "<li><a href='$link' target='_blank'><i class='fab fa-facebook-f'></i></a></li>";
                                    break;
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <p><span style="font-weight: bold">&copy; <?php echo date('Y') ?> Handy Cover.</span> Все права защищены</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="text-center">Связь с разработчиками: <a href="mailto:mrhteamworld@gmail.com">MrHTeamWorld</a></p>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/static/slick/slick.min.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/script.js"></script>
    <?php if (stristr($requestUri, 'product') !== FALSE) echo '<script src="/static/js/productPage.js"></script>'; ?>
<script src="/static/js/fadeNavbar.js"></script>
<script src="/static/js/reviewSlider.js"></script>
</body>
</html>