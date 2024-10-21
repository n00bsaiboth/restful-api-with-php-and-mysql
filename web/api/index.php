<?php

namespace Api;

require_once "initialize.php";

header("Content-Type: application/json");

use Api\Database\Database;
use Api\User\User;

$database = new Database();
$pdo = $database->connect();

$user = new User($pdo);

$request = $_SERVER["REQUEST_METHOD"];

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = validateInt($_GET["id"]);
}

if($request === "GET") {
    if(isset($id)) {
        $result = $user->getSingle($id);
    } else {
        $result = $user->getAll();
    }
} else {
    $result = ["Message: " => "Something went wrong. Please try again."];
}

echo json_encode($result);

unset($user);
unset($pdo);
unset($database);