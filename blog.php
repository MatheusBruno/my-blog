<?php

$user = "root";
$local = "localhost";
$senha = "";
$db = "blog";
$con = new mysqli($local,$user,$senha,$db);

$sql = "SELECT id,titulo,texto,caminhoimg FROM anuncios";

$dados = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>
<body>
    <div class="exemplo">
        
        <?php
        if($dados->num_rows > 0){
            while($row = $dados->fetch_assoc()){
                
                echo "<div class='subdiv'>";
                echo "<div class='subdivdiv'>";
                echo "<h1>".$row['titulo']."</h1>";
                echo "<p>".$row['texto']."</p>";
                echo "</div>";
                echo "<div class='subdivdiv'>";
                echo "<img src='http://localhost/php/web/".$row['caminhoimg']."' width='50px' height='50px'/>";
                echo "</div>";
                echo "</div>";
                
            }
        }
        ?>
        
    </div>
    
</body>
</html>



