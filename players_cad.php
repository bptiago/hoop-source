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
        } else {
            $id = $_GET['id'];
        }
    ?>
    <div>
        <div class="reg-form-div">
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validatePlayer(this)" style="margin: auto;" action="players_cad_php.php">
                <h1>Adicionar Jogador</h1>
                <div class="form">
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="date" name="birth" id="birth" class="input" placeholder="Data de nascimento" min="1930-01-01">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="nacionalidade" id="nacionalidade" class="input" placeholder="Nacionalidade">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="posicao" id="posicao" class="input" placeholder="Posição (Ala, Armador ou Pivo)">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="camiseta" id="camiseta" class="input" placeholder="Camiseta">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="altura" id="altura" class="input" placeholder="Altura (metros)">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <input type="text" name="valorContrato" id="valorContrato" class="input" placeholder="Valor do contrato (só números)">
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