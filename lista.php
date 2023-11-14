<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Boca do Ximbinha</h1>
    <div class="container">
        <div class="row px-2">
    <?php
          include("bd_c.php");
          try {
            $sth = $dbh->prepare("select drogas.*, traficador.nome as NomeTraficador from drogas join traficador on drogas.traficante = traficador.id;");
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)) {
              foreach($result as $row) {
                echo '<div class="card col-3 mx-5" style=width: 18rem;">';
                echo '<img class="card-img-top" src="'.$row["img"].'" alt="Card image cap" style=width:240px>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$row["nome"].'</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">'. $row["NomeTraficador"].'</h6>';
                echo "</div>";
                echo "</div>";
              }
            } 
            $dbh = null;
          } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
          }
        ?>

</div>
</div> 

    <br><br>
    <button type="button" class="btn btn-dark"><a href="index.php">Voltar</a></button>
    
</body>
</html>