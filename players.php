<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/general.css">
    <link rel="stylesheet" href="./assets/css/table.css">

    <title>HoopSource</title>
</head>
<body>
    <?php include "./assets/components/header.php";?>
    <?php
        if (isset($_SESSION['isAdmin'])) {
            $_SESSION['isAdmin'] = true;
            $_SESSION['id'] = 00;
            $_SESSION['role'] = "admin";
        }

        include("./connection.php");
        $id = $_GET['id'];
        $sql = "SELECT * FROM Time INNER JOIN Jogador ON (Time.Id_time = Jogador.fk_Time_Id_time) WHERE Id_time = $id ORDER BY Jogador.Nome";
        $result = $conn->query($sql);
    ?>
    <section class="main" style="margin-top: 5vh;">
        <div class="names">
            <h2>Todos os jogadores (<?php echo $result->num_rows ?>)</h2>
            <a href="players_cad.php?id=<?php echo $id ?>">
                <button>Cadastrar jogador</button>
            </a>
        </div>
        <div class="main-content">
            <table>
                <tr>
                    <th>Jogador</th>
                    <th>Data de Nascimento</th>
                    <th>Nacionalidade</th>
                    <th>Posição</th>
                    <th>Camiseta</th>
                    <th>Altura</th>
                    <th>Valor Contrato</th>
                    <?php 
                        if (isset($_SESSION['isAdmin'])) {
                            echo "<th></th>";
                            echo "<th></th>";
                        }
                    ?>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <a>
                                <?php echo $row["Nome"] ?>
                            </a>
                        </td>
                        <td><?php echo $row["Data_nascimento"] ?></td>
                        <td><?php echo $row["Nacionalidade"] ?></td>
                        <td><?php echo $row["Posicao"] ?></td>
                        <td><?php echo $row["Numero"] ?></td>
                        <td><?php echo $row["Altura"]. ' m' ?></td>
                        <td><?php echo $row["Valor"] ?></td>
                        <?php 
                        if (isset($_SESSION['isAdmin'])) {
                        ?>
                        <td>
                            <a href="players_edit.php?id=<?php echo $row['ID_jogador'] ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="players_del_php.php?id=<?php echo $row['ID_jogador'] ?>">
                                Remover
                            </a>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                    }
                } else {
                ?>
            </table>
                <?php  
                    echo "<h3 style='text-align: center; margin-top: 1.5vh;'>Não há jogadores registrados ainda...</h3>";
                }
                ?>
        </div>
    </section>
</body>
</html>