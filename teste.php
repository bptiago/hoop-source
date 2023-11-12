<?php
    // ta funcionando
    include "connection.php";

    $sql = "SELECT * FROM OLOCO";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['id'];
            echo $row['nome'];
        }
    }

?>