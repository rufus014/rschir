<?php
header('Content-type: json/application');
require 'connect.php';
require 'functionsDish.php';
require 'functionsUser.php';

$q = $_GET['q'];

$params = explode('/', $q);
$type = $params[0];
if(isset($params[1])){
    $id = $params[1];
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if ($type === 'food'){
            if(isset($id)){
                getOneDish($connect, $id);
            }
            else {
                getAllDish($connect);
            }
        } 
        elseif ($type === 'user'){
            if(isset($id)){
                getOneUser($connect, $id);
            }
            else {
                getAllUser($connect);
            }
        }
        break;
    
    case 'POST':
        if ($type === 'food'){
            addDish($connect, $_POST);
        } 
        elseif($type === 'user'){
            addUser($connect, $_POST);
        }
        break;
    
    case 'PATCH':
        if ($type === 'food'){
            if(isset($id)){
                $data = file_get_contents('php://input');
                $data = json_decode($data, true);
                updateDish($connect, $id, $data);
            }
        } 
        elseif($type === 'user'){
            if(isset($id)){
                $data = file_get_contents('php://input');
                $data = json_decode($data, true);
                updateUser($connect, $id, $data);
            }
        }
        break;
    case 'DELETE':
        if ($type === 'food'){
            if(isset($id)){
                deleteDish($connect, $id);
            }
        }
        elseif ($type === 'user'){
            if(isset($id)){
                deleteUser($connect, $id);
            }
        }
        break;

} 



