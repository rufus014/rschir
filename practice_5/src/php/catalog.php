<?php

$mysqli = new mysqli("db", "user", "password", "appDB");

$result = $mysqli->query("SELECT * FROM catalog");
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

include('templates/catalogTemplate.php');