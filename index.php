<?php

// Connecting to and selecting a MySQL database named sakila
// Hostname: 127.0.0.1, username: your_user, password: your_pass, db: sakila
$mysqli = new mysqli('localhost', 'pelis', '123456', 'pelis');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Fallo en el establecimiento de la conexión");
    exit();
}


//Para mostrar los acentos
mysqli_set_charset ( $mysqli , 'utf8' );

#Seleccionamos la base de datos a utilizar
$mysqli->select_db("pelis")
or die("Error en la selección de la base de datos");

#Efectuamos la consulta SQL
//$result = $mysqli->query("select * from listado WHERE post_mime_type like 'image%' ORDER BY post_parent DESC LIMIT 0, 4")
$resultimg = $mysqli->query("select * from listado ORDER BY id_pelicula")
or die("Error en la consulta SQL");


mysqli_close($conexion);
?>
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
    <!--<table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Título</th>
            <th scope="col">Año</th>
            <th scope="col">Género</th>
            <th scope="col">Formato</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><a href="#"><img src="https://pics.filmaffinity.com/blade_runner-351607743-mmed.jpg" alt=""></a></th>
                <td><a href="#">Blade Runner</a></td>
                <td><a href="#">1982</a></td>
                <td><a href="#" class="small">Ciencia ficción</a> <a href="#" class="small">Acción</a> <a href="#" class="small"><Neo-noir</a> <a href="#" class="small">Thriller futurista</a> <a href="#" class="small">Cyberpunk</a> <a href="#" class="small">Distopía</a> <a href="#" class="small">Robots</a> <a href="#" class="small">Película de culto</a></td>
                <td><a href="#" title="pulsa aquí para ver todas las peliculas en Bluray"><img src="img/formato_Bluray.svg" alt="Blurary" width="50px"></a></td>
            </tr>
            <tr>
                <th scope="row"><a href="#"><img src="https://pics.filmaffinity.com/blade_runner_2049-681477614-mmed.jpg" alt=""></a></th>
                <td><a href="#">Blade Runner 2049</a></td>
                <td><a href="#">2017</a></td>
                <td><a href="#" class="small">Ciencia ficción</a> <a href="#" class="small">Cyberpunk</a> <a href="#" class="small">Secuela</a> <a href="#" class="small">Thriller futurista</a></td>
                <td><a href="#" title="pulsa aquí para ver todas las peliculas en Bluray"><img src="img/formato_Bluray.svg" alt="Blurary" width="50px"></a></td>
            </tr>
        </tbody>
    </table>-->
    <table class="table">
        <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col" style='display:none;'>#</th>
            <th scope="col">Foto</th>
            <th scope="col">Título</th>
            <th scope="col">Año</th>
            <th scope="col">Género</th>
            <th scope="col">Formato</th>
        </tr>
        </thead>
        <tbody>

    <?php
					#Mostramos los resultados obtenidos
					while( $row = $resultimg->fetch_array(MYSQLI_ASSOC)) {

                        echo "<tr class='text-center'>                               
                                <td style='display:none;'>".$row['id_pelicula']."</td>   
                                <th scope=\"row\"><a href='#'><img src=".$row['foto']." alt=''></a></th>
                                <td>".$row['titulo']."</td>
                                <td>".$row['anio']."</td>
                                <td>".$row['genero']."</td>
                                <td><img src=\"img/formato_".$row['formato'].".svg\" alt=\"Blurary\" width=\"50px\" /></td>								
                              </tr>";

                    }
	?>
        </tbody>
    </table>

</div>

<!--BOOTSTRAP JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>