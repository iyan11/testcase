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
            <h1>Редактирование мест работы</h1>
        </div>
    </div>
    <a href="/admin?workplaces=Add&worker_id=<?= $_GET['worker_id'] ?>" class="btn btn-info mb-3 btn-block ">Добавить место работы</a>
    <?php foreach ($data as $key => $workplaces) {
        if(!isset($workplaces['start_date'])) continue;
        ?>
        <form method="POST">
            <div class="form-group">
                <label for="start_date">Дата начала работы</label>
                <input type="date" name="start_date" class="form-control" id="start_date" value="<?= date('Y-m-d',strtotime($workplaces['start_date'])) ?>">
            </div>
            <div class="form-group">
                <label for="end_date">Дата окончания работы</label>
                <input type="date" name="end_date" class="form-control" id="end_date" value="<?= date('Y-m-d',strtotime(isset($workplaces['end_date']) ? $workplaces['end_date'] : 'now')) ?>">
            </div>
            <div class="form-group">
                <label for="title">Название места работы</label>
                <input type="text" name="title" class="form-control" id="title" value="<?= htmlspecialchars($workplaces['title']) ?>">
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
            <input type="hidden" name="id" value="<?= $workplaces['id'] ?>">
            <a href="/admin?workplaces=Delete&id=<?= $workplaces['id'] ?>" class="btn btn-danger">Удалить</a>
        </form>
        <?php
    }?>