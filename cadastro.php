<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/general.css">
    <link rel="stylesheet" href="./assets/css/form.css">

    <title>Formulário</title>
</head>
<body>
    <?php include "./assets/components/header.php";?>
    <div>
        <div class="reg-form-div">
            <div class="reg-logo">
                <img src="./assets/images/cat.png" alt="" srcset="" style="width:100%">
            </div>
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validateForm(this)">
                <h1>Register</h1>
                <div class="form">
                    <div>
                        <input type="text" name="name" id="name" class="input" placeholder="Name">
                    </div>
                    <div>
                        <input type="text" name="username" id="username" class="input" placeholder="Username">
                    </div>
                    <div>
                        <input type="text" name="email" id="email" class="input" placeholder="Email">
                    </div>
                    <div>
                        <input type="date" name="birth" id="birth" class="input" placeholder="Birthdate" min="1930-01-01">
                    </div>
                    <div>
                        <input type="password" name="password" id="password" class="input" placeholder="Password">
                    </div>
                    <div>
                        <input type="password" name="confirmPassword" id="confirmPassword" class="input" placeholder="Confirm password">
                    </div>
                    <div>
                        <input type="submit" value="Enviar" name="send" class="sub-btn">
                    </div>
                </div>
            </form>
        </div>
        <div id="alerts" style="display: flex; flex-direction:column; align-items:center">
            <?php 
                if (isset($_POST['send'])) {
                    $fullName = $_POST['name'];
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $cpf = $_POST['cpf'];
                    $birthDate = $_POST['birth'];
                    $password = $_POST['password'];
                    $confirmPassword = $_POST['confirmPassword'];

                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $errors = array();

                    if (empty($fullName) || empty($email) || empty($cpf) || empty($birthDate)) {
                        array_push($errors, "Todos os campos são obrigatórios");
                    }

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "E-mail inválido");
                    }

                    if (strlen($password) < 6) {
                        array_push($errors, "Senha requer pelo menos 8 caracteres");
                    }

                    if ($password !== $confirmPassword) {
                        array_push($errors, "Senhas não foram digitadas igualmente");
                    }

                    if (count($errors) > 0) {
                        // Input(s) invalid
                        foreach ($errors as $error) {
                            echo "<div class='alert' style='margin-top:8px;'>$error</div>";
                        }
                    } else {
                        // Is ok, add to database
                        // require_once "connection.php";
                        // $sql_query = "INSERT INTO users
                        // VALUES (?, ?, ?, ?, ?)";
                        // $stmt = $connection->prepare($sql_query);

                        // if ($stmt) {
                        //     // Valid query and connection
                        //     $stmt->bind_param("sssss", $cpf, $fullName, $email, $birthDate, $password_hash);
                        //     $stmt->execute();
                        //     $stmt->close();
                        //     echo "<h2>okayy</h2>";
                        // } else {
                        //     // Something went wrong
                        //     die("Someting went wrong");
                        // }
                    }
                }
            ?>
        </div>
    </div>
    <script src="./functions.js"></script>
</body>
</html>