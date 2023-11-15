<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/general.css">
    <link rel="stylesheet" href="./assets/css/form.css">

    <title>Formulário</title>
</head>
<body>
    <?php include "./assets/components/header.php";?>
    <div>
        <div class="reg-form-div">
            <div class="reg-logo">
                <img src="./assets/images/cat.png" alt="" srcset="" style="width:100%">
            </div>
            <form method="post" name="cadastro" class="reg-form" onsubmit="return validateForm(this)" action="./users_cad_php.php">
                <h1>Register</h1>
                <div class="form">
                    <div>
                        <input type="text" name="name" id="name" class="input" placeholder="Name">
                    </div>
                    <div>
                        <input type="text" name="email" id="email" class="input" placeholder="Email">
                    </div>
                    <div>
                        <input type="date" name="birth" id="birth" class="input" placeholder="Birthdate" min="1930-01-01" value="2003-01-01">
                    </div>
                    <div>
                        <input type="password" name="password" id="password" class="input" placeholder="Password">
                    </div>
                    <div>
                        <input type="password" name="confirmPassword" id="confirmPassword" class="input" placeholder="Confirm password">
                    </div>
                    <div>
                        <input type="submit" value="Enviar" name="send" class="sub-btn">
                    </div>
                </div>
            </form>
        </div>
        <div id="alerts" style="display: flex; flex-direction:column; align-items:center">
        </div>
    </div>
    <script src="./functions.js"></script>
</body>
</html>