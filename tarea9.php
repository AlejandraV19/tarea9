<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 9</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: black;
        }

        h1 {
            color: white;
            font-size:40px;
        }

        .cat-poster {
            display: inline-block;
            margin: 10px;
        }

        .cat-poster img {
            max-width: 100%;
            height: auto;
            width: 200px; 
        }
    </style>
</head>
<body>

    <h1>Gatitos</h1>

    <?php
    /**
     * Realiza una solicitud a la API de Cat para obtener información sobre pósters de gatos.
     *
     * @param string $apiUrl La URL de la API de Cat.
     * @return string|false Los datos de la API en formato JSON o false si la solicitud falla.
     */
    function getCatData($apiUrl) {
        return file_get_contents($apiUrl);
    }

    /**
     * Decodifica los datos JSON de la API de Cat.
     *
     * @param string $catData Los datos de la API en formato JSON.
     * @return array|false Los datos decodificados o false si hay un error en la decodificación.
     */
    function decodeCatData($catData) {
        return json_decode($catData, true);
    }

    /**
     * Muestra los pósters de gatos en la página.
     *
     * @param array $catPostersInfo Los datos decodificados de la API.
     * @return void
     */
    function displayCatPosters($catPostersInfo) {
        if (!empty($catPostersInfo)) {
            foreach ($catPostersInfo as $poster) {
                echo "<div class='cat-poster'>";
                echo "<img src='{$poster['url']}' alt='Póster de gato' width='200' height='200'>";
                echo "</div>";
            }
        } else {
            echo "<p>No se pudieron obtener los pósters de gatos en este momento.</p>";
        }
    }

    // URL de la API de gatos
    $apiUrl = 'https://api.thecatapi.com/v1/images/search?limit=10';

    // Obtener y mostrar los pósters de gatos
    $catData = getCatData($apiUrl);
    $catPostersInfo = decodeCatData($catData);
    displayCatPosters($catPostersInfo);
    ?>

</body>
</html>






