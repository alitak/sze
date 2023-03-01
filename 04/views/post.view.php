<?php
require 'partials/head.view.php';
require 'partials/navigation.view.php';
require 'partials/header.view.php';

?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p>Post oldal.</p>

            <?php foreach ($posts as $post) {
                echo '<li>'.$post['title'].'</li>';

            } ?>
        </div>
    </main>

<?php
require 'partials/foot.view.php';
