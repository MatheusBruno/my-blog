<?php

// Forma de criar table
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mydb";

// $conn = new mysqli($servername,$username,$password, $dbname);


// $sql = "CREATE TABLE Contatos (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     nome VARCHAR(30) NOT NULL,
//     sobrenome VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     exemplo VARCHAR(200),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";

// if ($conn->query($sql) === TRUE){
//     echo "Tabela Contato criado";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

if(isset($_POST)){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $exemplo = $_POST['exemplo'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($servername,$username,$password, $dbname);

    $sql = "INSERT INTO contatos (nome, sobrenome, email, exemplo)
    VALUES ('$nome', '$sobrenome', '$email', '$exemplo')";

    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully ";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo $conn->insert_id . "<br>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrando...</title>
</head>
<body>
    <script>
        // history.back();
        location.href = "http://localhost/php/index.html";
        alert("Seu Contato foi Envia, Agora entraremos em contato com voces");
    </script>
</body>
</html>