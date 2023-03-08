<?php
require 'partials/head.view.php';
require 'partials/navigation.view.php';
require 'partials/header.view.php';

?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mr-4">Team oldal.</p>

            <?php foreach ($teams as $team) {
                echo '<li>'.$team['title'].'</li>';
            } ?>

        </div>
    </main>

<?php
require 'partials/foot.view.php';
