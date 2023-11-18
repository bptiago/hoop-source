<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("connection.php");
        if (isset($_POST['send'])) {
            $fullName = $_POST['name'];
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $birthDate = $_POST['birth'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql_query = "INSERT INTO Usuario (Nome_completo, Data_nascimento, Email, Senha)
            VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_query);

            if ($stmt) {
                $stmt->bind_param("ssss", $fullName, $birthDate, $email, $password_hash);
                $stmt->execute();
                $stmt->close();
                header("Location: users_login.php");
            } else {
                ?>
                <script>
                    alert("Algo deu errado...");
                    history.go(-1);
                </script>
    <?php
            }
        }
    ?>
</body>
</html>