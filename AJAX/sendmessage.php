<?php
include "../db.php";
session_start();
$user_id = $_POST["user_id"];
$message = $_POST["message"];
$my_id = $_SESSION["id"];
$messageInsert = $db->prepare("INSERT INTO messages (sender_id,receiver_id,message) VALUES(?,?,?)");
$messageInsert->execute([$my_id, $user_id, $message]);
$lastMessage = $db->prepare("SELECT * FROM messages WHERE sender_id =? AND receiver_id=? ORDER BY created_at DESC LIMIT 1");
$lastMessage->execute([$my_id, $user_id]);
$message = $lastMessage->fetch(PDO::FETCH_ASSOC);
echo json_encode(["message" => $message]);
