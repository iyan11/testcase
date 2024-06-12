<?php
/**
 * @var array $_OPT - массив с настройками
 * @var db $db - работа с БД
 */
//Вход
if (isset($_POST['Login'])){
	$func = new func();
	$login = $func->clear($_POST['Login']);
	$pass = $func->clear($_POST['Password']);
	$db->Query("SELECT * FROM `admin` WHERE `Login` LIKE '$login' AND `Password` LIKE '$pass'");
	if($db->NumRows() > 0){
		$array = $db->FetchArray();
		$_SESSION['ALogin'] = $array['Login'];
		$_SESSION['APassword'] = $array['Password'];
		$id = $array['Id'];
		$ip = $_SERVER["REMOTE_ADDR"];
		$db->Query("UPDATE `admin` SET `Last_IP` = '$ip' WHERE `admin`.`Id` = '$id';");
        header("Location: /");
	} else {
		echo "Логин или пароль не верны";
		new gen('admin');
	}
} else {
	if(isset($_SESSION['ALogin']) && isset($_SESSION['APassword'])){
		$func = new func();
		$login = $func->clear($_SESSION['ALogin']);
		$pass = $func->clear($_SESSION['APassword']);
		$db->Query("SELECT * FROM `admin` WHERE `Login` LIKE '$login' AND `Password` LIKE '$pass'");
		if($db->NumRows() > 0){
			//Работа со страницами
            //Сотрудники
            if(isset($_GET['worker'])) {
                switch ($_GET['worker']) {
                    case 'Add':
                        if (isset($_POST['lastname']) && isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['sex'])) {
                            $db->Query("INSERT INTO `workers` (`Lastname`, `Name`, `Firstname`, `Sex`) VALUES ('{$_POST['lastname']}', '{$_POST['name']}', '{$_POST['firstname']}', '{$_POST['sex']}')");
                            header("Location: /");
                        }
                        new gen('admin/workerAdd');
                        break;
                    case 'Edit':
                        if (isset($_POST['lastname']) && isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['sex'])) {
                            $db->Query("UPDATE `workers` SET `Lastname` = '{$_POST['lastname']}', `Name` = '{$_POST['name']}', `Firstname` = '{$_POST['firstname']}', `Sex` = '{$_POST['sex']}' WHERE `Id` = '{$_GET['id']}'");
                            header("Location: /");
                        }

                        $db->Query("SELECT * FROM `workers` WHERE `Id` = '{$_GET['id']}'");
                        $data = $db->FetchArray();
                        new gen('admin/workerEdit', $data);
                        break;
                    case 'Delete':
                        $db->Query("DELETE FROM `workers` WHERE `Id` = '{$_GET['id']}'");
                        header("Location: /");
                        break;
                    default:
                        header("Location: /");
                        break;
                }
            }

            //Места работы
			if(isset($_GET['workplaces'])) {
                switch ($_GET['workplaces']) {
                    case 'Add':
                        if (isset($_POST['title']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_GET['worker_id'])) {
                            $db->Query("INSERT INTO `workplaces` (`worker_id`, `start_date`, `end_date`, `title`) VALUES ('{$_GET['worker_id']}', '{$_POST['start_date']}', '{$_POST['end_date']}','{$_POST['title']}')");
                            header("Location: /");
                        }
                        new gen('admin/workplacesAdd');
                        break;
                    case 'Edit':
                        if (isset($_POST['title']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['id'])) {
                            $db->Query("UPDATE `workplaces` SET `Title` = '{$_POST['title']}', `Start_date` = '{$_POST['start_date']}', `End_date` = '{$_POST['end_date']}' WHERE `Id` = '{$_POST['id']}'");
                            header("Location: /");
                        }
                        $db->Query("SELECT * FROM `workplaces` WHERE `worker_id` = '{$_GET['worker_id']}'");
                        $data = $db->FetchAll();
                        new gen('admin/workplacesEdit', $data);
                        break;
                    case 'Delete':
                        $db->Query("DELETE FROM `workplaces` WHERE `Id` = '{$_GET['id']}'");
                        header("Location: /");
                        break;
                    default:
                        header("Location: /");
                        break;
                }
            }

            //Выход
            if(isset($_GET['logout'])) {
                session_destroy();
                header("Location: /");
            }
            if(!isset($_GET['worker']) && !isset($_GET['workplaces']) && !isset($_GET['logout'])) {
                header("Location: /");
            }
		} else {
			session_destroy();
			echo "Логин или пароль не верны";
			new gen('admin');
		}
	} else {
		new gen('admin');	
	}
}
