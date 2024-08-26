<?php

const API_URL = 'https://www.whenisthenextmcufilm.com/api';

#iniciamos una nueva sesión de cURL; ch = curl handle 
$ch = curl_init(API_URL);

//indicar que queremos recibir el resultado de la peticion y no mostrarlo en el navegador
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la peticion y guardar el resultado */
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

//variables
$name = "Janpier";
$salida = "Hola mi nombre es: $name";

//constantes
define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-logo-png-transparent.png');

const NOMBRE = 'Juan Choko';

$age = 1;
$isOld = $age > 40;

//ternarias
$outputName = $isOld
    ? 'Eres viejo'
    : 'Eres joven';

$outputName = match (TRUE) {
    $age < 2  => "Eres un bebe $name",
    $age < 10 => "Eres un niño $name",
    default   => "eres viejo",
};

$bestLanguage = ["PHP", "Javascript", "Python"];

$test = [
    "a" => 1,
    "b" => 2,
    "c" => 3
]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
    <title>Document</title>
    <style>
        section {
            display: flex;
            justify-content: center
        }
    </style>
</head>

<body>
    <main>

        <section>
            <img src="<?= $data['poster_url']; ?>" alt="" width="200" style="border-radius: 10px">
        </section>

        <hgroup>
            <h2>
                <?= $data['title']; ?>
            </h2>
            <p>
                fecha de estreno <?= $data['release_date']; ?> se estrena en <?= $data['days_until']; ?> dias.
            </p>
            <p>
                la siguiente es <?= $data['following_production']['title']; ?>
            </p>
        </hgroup>

        <br>

        <ul>
            <?php foreach ($bestLanguage as $key) : ?>
                <li>
                    <?= $key ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <h1>
            <?= NOMBRE ?>
        </h1>

        <h1>
            <?= $outputName ?>
        </h1>
    </main>
</body>

</html>