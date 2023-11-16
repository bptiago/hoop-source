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
        $id = $_GET["id"];
        $sql = "DELETE FROM Jogador WHERE ID_jogador = $id";
        $result = $conn->query($sql);
        if ($result === TRUE) {
?>
<script>
    alert('Jogador removido');
    history.go(-1);
</script>
<?php
        }
        else {
?>
<script>
    alert('Algo não deu certo...');
    history.go(-1);
</script>
<?php
        }
    }
?>