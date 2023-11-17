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
        $id = $_POST['hideId'];
        $nome = $_POST['nome'];
        $tecnico = $_POST['tecnico'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $arena = $_POST['arena'];

        $sql = "UPDATE Time SET Nome_time = '$nome', Tecnico = '$tecnico', Cidade = '$cidade', Estado = '$estado', Arena = '$arena' WHERE Id_time = '$id'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
?>
<script>
    alert('Time editado');
    location.href = "teams.php";
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