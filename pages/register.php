<?php
$errors = [];
$name = $surname = $login = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include "db.php";
    $name = isset($_POST["name"]) ? htmlspecialchars(trim($_POST["name"])) : "";
    $surname = isset($_POST["surname"]) ? htmlspecialchars(trim($_POST["surname"])) : "";
    $login = isset($_POST["login"]) ? htmlspecialchars(trim($_POST["login"])) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $password_confirmation = isset($_POST["password_confirmation"]) ? $_POST["password_confirmation"] : "";
    if (empty($name) || strlen($name) < 3 || strlen($name) > 50) {
        $errors["name"] = "Ad 3 - 50 simvol";
    }
    if (empty($surname) || strlen($surname) < 3 || strlen($surname) > 50) {
        $errors["surname"] = "Soyad 3 - 50 simvol";
    }
    if (empty($login) || strlen($login) < 3 || strlen($login) > 50) {
        $errors["login"] = "Login 3 - 50 simvol";
    } else {
        $checkLogin = $db->prepare("SELECT * FROM users WHERE login = ? LIMIT 1;");
        $checkLogin->execute([$login]);
        if ($checkLogin->rowCount() > 0) {
            $errors["login"] = "$login artıq mövcuddur";
        }
    }
    if (empty($password) || strlen($password) < 8 || strlen($password) > 255) {
        $errors["password"] = "Şifrə 8 - 255 simvol";
    } else {
        if ($password !== $password_confirmation) {
            $errors["password"] = "Şifrələr düz gəlmir.";
        }
    }
    if (!count($errors)) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $registerSql = $db->prepare("INSERT INTO users (name,surname,login,password) VALUES (?,?,?,?)");
        $registerSql->execute([$name, $surname, $login, $hashPassword]);
        if ($registerSql->rowCount() > 0) {
            echo "Ugurlu qeydiyat";
        } else {
            echo "Qeydiyyat zamanı xəta baş verdi.";
        }
    }
}
?>
<div class="login-page">
    <div class="form">
        <form class="register-form" method="POST" action="">
            <input type="text" value="<?= $name ?>" placeholder="Name" name="name" class="<?= isset($errors["name"]) ? "has__error" : "" ?>" />
            <?= isset($errors["name"]) ? "<span>" . $errors["name"] . "</span>" : "" ?>
            <input type="text" value="<?= $surname ?>" placeholder="Surname" name="surname" class="<?= isset($errors["surname"]) ? "has__error" : "" ?>" />
            <?= isset($errors["surname"]) ? "<span>" . $errors["surname"] . "</span>" : "" ?>
            <input type="text" value="<?= $login ?>" placeholder="Login" name="login" class="<?= isset($errors["login"]) ? "has__error" : "" ?>" />
            <?= isset($errors["login"]) ? "<span>" . $errors["login"] . "</span>" : "" ?>
            <input type="password" placeholder="Password" name="password" class="<?= isset($errors["password"]) ? "has__error" : "" ?>" />
            <?= isset($errors["password"]) ? "<span>" . $errors["password"] . "</span>" : "" ?>
            <input type="password" placeholder="Password Confirmation" name="password_confirmation" class="<?= isset($errors["password"]) ? "has__error" : "" ?>" />
            <button>Create</button>
            <p class="message">Already registered? <a href="http://localhost/chat/?page=login">Sign In</a></p>
        </form>
    </div>
</div>