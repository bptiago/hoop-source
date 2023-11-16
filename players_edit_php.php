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
        $dataNascimento = $_POST['birth'];
        $nacionalidade = $_POST['nacionalidade'];
        $altura = $_POST['altura'];
        $posicao = $_POST['posicao'];
        $valor = $_POST['valorContrato'];
        $camiseta = $_POST['camiseta'];
        $sql = "UPDATE Jogador SET Nome = '$nome', Data_nascimento = '$dataNascimento', Nacionalidade = '$nacionalidade', Altura = '$altura', Posicao = '$posicao', Valor = '$valor', Numero = '$camiseta' WHERE ID_jogador = '$id'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
?>
<script>
    alert('Jogador editado');
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