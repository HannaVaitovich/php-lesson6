<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
</head>
<body>
<form method="post" action="test.php">
<?php

if (!empty($_GET['test'])) {
$file_dir = "tests/";
$test_name = $_GET['test'];
$test = file_get_contents($file_dir . $test_name . '.json');
$test = json_decode($test, true);

foreach($test as $qn => $q)
{
    echo '<hr>';
    echo '<h4>'.$q['question'].'</h4>';

    foreach ($q['answers'] as $key => $answer) {
        echo '<input type="radio" name="a'.$qn.'" value="'.$key.'"> ';
        echo $answer."<br>";
    }
}

echo '<input type="hidden" name="test" value="'.$test_name.'">';
echo '<input type="submit" value="Отправить ответы">';

}
?>
</form>
</body>
</html>

<?php

$correct = 0;
$incorrect = 0;

if (!empty($_POST)) {
$file_dir = "tests/";
$test_name = $_POST['test'];
$test = file_get_contents($file_dir . $test_name . '.json');
$test = json_decode($test, true); 

foreach($test as $qn => $q) {
    if ($q['correctAnswer'] == isset($_POST['a'.$qn])) {
        $correct ++; 
    } else {
        $incorrect ++;
    }
}

echo '<hr>';
echo 'Правильных ответов: '.$correct.'<br>';
echo 'Неправильных ответов: '.$incorrect.'<br>';

}


?>
