<div class="top-menu">
    <a href="/">Главная страница</a>
    <?php
    if (!isset($_SESSION['ALogin'])){
    ?>
    <a href="/admin">Вход</a>
    <?php
    } else {
    ?>
    <a href="/admin?logout=true">Выход</a>
    <?php
    }
    ?>
</div>