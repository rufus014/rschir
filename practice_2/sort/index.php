<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
        require 'sort.php';
        echo "Исходный массив: " . $_GET['array'] . "<br>";
        $array = explode(",", $_GET['array']);
        echo "Отсортированный вид: " . implode(",", insertSort($array));
    ?>
</body>
</html>