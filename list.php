<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>PHP: Lesson 6: List</title>
</head>
<body>
<style type="text/css">
	a {
		text-transform: uppercase;
		color: black;
	}
	a:hover {
		color: red;
	}
	.main {
		font-weight: 700;
		color: blue;
	}
</style>

<a class="main" href="admin2.php">Главная</a>

<?php

$file_dir = "tests/";

if ($file_dir = opendir($file_dir)) {

    while (false !== ($entry = readdir($file_dir))) {

        if ($entry != "." && $entry != "..") {
        	$test_name = explode('.',$entry)[0];
        	?>
        	<div><a href="test.php?test=<?=$test_name?>"><?= $test_name ?></a></div>
        	<?php
        }
    }

    closedir($file_dir);
}

?>


</body>
</html>