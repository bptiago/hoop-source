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

            //Is ok, add to database
            require_once "connection.php";
            $sql_query = "INSERT INTO Usuario (Nome_completo, Data_nascimento, Email, Senha)
            VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_query);

            if ($stmt) {
                // Valid query and connection
                $stmt->bind_param("ssss", $fullName, $birthDate, $email, $password_hash);
                $stmt->execute();
                $stmt->close();
                header("Location: users_index.php");
            } else {
                // Something went wrong
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