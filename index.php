<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark light">
    <title>conectando una api</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css">
    <style>
        :root {
            color-scheme: light dark;
        }
        body {
            display: grid;
            place-content: center;
        }
    </style>
</head>
<body>
    <?php
    // Ingresar a la API por la URL
    $url = 'https://instituto.zeabur.app/instituto.php';

    // Realizar la solicitud GET
    $response = file_get_contents($url);

    // Decodificar la respuesta JSON
    $datos = json_decode($response, true);

    //print_r($datos);
    ?>

    <main>
    <h2>Instituto</h2>

    <section>
        nombre:<?php print_r($datos['nombre'])?>
      
    </section>


<!-- se les podría pedir que de ese arreglo que viene  muestren las ofertas del instituto
 por separado cada uno con, su imagen, y datos asociados-->
 <?php foreach ($datos['ofertas'] as $oferta): ?>
        <section>
            <h2><?php echo $oferta['nombre']; ?></h2>
            <?php if (isset($oferta['descripcion'])): ?>
                <p><strong>Descripción:</strong> <?php echo $oferta['descripcion']; ?></p>
            <?php endif; ?>
            <?php if (isset($oferta['duracion'])): ?>
                <p><strong>Duración:</strong> <?php echo $oferta['duracion']; ?> años</p>
            <?php endif; ?>
            <?php if (isset($oferta['campo_laboral'])): ?>
                <p><strong>Campo Laboral:</strong> <?php echo $oferta['campo_laboral']; ?></p>
            <?php endif; ?>
            <?php if (isset($oferta['imagen'])): ?>
                <p style="width:20%" ><img src="<?php echo $oferta['imagen']; ?>" alt="<?php echo $oferta['nombre']; ?>"></p>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>

 </section> 
        

        
    <!-- Esta parte hace uan busuqeda de las ofertas del instituto que se relacionen con un campo laboral
    especifico, es mas dificil -->
        <!-- <section>
            <article style="width:90%">
            <?php  
                function buscarOfertasPorCampoLaboral($campoLaboral, $datos) {
                    $ofertasRelacionadas = [];
                    foreach ($datos['ofertas'] as $oferta) {
                        if (isset($oferta['campo_laboral']) && strpos($oferta['campo_laboral'], $campoLaboral) !== false) {
                            $ofertasRelacionadas[] = $oferta;
                        }
                    }
                    return $ofertasRelacionadas;
                }
                // Ejemplo de uso de la función
                $campoLaboralBuscado = "Empresas";
                $ofertasEnCampoLaboral = buscarOfertasPorCampoLaboral($campoLaboralBuscado, $datos);
                // Imprimir resultados
                if (empty($ofertasEnCampoLaboral)) {
                    echo "No se encontraron ofertas de estudios relacionadas con el campo laboral '{$campoLaboralBuscado}'.";
                } else {
                    echo "Ofertas de estudios relacionadas con el campo laboral '{$campoLaboralBuscado}':\n";
                    foreach ($ofertasEnCampoLaboral as $oferta) {
                        echo "- {$oferta['nombre']}: {$oferta['descripcion']}\n";
                    }
                }?>

    </article>  -->
    </main>
</body>
</html>