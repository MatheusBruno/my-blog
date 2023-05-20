<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Blog</title>
</head>
<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <input type="text" name="titulo" id="">
        <textarea name="texto" id="" cols="30" rows="10"></textarea>
        <input name="imagem" type="file" id="">
        <input type="submit" value="Salvar">
    </form>
</body>
</html>

<?php

if(isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    if($extensao != 'jpg' && $extensao != 'png'){
        die("Arquivo não suportado");
    }
    //$_FILES["imagem"]["tmp_name"]; //nome temporario
    $pasta = "arquivos/";
    // $_FILES["imagem"]["size"]; //tamanho do arquivo
    // $_FILES["imagem"]["name"]; //nome do arquivo
    $exe = md5($_FILES["imagem"]["name"]);
    $deucerto = move_uploaded_file($_FILES["imagem"]["tmp_name"], $pasta . $exe . '.png');
    $caminho = $pasta . $exe . '.png';
    
    $user = "root";
    $local = "localhost";
    $senha = "";
    $db = "blog";
    $con = new mysqli($local,$user,$senha,$db);

    $texto23 = "INSERT INTO anuncios (titulo,texto,caminhoimg) VALUES ('$titulo','$texto','$caminho')";
    if($con->query($texto23)){
        echo "<script>alert('Salvo')</script>";
    }else{
        echo "Erro" . $con->error;
    }
    echo "<h1>".$titulo."</h1>";
    echo "<p>".$texto."</p>";
    echo "<img src='arquivos/".$exe.".png' width='650px' height='650px'>";
}