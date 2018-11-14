<?php
$phones = $data->getPhones();
$email = $data->getEmail();
$address = $data->getAddress();
?>

<div class="contacts-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="#!">Контакты</a></li>
            </ol>
        </nav>
        <h3 class="display-4 page-header">
            Наши контактные данные
        </h3>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="contacts-phones">
                    <i class="fas fa-phone mr-2"></i><span>Наши телефоны:</span>
                    <ul>
                        <?php
                        foreach ($phones as $phone) {
                            $number = $phone->getPhoneNumber();
                            echo "<li>$number</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="contacts-email">
                    <i class="fas fa-at mr-2"></i><span>Электронная почта: </span>
                    <a href="mailto:<?php echo $email ?>"><?php echo $email?></a>
                </div>
                <div class="contacts-address mt-5">
                    <i class="far fa-address-card mr-2"></i><span>Наш адрес: <?php echo $address ?></span>

                </div>
            </div>
        </div>
        <div class="contacts-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2994.2043810214163!2d69.29207471485657!3d41.369644079265775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef336633b2479%3A0xe069eab291be2aef!2z0KDRi9C90L7QuiDQkNGF0LzQsNC0INCU0L7QvdC40Yg!5e0!3m2!1sru!2s!4v1540461173672" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>