<?php
    session_start();
    include("connection.php");
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    } else {
        $id = $_POST['hideId'];
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['birth'];
        $email = $_POST['email'];

        $sql = "UPDATE Usuario SET Nome_completo = '$nome', Data_nascimento = '$dataNascimento', Email = '$email' WHERE ID_usuario = '$id'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
?>
<script>
    alert('Usuário editado');
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