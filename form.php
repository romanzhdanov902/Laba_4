<?php
$success = isset($_GET['success']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ретро автомобили — подписка</title>
    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">

    <script>
        console.log("Аналитика подключена");
    </script>
</head>
<body>
    <div class="site-shell">
        <!-- Шапка сайта -->
        <header class="site-header">
            <div class="d-flex align-items-center">
                <div class="logo-box">
                    <a href="index.html"><img src="assets/logo.svg" alt="Логотип Ретро автомобили"></a>
                </div>

                <!-- Основное меню -->
                <nav class="main-nav navbar navbar-expand-lg">
                    <div class="container-fluid justify-content-center">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#formMenu" aria-controls="formMenu" aria-expanded="false" aria-label="Переключить навигацию">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-center" id="formMenu">
                            <ul class="navbar-nav gap-lg-3 align-items-lg-center">
                                <li class="nav-item"><a class="nav-link" href="index.html">Объявления</a></li>
                                <li class="nav-item"><a class="nav-link" href="catalog.php">Каталог</a></li>
                                <li class="nav-item"><a class="nav-link" href="dealers.html">Дилеры</a></li>
                                <li class="nav-item"><a class="nav-link" href="reviews.html">Отзывы</a></li>
                                <li class="nav-item"><a class="nav-link active" href="form.php">Подписка</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="login-box">
                    <a class="login-btn btn" href="login.html">Войти</a>
                </div>
            </div>
        </header>

        <!-- Контент страницы подписки -->
        <main class="page-inner">
            <div class="breadcrumb-box">Домашняя страница › Подписка › Оформление</div>

            <div class="title-box">
                <h1>Оформить подписку</h1>
            </div>
<?php if ($success): ?>
    <div class="alert alert-success text-center" role="alert">
        Данные успешно сохранены в базу данных.
    </div>
<?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success text-center" role="alert">
                    Данные успешно сохранены в базу данных.
                </div>
            <?php endif; ?>

            <!-- Форма подписки -->
            <section class="form-panel">
                <p class="helper-text text-center mb-4">
                    Оставьте контакты, выберите подходящий уровень и получайте уведомления
                    о новых ретро-автомобилях и скидках.
                </p>

                <form class="needs-validation" id="subscriptionForm" action="save_form.php" method="POST" novalidate>
                    <!-- Поле имени -->
                    <div class="mb-3">
                        <label class="form-label-custom" for="name">Ваше имя</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Например, Роман" required>
                        <div class="invalid-feedback">Введите имя.</div>
                    </div>

                    <!-- Поле телефона -->
                    <div class="mb-3">
                        <label class="form-label-custom" for="phone">Номер телефона</label>
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="+49 123 456 78 90" required>
                        <div class="invalid-feedback">Введите номер телефона.</div>
                    </div>

                    <!-- Поле почты -->
                    <div class="mb-4">
                        <label class="form-label-custom" for="email">Электронная почта</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required>
                        <div class="invalid-feedback">Введите корректную почту.</div>
                    </div>

                    <!-- Блок выбора уровня подписки -->
                    <div class="mb-4">
                        <label class="form-label-custom">Выберите уровень подписки</label>

                        <div class="plan-grid">
                            <div class="plan-option form-check">
                                <input class="form-check-input" type="radio" name="plan" id="planBasic" value="Базовый" checked>
                                <label class="form-check-label" for="planBasic">
                                    <span class="plan-title">Базовый</span>
                                    <span class="plan-text">Еженедельная подборка новых объявлений и новости каталога.</span>
                                </label>
                            </div>

                            <div class="plan-option form-check">
                                <input class="form-check-input" type="radio" name="plan" id="planFan" value="Фанат автомобилей">
                                <label class="form-check-label" for="planFan">
                                    <span class="plan-title">Фанат автомобилей</span>
                                    <span class="plan-text">Ранний доступ к подборкам, уведомления о скидках и подбор дилеров.</span>
                                </label>
                            </div>

                            <div class="plan-option form-check">
                                <input class="form-check-input" type="radio" name="plan" id="planPro" value="Автоэксперт">
                                <label class="form-check-label" for="planPro">
                                    <span class="plan-title">Автоэксперт</span>
                                    <span class="plan-text">Персональные рекомендации, закрытые предложения и приоритетная поддержка.</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Поле пожеланий -->
                    <div class="mb-3">
                        <label class="form-label-custom" for="message">Пожелания по подбору</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Какие марки, кузова или ценовой диапазон вам интересны?"></textarea>
                    </div>

                    <!-- Согласие с условиями -->
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="agreement" name="agreement" required>
                        <label class="form-check-label" for="agreement">
                            Я прочитал пользовательское соглашение и согласен с ним
                        </label>
                        <div class="invalid-feedback">Нужно подтвердить согласие.</div>
                    </div>

                    <!-- Согласие на рассылку -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                        <label class="form-check-label" for="newsletter">
                            Я готов получать рекламные рассылки и специальные предложения
                        </label>
                    </div>

                    <!-- Кнопки формы -->
                    <div class="d-flex flex-wrap justify-content-center gap-3 pt-2">
                        <button class="btn btn-dark submit-btn" type="submit">Подписаться</button>
                        <button class="btn btn-outline-dark submit-btn" type="reset">Очистить</button>
                    </div>
                <hr class="my-4">

                <div class="text-center">
                    <button class="btn btn-outline-dark" type="button" id="loadSubscriptionsBtn">
                        Показать заявки из базы
                    </button>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Тариф</th>
                                <th>Пожелания</th>
                                <th>Рассылка</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        <tbody id="subscriptionsTableBody">
                            <tr>
                                <td colspan="7" class="text-center">Данные пока не загружены</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </form>
            </section>
        </main>

        <!-- Модальное окно -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Сообщение</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body" id="successModalText">
                        Данные успешно обработаны.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-note">
            <p>© 2026 Ретро автомобили. Страница формы для оформления подписки и получения специальных предложений.</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>