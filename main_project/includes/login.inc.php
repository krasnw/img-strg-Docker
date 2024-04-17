<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Uzupęłnij wszystkie pola";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Niepoprawna nazwa użytkownika albo hasło";
        }

        if (!is_username_wrong($result) && is_password_wrong($password, $result["pwd"])) {
            $errors["login_incorrect"] = "Niepoprawna nazwa użytkownika albo hasło";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
        } else {
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["id"];
            

            $_SESSION["user_id"] = $result["id"];
            $_SESSION["username"] = htmlspecialchars($result["username"]);

            $_SESSION["last_regeneration"] = time();
        }

        if ($errors) {
            header("location: ../login.php");
        } else {
            header("location: ../profile.php");
        }

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: ../login.php");
    die();
}