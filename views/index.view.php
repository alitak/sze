<ul>
    <?php
    foreach ($albums as $album) {
        echo '<li><a href="/show.php">'
            . $album['title'] . ' (' . $album['artist'] . '): ' . $album['year']
            . '</a></li>' . PHP_EOL;
    }
    ?>
</ul>
