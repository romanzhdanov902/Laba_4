<?php
require_once 'script.php';
$cars = getCars();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ретро автомобили — каталог</title>
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/styles.css">
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
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#catalogMenu" aria-controls="catalogMenu" aria-expanded="false" aria-label="Переключить навигацию">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="catalogMenu">
                            <ul class="navbar-nav gap-lg-3 align-items-lg-center">
                                <li class="nav-item"><a class="nav-link" href="index.html">Объявления</a></li>
                                <li class="nav-item"><a class="nav-link active" href="catalog.php">Каталог</a></li>
                                <li class="nav-item"><a class="nav-link" href="dealers.html">Дилеры</a></li>
                                <li class="nav-item"><a class="nav-link" href="reviews.html">Отзывы</a></li>
                                <li class="nav-item"><a class="nav-link" href="form.php">Подписка</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="login-box"><a class="login-btn btn" href="login.html">Войти</a></div>
            </div>
        </header>

        <!-- Контент каталога -->
        <main class="page-inner">
            <!-- Поле поиска по каталогу -->
            <div class="container mb-4">
                <input type="text"
                       id="searchInput"
                       class="form-control"
                       placeholder="Поиск автомобиля...">
            </div>
            <div class="breadcrumb-box" style="max-width:720px;">Домашняя страница &nbsp;›&nbsp; Каталог &nbsp;›&nbsp; Доступные к покупке</div>

            <div class="title-box">
                <h1>Каталог автомобилей</h1>
            </div>

            <!-- Панель с идеально выровненными карточками -->
            <section class="catalog-panel mt-4">
<div class="row g-4">
    <?php foreach ($cars as $car): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card catalog-card h-100">
                <img src="<?= htmlspecialchars($car['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($car['title']) ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= htmlspecialchars($car['title']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($car['short_description']) ?></p>
                    <p class="fw-bold mb-3">$<?= htmlspecialchars($car['price']) ?></p>
                    <a href="detail.html" class="btn btn-dark mt-auto">Подробнее</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</section>
</main>

        <footer class="footer-note">
            <p>© 2026 Ретро автомобили. Выберите машину из каталога и перейдите на страницу подробной информации.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
