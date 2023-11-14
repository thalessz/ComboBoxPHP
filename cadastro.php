<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Boca do Ximbinha</title>
</head>
<body>
    <h1>Inserir nova Droga</h1>
    <h2>insira uma nova droga para ser utilizada!</h2>
    <form action="cadastroaction.php" method="POST">
    <b>Nome:<b> <br> <input type="text" name="nome">
    <br>
    <b>Traficante Vendedor:</b> <br> <select name="traficante">
    <?php
        include("bd_c.php");
        try {
            $sth = $dbh->prepare('SELECT * FROM traficador');
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)) {
                foreach($result as $row) {
                    echo "<option value='".$row["id"]."'>" . $row["nome"] . "</option>";
                }
            } 
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    ?>
    </select>
    <br>
    <b>Link da imagem:<b> <br><input type="text" name="img">
    <br>
    <input type="submit" value="Ok" class="btn btn-secondary">
    </form>
</body>
</html>