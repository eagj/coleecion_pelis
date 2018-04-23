<?php

include_once 'includes/conexion.php';


//LEER
//PELIS
$resultadospelis='SELECT * FROM peliculas';
//ACTORES
$resultadosactores='SELECT actores_nombre_actor from actores where actores_id_actor in (select actor_pelis_id_actor from actor_pelis where actor_pelis_id_pelicula = 2)';

//CONEXION SQL
$gsent = $conexion->prepare($resultadospelis);
$gsent->execute();
$resultado= $gsent->fetchAll();

$gsent_actores = $conexion->prepare($resultadosactores);
$gsent_actores->execute();
$actores=$gsent_actores->fetchAll();

//var_dump($resultado[1]);

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colección de pelis</title>
    <link rel="stylesheet" href="css/styles.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div id="home">
    <h1 class="bg-info m-0 text-white p-5 text-center">Listado de pelis y series</h1>
    <table class="table table-striped"><!--d-none-->
        <thead class="thead-dark">
            <tr class="text-center">
                <th width="10%" scope="col">Foto</th>
                <th width="30%" scope="col">Título</th>
                <th width="10%" scope="col">Año</th>
                <th width="40%" scope="col">Género</th>
                <th width="10%" scope="col">Formato</th>
            </tr>
        </thead>
        <tbody class="">
    <?php foreach ($resultado as $row): ?>


        <tr class='text-center'>
            <th scope="row">
                <a href='ficha.php?idpeli=<?php echo $row['id_pelicula']?>'>
                    <img class="img-fluid" src="<?php echo $row['foto']?>-msmall.jpg"  alt="<?php echo $row['titulo']?>">
                </a>
            </th>
            <td>
                <a href='ficha.php?idpeli=<?php echo $row['id_pelicula']?>'> <?php echo $row['titulo']?></a>
            </td>
            <td>
                <a href='ficha.php?idpeli=<?php echo $row['id_pelicula']?>'><?php echo $row['anio']?></a>
            </td>

            <!--JAVIIIIII ES ASIIIIIIIII?-->
            <td>
                <?php foreach ($actores as $reparto): ?>
                    <?php echo $reparto['actores_nombre_actor']?>
                <?php endforeach;?>
            </td>

            <td><a href='ficha.php?idpeli=<?php echo $row['id_pelicula']?>'><img class="img-fluid" src="img/formato_<?php echo $row['formato']?>.svg" alt="<?php echo $row['formato']?>"></a></td>
          </tr>

    <?php endforeach;?>


        </tbody>
    </table>
    <!--CARDS-->
    <div class="container">
        <div class="row my-5"><!--row-->

    <?php
        #Mostramos los resultados obtenidos
        while( $row = $ordenpornumerocards->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class=\"col-md-3 col-sm-6 my-2\"><!--columna-->
                    <div class=\"card\"><!--card-->
                        <div class=\"imgcard\">
                            <img class=\"card-img-top img-fluid\" src=".$row['foto']."-mmed.jpg alt=\"".$row['titulo']."\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title text-info\">".$row['titulo']."</h5>
                            <p class=\"card-text\"><b>año:</b> ".$row['anio']."</p>
                            <p class=\"card-text\"><b>formato:</b> ".$row['formato']."</p>
                            <a href=\"ficha.php?idpeli=".$row['id_pelicula']."\" class=\"btn btn-primary\">Ver ficha</a>
                        </div>
                    </div><!--card-->
                </div><!--columna-->";
        }
    ?>

        </div><!--row-->
    </div><!--HOME-->
</div><!--HOME-->
<?php
    include("includes/footer.php");
?>
<!--BOOTSTRAP JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>