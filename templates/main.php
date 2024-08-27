<main>
    <section>
        <img src="<?= $poster_url; ?>" alt="" width="200" style="border-radius: 10px">
    </section>

    <hgroup>
        <h2>
            <?= $title; ?>
        </h2>
        <p>
            Fecha de estreno <?= $release_date; ?> - <?= $untilMessage; ?>.
        </p>
        <p>
            La siguiente es: <?= $following_production; ?>
        </p>
    </hgroup>

    <br>
</main>