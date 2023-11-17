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
        session_start();
        
        if (isset($_SESSION['isAdmin'])) {
            $_SESSION['isAdmin'] = true;
            $_SESSION['id'] = 00;
            $_SESSION['role'] = "admin";
        }

        include("./connection.php");

        $idUser = $_SESSION['id'];
        $sqlUser = "SELECT Nome_completo FROM Usuario WHERE ID_usuario = '$idUser'";
        $resultUser = $conn->query($sqlUser);

        if ($resultUser->num_rows > 0) {
            while ($row = $resultUser->fetch_assoc()) {
                ?>
                <h2 class="h2User">Bem-vindo, <span style="color: #FF4A01;"><?php echo $row['Nome_completo']?></span></h2>
                <h3 style="text-align: center;"><a class="aUser" href="users_edit.php?id=<?php echo $idUser ?>">Editar perfil</a></h3>
                <?php
            }
        }
        $sql = "SELECT * FROM TIME";
        $result = $conn->query($sql);
    ?>
    <section class="main" style="margin-top: 5vh;">
        <h2>Todos os times (<?php echo $result->num_rows ?>)</h2>
        <div class="main-content">
            <table>
                <tr>
                    <th>Time</th>
                    <th>Técnico</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Arena</th>
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
                                    <a href="players.php?id=<?php echo $row['Id_time'] ?>">
                                        <?php echo $row["Nome_time"] ?>
                                    </a>
                                </td>
                                <td><?php echo $row["Tecnico"] ?></td>
                                <td><?php echo $row["Estado"] ?></td>
                                <td><?php echo $row["Cidade"] ?></td>
                                <td><?php echo $row["Arena"] ?></td>
                                <?php 
                                    if (isset($_SESSION['isAdmin'])) {
                                ?>
                                        <td>
                                            <a href="teams_edit.php?id=<?php echo $row['Id_time'] ?>">
                                                Editar
                                            </a>
                                        </td>
                                        <td>
                                            <a href="teams_del_php.php?id=<?php echo $row['Id_time'] ?>">
                                                Remover
                                            </a>
                                        </td>
                                        <?php
                                    }
                                ?>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </section>
    <footer class="footer-background">
        <h2>Sobre nós</h2>
    </footer>
</body>
</html>