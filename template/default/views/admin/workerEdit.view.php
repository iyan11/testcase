<?php
/**
 * @var array $_OPT - массив с настройками
 * @var array $data - массив с данными
 */

$_OPT['title'] = "Редактирование сотрудника - ".$_OPT['sub-title'];

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Редактирование сотрудника</h1>
        </div>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="InputName">Фамилия</label>
            <input type="text" name="lastname" class="form-control" id="InputName" value="<?= htmlspecialchars($data['lastname']) ?>">
        </div>
        <div class="form-group">
            <label for="InputName">Имя</label>
            <input type="text" name="name" class="form-control" id="InputName" value="<?= htmlspecialchars($data['name']) ?>">
        </div>
        <div class="form-group">
            <label for="InputName">Отчество</label>
            <input type="text" name="firstname" class="form-control" id="InputName" value="<?= htmlspecialchars($data['firstname']) ?>">
        </div>
        <div class="form-group">
            <label for="InputName">Пол</label>
            <select name="sex" class="form-control" id="InputName">
                <option value="1" <?= $data['sex'] ? 'selected' : '' ?>>Мужской</option>
                <option value="0" <?= $data['sex'] ? '' : 'selected' ?>>Женский</option>
            </select>
        </div>

        <div class="form-group">
            <a href="/admin?workplaces=Edit&worker_id=<?= $data['id'] ?>" class="btn btn-primary">Редактировать места работы</a>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="/admin?worker=Delete&id=<?= $data['id'] ?>" class="btn btn-danger">Удалить</a>
    </form>
</div>