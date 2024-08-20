<!DOCTYPE html>
<html lang="es">
    <head>
    <head>
    <meta name="color-scheme" content="dark light">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css"
        />
    <style>


        fieldset {
        background-color: gainsboro;
        }
        @media (prefers-color-scheme: dark) {
        fieldset {
            background-color: darkslategray;
        }
        }
    </style>
    </head>
    <body>
    <?php
        //ingrese a la api por la url
            $url = 'https://whenisthenextmcufilm.com/api';

            // Realizar la solicitud GET
            $response = file_get_contents($url);

            // Decodificar la respuesta JSON
            $datos = json_decode($response, true);


?>

    <p>
        Lorem ipsum dolor sit amet, legere ancillae ne vis.
    </p>


<main>
<article>
    <img src="https://image.tmdb.org/t/p/w500/ajnzOECvXpa7VcVx0RSlq39XgHe.jpg" alt="">
    <h1><?php
// estilos 

?></h1>
<?php
echo ($datos['title']);
// estilos 

?>
</article>
</main>


    </body>
</html>