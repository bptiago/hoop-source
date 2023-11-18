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
            alert("Você não tem permissão de exclusão no sistema");
            history.go(-1);
        </script>
    <?php
        }
    ?>
    <div>
        <div class="reg-form-div">
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validateTeam(this)" style="margin: auto;" action="teams_cad_php.php">
                <h1>Adicionar Time</h1>
                <div class="form">
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome do time">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="tecnico" id="tecnico" class="input" placeholder="Técnico principal">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="estado" id="estado" class="input" placeholder="Estado">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="cidade" id="cidade" class="input" placeholder="Cidade">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="arena" id="arena" class="input" placeholder="Arena/Estádio sede">
                    </div>
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