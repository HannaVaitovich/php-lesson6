<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>PHP: Lesson 6</title>
</head>
<body>
<style type="text/css">
	dd, dt {
		display: inline-block;
		margin: 0;
	}

	a {
		color: black;
	}

	a:hover {
		color: red;
	}
</style>

<a href="admin2.php">Главная</a>
<a href="list.php">Список тестов</a>

<form method="post" enctype="multipart/form-data" action="admin2.php">
<dl>
	<dt>Файл:</dt>
	<dd><input type="file" name="uploaded_file"></dd>
</dl>
<div class="button">
	<input type="submit" value="Загрузить">
</div>
</form>

<?php

	$file_dir = "tests/";

	if(isset($_FILES['uploaded_file']['name']) && !empty($_FILES['uploaded_file']['name']))
	{
		$filename = htmlspecialchars($_FILES['uploaded_file']['name']);
		$target_file = $file_dir . basename($_FILES['uploaded_file']['name']);
		$file_type = pathinfo($target_file, PATHINFO_EXTENSION);

		if($file_type != "json") 
		{
		    echo "Ошибка: файл НЕ загружен! Файл должен быть типа .json";
		    exit;
	    }

		if($_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file))
		{
			echo "Файл успешно загружен"."<br>";
		}
		else
		{
			echo "Ошибка: файл НЕ загружен"."<br>";
		}
		
	}

?>



</body>
</html>