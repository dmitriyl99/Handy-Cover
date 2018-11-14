<?php
$vacancies = $data->getVacancies();
?>

<div class="vacancies-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="#!">Вакансии</a></li>
            </ol>
        </nav>
        <h4 class="display-4 page-header">
            Вакансии Handy Cover
        </h4>
        <p>Ташкентский швейный цех Handy Cover набирает людей на следующие должности:</p>
        <div class="card-deck">
            <?php
            foreach ($vacancies as $vacancy) {
                $name = $vacancy->getName();
                $demands = $vacancy->getDemands();
                echo
                "
                <div class='card shadow'>
                    <div class='card-body'>
                        <div class='card-title'>$name</div>
                        <p class='card-text'>$demands</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </div>
</div>