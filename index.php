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
    <link rel="stylesheet" href="./assets/css/index.css">

    <title>HoopSource</title>
</head>
<body>
    <?php include "./assets/components/header.php";?>
    <?php
    if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
    ?>
        <script>
            alert("Você já está logado")
            location.href = "teams.php";
        </script>
    <?php
    }
    ?>
    <section class="index-main">
        <div class="main-content">
            <h1>HoopSource</h1>
            <h2>Fique por dentro do jogo!</h2>
            <h3>Acompanhe seu time favorito e seus jogadores prediletos!</h3>
            <div class="center-bottom-container">
                <div>
                    <h4>Não tem cadastro?</h4>
                    <a href="./users_cad.php"><button>Criar conta</button></a>
                </div>
                <div>
                    <h4>Quem somos?</h4>
                    <a href="#jump"><button>Ver mais</button></a>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-background">
        <h2 style="text-align: center; padding: 12px 6px; color: rgb(63, 96, 240);" id="jump">Sobre nós</h2>
        <div class="footer-layout">
            <div style="text-align:center;">
                <h3>A equipe</h3>
                <p style="margin: 6px 0px">Estudantes de BSI - PUCPR</p>
                <ul style="list-style: none;">
                    <li>Felipe Kureski</li>
                    <li>Henrique Grigoli</li>
                    <li>Tiago</li>
                </ul>
            </div>
            <div style="text-align: center;">
                <h3>O projeto</h3>
                <p style="width: 30vw;">O HoopSource é uma plataforma de visualização e administração de times e jogadores de basquete. Há dois tipos de cadastro no serviço: o usuário normal e o administrador. O perfil de acesso comum consegue visualizar os times registrados na plataforma e buscar informações de interesse pelo time ou seus jogadores. O perfil de administrador é voltado para o gerenciamento dos dados do serviço, possibilitando o cadastro, edição e remoção de informações relacionadas aos times e também aos jogadores.</p>
            </div>
        </div>
    </footer>
</body>
</html>