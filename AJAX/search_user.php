<?php
include "../db.php";
session_start();
$search = $_POST["search"];
$searchQuery = $db->prepare("SELECT id,name,surname,login FROM users
 WHERE (name LIKE ? OR surname LIKE ?) AND id!=?");
$searchQuery->execute(["%" . $search . "%", "%" . $search . "%", $_SESSION["id"]]);
$results = $searchQuery->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["results" => $results]);
