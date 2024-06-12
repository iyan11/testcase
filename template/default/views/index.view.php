<?php
/**
 * @var array $_OPT - массив с настройками
 * @var array $data - массив с данными
 */


$_OPT['title'] = "Сотрудники - ".$_OPT['sub-title'];
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Сотрудники</h1>
        </div>
    </div>
    <a href="/admin?worker=Add" class="btn btn-info mb-3 btn-block ">Добавить сотрудника</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пол</th>
            <th scope="col">Места работы</th>
            <?php
            if (isset($_SESSION['ALogin'])){
            ?>
            <th scope="col">Действия</th>
            <?php }?>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $key => $worker) {
            ?>
            <tr>
                <th scope="row"><?= $worker['id'] ?></th>
                <td><?= $worker['lastname'] ?></td>
                <td><?= $worker['name'] ?></td>
                <td><?= $worker['firstname'] ?></td>
                <td><?= $worker['sex'] ? 'Мужской' : 'Женский' ?></td>
                <td><?= $worker['workplaces'] ?></td>
                <?php
                if (isset($_SESSION['ALogin'])){
                ?>
                <td>
                    <a href="/admin?worker=Edit&id=<?= $worker['id'] ?>" class="btn btn-primary">Редактировать</a>
                    <a href="/admin?worker=Delete&id=<?= $worker['id'] ?>" class="btn btn-danger">Удалить</a>
                </td>

            <?php }?>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>