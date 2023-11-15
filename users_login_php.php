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
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM Usuario WHERE Email = '$email'"; // RETORNA PASSWORD COM HASH
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($password, $row['Senha'])) {
                    header("Location: users_index.php");
                    session_start();
                    $_SESSION["id"] = intval($row["ID_usuario"]);
                    $_SESSION["role"] = 'user';
                } else {
    ?>
<script>
    alert("Senha errada");
    history.go(-1);
</script>
    <?php   
                }
            }
        } else {
    ?>
    <script>
        alert("Login inválido ou inexistente");
        history.go(-1);
    </script>
        <?php 
        }
    }
    ?>
</body>
</html>