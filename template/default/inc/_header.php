<?php
/**
 * @var array $_OPT - массив с настройками
 */
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>{!TITLE!}</title>
		<meta name="viewport" content="width=1100">
		<meta name="description" content="" />
		<!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="/template/<?=$_OPT['style']?>/css/style.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
			<div class="container">
				<?php require_once "template/".$_OPT['style']."/inc/top_menu.php";?>
			</div>
		</header>
