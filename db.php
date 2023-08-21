<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "chat";
$db = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
