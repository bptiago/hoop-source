<?php
    session_start();
    include("connection.php");
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }
    else if (!$_SESSION['isAdmin']) {
?>
<script>
    alert("Você não tem permissão de registro no sistema");
    history.go(-1);
</script>
<?php
    }
    else {
        $id = $_POST['hideId'];
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['birth'];
        $nacionalidade = $_POST['nacionalidade'];
        $posicao = $_POST['posicao'];
        $camiseta = $_POST['camiseta'];
        $altura = $_POST['altura'];
        $valor = $_POST['valorContrato'];

        $sql = "INSERT INTO Jogador (Nome, Data_nascimento, Nacionalidade, Altura, Posicao, Valor, Numero, fk_Time_Id_time) VALUES ('$nome', '$dataNascimento', '$nacionalidade', '$altura', '$posicao', '$valor', '$camiseta', '$id')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
        ?>
        <script>
            alert('Jogador cadastrado');
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