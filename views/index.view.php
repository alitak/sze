<ul>
    <?php
    foreach ($albums as $album) {
        echo '<li>' . $album['title'] . ' (' . $album['artist'] . '): ' . $album['year'] . '</li>' . PHP_EOL;
    }
    ?>
</ul>
