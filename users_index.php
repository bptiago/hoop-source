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
    <?php session_start() ?>
    <?php include "./assets/components/header.php";?>
    <?php
        include("./connection.php");
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
                </tr>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <a href="team.php?id=<?php echo $row['Id_time'] ?>">
                                        <?php echo $row["Nome_time"] ?>
                                    </a>
                                </td>
                                <td><?php echo $row["Tecnico"] ?></td>
                                <td><?php echo $row["Estado"] ?></td>
                                <td><?php echo $row["Cidade"] ?></td>
                                <td><?php echo $row["Arena"] ?></td>
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