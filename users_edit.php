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
    <?php 
        session_start();
        include("connection.php");
        if (!isset($_SESSION["id"])) {
            header("Location: index.php");
        } else {
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM Usuario WHERE ID_usuario = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome = $row["Nome_completo"];
                    $dataNascimento = $row["Data_nascimento"];
                    $email = $row["Email"];
                }
            }
        }
    ?>
    <div>
        <div class="reg-form-div">
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validateUserEdit(this)" style="margin: auto;" action="users_edit_php.php">
                <h1>Editar Jogador</h1>
                <div class="form">
                    <div style="text-align: center; margin-top: 2px">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome" value="<?php echo $nome ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="birth">Data de Nascimento</label>
                        <input type="date" name="birth" id="birth" class="input" placeholder="Birthdate" min="1930-01-01" value="<?php echo $dataNascimento ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="input" placeholder="Email" value="<?php echo $email ?>">
                    </div>
                    <input type="hidden" name="hideId" value="<?php echo $id ?>">
                    <div>
                        <input type="submit" value="Enviar" name="send" class="sub-btn">
                    </div>
                </div>
            </form>
        </div>
        <div id="alerts" style="display: flex; flex-direction:column; align-items:center">
        </div>
    </div>
    <script src="./functions.js"></script>
</body>
</html>