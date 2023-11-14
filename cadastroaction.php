<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
    include("bd_c.php");
    try {
        $stmt = $dbh->prepare("insert into drogas (nome,traficante,img) values (?,?,?);");
        $stmt->bindParam( 1, $_POST["nome"] );
        $stmt->bindParam( 2, $_POST["traficante"] );
        $stmt->bindParam( 3, $_POST["img"] );
        if($stmt->execute()) {
            echo "Dado cadastrado com sucesso!";
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
?>

<br><br>
<button type="button" class="btn btn-dark"><a href="index.php">Voltar</a></button>
</body>
</html>