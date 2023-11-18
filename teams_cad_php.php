<?php
    session_start();
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
    else {
        $nome = $_POST['nome'];
        $tecnico = $_POST['tecnico'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $arena = $_POST['arena'];

        $sql = "INSERT INTO Time (Nome_time, Tecnico, Cidade, Estado, Arena) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssss", $nome, $tecnico, $cidade, $estado, $arena);
            $stmt->execute();
            $stmt->close();
            ?>
            <script>
                alert('Time adicionado');
                location.href = "teams.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Algo deu errado...");
                history.go(-1);
            </script>
<?php
        }
    }
?>