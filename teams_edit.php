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
        include("connection.php");
        if (!isset($_SESSION["id"])) {
            header("Location: index.php");
        }
        else if (!$_SESSION['isAdmin']) {
    ?>
        <script>
            alert("Você não tem permissão de edição no sistema");
            history.go(-1);
        </script>
    <?php
        } else {
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM Time WHERE Id_time = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome = $row["Nome_time"];
                    $tecnico = $row["Tecnico"];
                    $cidade = $row["Cidade"];
                    $estado = $row["Estado"];
                    $arena = $row["Arena"];
                }
            }
        }
    ?>
    <div>
        <div class="reg-form-div">
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validateTeam(this)" style="margin: auto;" action="teams_edit_php.php">
                <h1>Editar Time</h1>
                <div class="form">
                    <div style="text-align: center; margin-top: 2px">
                        <label for="nome">Nome do Time</label>
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome" value="<?php echo $nome ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="tecnico">Técnico principal</label>
                        <input type="text" name="tecnico" id="tecnico" class="input" placeholder="Tecnico" value="<?php echo $tecnico ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" id="estado" class="input" placeholder="Estado" value="<?php echo $estado ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="input" placeholder="Cidade" value="<?php echo $cidade ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="arena">Arena / Estádio</label>
                        <input type="text" name="arena" id="arena" class="input" placeholder="Arena" value="<?php echo $arena ?>">
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