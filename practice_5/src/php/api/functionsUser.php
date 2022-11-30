<?php

function getAllUser($connect) {
    $user = mysqli_query($connect, "SELECT * FROM `users`");
    $userList = [];
    while($oneUser = mysqli_fetch_assoc($user)) {
        $userList[] = $oneUser;
    }
    echo json_encode($userList);
}

function getOneUser($connect, $id) {
    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `ID`= $id");

    if (mysqli_num_rows($user) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "user not found"
        ];
        echo json_encode($res);
    } else {
        $user = mysqli_fetch_assoc($user);
        echo json_encode($user);
    }
}

function addUser($connect, $data){

    $name = $data['name'];
    $pass = $data['pass'];

    mysqli_query($connect, "INSERT INTO `users` (`ID`, `name`, `password`) VALUES (NULL, '$name', '$pass')");

     http_response_code(201);
     $res = [
        "status" => true,
        "user_id" => mysqli_insert_id($connect)
     ];

     echo json_encode($res);
}

function updateUser($connect, $id, $data){
    $name = $data['name'];
    $pass = $data['pass'];
    mysqli_query($connect, "UPDATE `users` SET `name` = '$name', `password` = '$pass' WHERE `ID` = '$id'");

    http_response_code(200);
     $res = [
        "status" => true,
        "message" => "user is updated"
     ];

     echo json_encode($res);
}

function deleteUser($connect, $id){
    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`ID` = '$id'");
    http_response_code(200);
     $res = [
        "status" => true,
        "message" => "user is deleted"
     ];

     echo json_encode($res);
}