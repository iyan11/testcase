<?php
/**
 * @var array $_OPT - массив с настройками
 * @var array $data - массив с данными
 */

$_OPT['title'] = "Редактирование места работы - ".$_OPT['sub-title'];

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Добавление места работы</h1>
        </div>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="start_date">Дата начала работы</label>
            <input type="date" name="start_date" class="form-control" id="start_date" >
        </div>
        <div class="form-group">
            <label for="end_date">Дата окончания работы</label>
            <input type="date" name="end_date" class="form-control" id="end_date" >
        </div>
        <div class="form-group">
            <label for="title">Название места работы</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>