<main>
    <section class="main-image">
        <div class="container">
            <div class="main-content">
                <div class="main-header">
                    <h1 class="text-center display-4 bounce animated">
                        Добро пожаловать в Handy Cover
                    </h1>
                </div>
                <div class="main-text">
                    <p class="text-center">Мы делаем качество доступным!</p>
                </div>
            </div>
        </div>
    </section>
    <section class="about bg-light">
        <div class="container-fluid">
            <div class="section-header">
                <h3 class="section-title">О нас</h3>
                <span class="section-divider"></span>
            </div>
            <p class="section-description">
                <?php echo $data->get_company_description(); ?>
            </p>
        </div>
    </section>
    <section class="services bg-white">
        <div class="container-fluid">
            <div class="section-header">
                <h3 class="section-title">Наши услуги</h3>
                <span class="section-divider"></span>
            </div>
            <p class="section-sub-header">
                Мы предоставляем вам следующие услуги:
            </p>
            <div class="section-description">
               <div class="container">
                   <div class="card-deck">
                       <a class="card services-item shadow" href="/services/clothes">
                           <div class="icon"><i class="fas fa-tshirt fa-3x"></i></div>
                           <h4 class="title">Пошив одежды</h4>
                           <p class="description">
                               Ташкентский швейный цех «Handy Cover» предоставляет профессиональные услуги, осуществляя качественный пошив оптовых и мелкооптовых партий одежды для мужчин и женщин, для частных лиц и различных категорий предприятий.
                           </p>
                       </a>
                       <a href="/services/curve" class="card services-item shadow">
                           <div class="icon"><i class="fas fa-pen-nib fa-3x"></i></div>
                               <h4 class="title">Разработка лекал</h4>
                           <p class="description">Изготовление лекал и выкроек – один из ключевых этапов швейного дела. Без этих изделий невозможно реализовать идею модельера на практике: по фото либо эскизу очень трудно понять, какой размер должен иметь каждый элемент будущей вещи.</p>
                       </a>
                   </div>
               </div>
            </div>
        </div>
    </section>
    <section id="catalog" class="bg-light">
        <div class="container-fluid">
            <div class="section-header">
                <h3 class="section-title">Наш каталог</h3>
                <span class="section-divider"></span>
            </div>
            <p class="section-sub-header">
                У нас найдётся широкий выбор товаров на всех!
            </p>
            <div class="section-description">
                <div class="container">
                    <div class="card-deck">
                        <a href="/catalog?id=1" class="catalog-item card shadow">
                            <div class="card-image-top"><img src="/media/category_images/men_clothes.jpg" alt=""></div>
                            <div class="card-body">
                                <h5 class="card-title">Мужская одежда</h5>
                            </div>
                        </a>
                        <a class="catalog-item card shadow" href="/catalog?id=2">
                            <div class="card-image-top"><img src="/media/category_images/women_clothes.jpg" alt=""></div>
                            <div class="card-body">
                                <h5 class="card-title">Женская одежда</h5>
                            </div>
                        </a>
                        <a class="catalog-item card shadow" href="/catalog?id=3">
                            <div class="card-image-top"><img src="/media/category_images/children_clothes.jpg" alt=""></div>
                            <div class="card-body">
                                <h5 class="card-title">Детская одежда</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="reviews" class="bg-white">
        <div class="section-header">
            <h3 class="section-title">Отзывы наших клиентов</h3>
            <span class="section-divider"></span>
        </div>
        <p class="section-sub-header">Люди говорят о нас:</p>
        <div class="section-description">
            <div class="container">
                <div class="review-slider">
                    <?php
                    $reviews = $data->get_reviews();
                    foreach ($reviews as $review) {
                        $user_name = $review->getUserName();
                        $review_text = $review->getReviewText();
                        echo "
                            <div class=\"review-item\">
                                <div class=\"review-name\">$user_name</div>
                                <div class=\"review-text\">$review_text</div>
                            </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section id="reviewForm" class="bg-white">
        <div class="section-header">
            <h3 class="section-title">Оставьте и вы свой отзыв!</h3>
            <span class="section-divider"></span>
        </div>
        <p class="section-sub-header">Мы будем рады узнавать ваше мнение о нашей деятельности!</p>
        <div class="section-description">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="/Main/leave_review" method="post">
                            <div class="form-group">
                                <label for="reviewName">Ваше имя</label>
                                <input type="text" name="reviewName" id="reviewName" placeholder="Введите имя" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="reviewMessage">Ваш отзыв</label>
                                <textarea name="reviewMessage" id="reviewMessage" class="form-control" placeholder="Введите ваш отзыв"></textarea>
                            </div>
                            <input type="submit" value="Оставить" class="btn btn-primary float-right clearfix">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--
        <section class="portfolio card shadow">
            <div class="card-header">
                <h4 class="card-title text-center">Примеры наших работ</h4>
            </div>
            <div class="card-body">
                <div class="portfolio-items d-flex justify-content-center flex-wrap">
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_1.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_2.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_3.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_4.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_5.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_6.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_7.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_8.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_9.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_10.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_11.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_12.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_13.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_14.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <div class="portfolio-item card">
                        <div class="card-body"><img src="/static/img/examples/example_15.jpg" alt="" class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </section>-->
</main>