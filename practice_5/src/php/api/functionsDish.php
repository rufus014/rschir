<?php

function getAllDish($connect) {
    $dish = mysqli_query($connect, "SELECT * FROM `catalog`");
    $dishList = [];
    while($oneDish = mysqli_fetch_assoc($dish)) {
        $dishList[] = $oneDish;
    }
    echo json_encode($dishList);
}

function getOneDish($connect, $id) {
    $dish = mysqli_query($connect, "SELECT * FROM `catalog` WHERE `ID`= $id");

    if (mysqli_num_rows($dish) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Dish not found"
        ];
        echo json_encode($res);
    } else {
        $dish = mysqli_fetch_assoc($dish);
        echo json_encode($dish);
    }
}

function addDish($connect, $data){

    $name = $data['name'];
    $desc = $data['desc'];
    $price = $data['price'];

    mysqli_query($connect, "INSERT INTO `catalog` (`ID`, `product_name`, `product_desc`, `product_price`) VALUES (NULL, '$name', '$desc', '$price')");

     http_response_code(201);
     $res = [
        "status" => true,
        "dish_id" => mysqli_insert_id($connect)
     ];

     echo json_encode($res);
}

function updateDish($connect, $id, $data){
    $name = $data['name'];
    $desc = $data['desc'];
    $price = $data['price'];
    mysqli_query($connect, "UPDATE `catalog` SET `product_name` = '$name', `product_desc` = '$desc', `product_price` = '$price' WHERE `ID` = '$id'");

    http_response_code(200);
     $res = [
        "status" => true,
        "message" => "Dish is updated"
     ];

     echo json_encode($res);
}

function deleteDish($connect, $id){
    mysqli_query($connect, "DELETE FROM `catalog` WHERE `catalog`.`ID` = '$id'");
    http_response_code(200);
     $res = [
        "status" => true,
        "message" => "Dish is deleted"
     ];

     echo json_encode($res);
}