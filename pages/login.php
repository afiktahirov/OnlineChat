<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include "db.php";
    $login = isset($_POST["login"]) ? htmlspecialchars(trim($_POST["login"])) : "";
    $password = isset($_POST["password"]) ? htmlspecialchars(trim($_POST["password"])) : "";
    $loginSql = $db->prepare("SELECT * FROM users WHERE login = ?");
    $loginSql->execute([$login]);
    $user = $loginSql->fetch(PDO::FETCH_ASSOC);
    if ($loginSql->rowCount() === 0) {
        echo "Login tapilmadi";
    } else {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["surname"] = $user["surname"];
            header("Location: http://localhost/chat/?page=home");
        } else {
            echo "Sifre yanlishdir";
        }
    }
}
?>
<div class="login-page">
    <div class="form">
        <form class="login-form" action="" method="POST">
            <input type="text" name="login" placeholder="Login" />
            <input type="password" name="password" placeholder="Password" />
            <button>Login</button>
            <p class="message">Not registered? <a href="http://localhost/chat/?page=register">Create an account</a></p>
        </form>
    </div>
</div>