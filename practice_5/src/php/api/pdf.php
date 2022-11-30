<?php
include './services/login.php';
include './services/constants.php';

$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (!str_contains($uploadfile, '%PDF') && false) {
    echo "not pdf";
    return;
}

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    header('Location: /admin.php');
} else {
    echo '<pre>';
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";
