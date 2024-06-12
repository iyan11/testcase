<?php
/**
 * @var array $_OPT - массив с настройками
 * @var db $db - работа с БД
 */

$db->Query("SELECT * FROM `workers`");
$workers = array();
if($db->NumRows() > 0){
    $i = 0;
        foreach($db->FetchAll() as $row){
            if (!isset($row['id'])) continue;
            $i++;
            $workers[$i]['id'] = $row['id'];
            $workers[$i]['firstname'] = $row['firstname'];
            $workers[$i]['name'] = $row['name'];
            $workers[$i]['lastname'] = $row['lastname'];
            $workers[$i]['sex'] = $row['sex'];
            $workers[$i]['birthday'] = $row['birthday'];
            $workplaces = array();
            $db->Query("SELECT * FROM `workplaces` WHERE `worker_id` = ".$row['id']);
            if($db->NumRows() > 0){
                while($row = $db->FetchArray()){
                    $workplaces[] = $row['title'];
                }
            }

            $workers[$i]['workplaces'] = $workplaces ? implode(', ', $workplaces) : 'Нет данных';
        }
}
new gen('index', $workers);


//INSERT INTO `workers` (`id`, `firstname`, `name`, `lastname`, `sex`, `birthday`) VALUES (NULL, 'testov', 'test', 'testovich', '1', current_timestamp());