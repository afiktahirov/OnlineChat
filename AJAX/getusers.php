<?php
include "../db.php";
session_start();

$my_id = $_SESSION["id"];


$query = "SELECT DISTINCT m.sender_id, m.receiver_id, u.name, u.surname
FROM messages m
JOIN users u ON (m.sender_id = u.id OR m.receiver_id = u.id)
WHERE (m.sender_id = $my_id OR m.receiver_id = $my_id) AND u.id!=$my_id ;
";
$result = $db->query($query);

$users = [];

foreach ($result as $row) {
  $user = array(
    "id" => ($row["sender_id"] == $my_id) ? $row["receiver_id"] : $row["sender_id"],
    "name" => $row["name"],
    "surname" => $row["surname"]
  );
  $users[] = $user;
  
}

echo json_encode(["users" => $users]);
?>
