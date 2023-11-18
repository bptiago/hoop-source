<?php session_start() ?>
<header class="header">
        <a class="header-logo" href="index.php">
            <span style="color: rgb(63, 96, 240)">Hoop</span>Source
        </a>
        <div class="header-button-container">
            <?php
                if (!isset($_SESSION["id"])) {
            ?>
            <a href="users_login.php"> <button class="header-button">Login</button></a>
            <a href="users_cad.php"><button class="header-button">Criar conta</button></a>
            <?php
                } else {
            ?>
            <a href="session_destroy.php"><button class="header-button">Logout</button></a>
            <?php
                }
            ?>
            
        </div>
    </header>