<?php

declare(strict_types=1);

require_once('consts.php');
require_once('functions.php');
require_once('classes/NextMovie.php');

$next_movie = NextMovie::fetchAndCreateMovie(API_URL);

$next_movie_data = $next_movie->getData();

$untilMessage = $next_movie->get_until_message();

?>

<!DOCTYPE html>
<html lang="en">

<?php render_template('head', $next_movie_data); ?>

<body>
    <?php render_template(
        'main',
        array_merge(
            $next_movie_data,
            array('untilMessage' => $untilMessage)
        )
    ); ?>
</body>

</html>