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
            
            $sql = "SELECT * FROM Jogador WHERE ID_jogador = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome = $row["Nome"];
                    $dataNascimento = $row["Data_nascimento"];
                    $nacionalidade = $row["Nacionalidade"];
                    $altura = $row["Altura"];
                    $posicao = $row["Posicao"];
                    $valor = $row["Valor"];
                    $camiseta = $row["Numero"];
                }
            }
        }
    ?>
    <div>
        <div class="reg-form-div">
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validatePlayer(this)" style="margin: auto;" action="players_edit_php.php">
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
                        <label for="nacionalidade">Nacionalidade</label>
                        <input type="text" name="nacionalidade" id="nacionalidade" class="input" placeholder="Nacionalidade" value="<?php echo $nacionalidade ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="posicao">Posição (Ala, volante ou pivo)</label>
                        <input type="text" name="posicao" id="posicao" class="input" placeholder="Posição (Ala, Armador ou Pivo)" value="<?php echo $posicao ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="camiseta">Número da camiseta</label>
                        <input type="text" name="camiseta" id="camiseta" class="input" placeholder="Camiseta" value="<?php echo $camiseta ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="altura">Altura (1.80, 1.90 etc.)</label>
                        <input type="text" name="altura" id="altura" class="input" placeholder="Altura (metros)" value="<?php echo $altura ?>">
                    </div>
                    <div style="text-align: center; margin-top: 2px">
                        <label for="valorContrato">Valor do contrato (apenas números)</label>
                        <input type="text" name="valorContrato" id="valorContrato" class="input" placeholder="Valor do contrato (só números)" value="<?php echo $valor ?>">
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