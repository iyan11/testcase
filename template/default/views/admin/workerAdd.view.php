<?php
/**
 * @var array $_OPT - массив с настройками
 * @var array $data - массив с данными
 */

$_OPT['title'] = "Добавление сотрудника - ".$_OPT['sub-title'];

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Добавление сотрудника</h1>
        </div>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="InputName">Фамилия</label>
            <input type="text" name="lastname" class="form-control" id="InputName">
        </div>
        <div class="form-group">
            <label for="InputName">Имя</label>
            <input type="text" name="name" class="form-control" id="InputName">
        </div>
        <div class="form-group">
            <label for="InputName">Отчество</label>
            <input type="text" name="firstname" class="form-control" id="InputName">
        </div>
        <div class="form-group">
            <label for="InputName">Пол</label>
            <select name="sex" class="form-control" id="InputName">
                <option value="1">Мужской</option>
                <option value="0">Женский</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
</div>