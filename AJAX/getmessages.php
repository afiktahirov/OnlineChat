<?php
session_start();
include "../db.php";
$user_id = $_POST["user_id"];
$my_id = $_SESSION["id"];
$messagesQuery = $db->prepare("SELECT * FROM messages
 WHERE (sender_id = ? AND receiver_id=?) OR (sender_id = ? AND receiver_id=?)");
$messagesQuery->execute([$user_id, $my_id, $my_id, $user_id]);
$messages = $messagesQuery->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["messages" => $messages]);
