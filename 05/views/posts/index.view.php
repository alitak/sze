<?php
require 'views/partials/head.view.php';
require 'views/partials/navigation.view.php';
require 'views/partials/header.view.php';

?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-4">Post oldal.</p>

            <?php foreach ($posts as $post) { ?>
                <li>
                    <a class="text-blue-500" href="/posts/show/<?php echo $post['id']; ?>">
                        <?php echo $post['title']; ?>
                    </a>
                </li>
            <?php } ?>
        </div>
    </main>

<?php
require 'views/partials/foot.view.php';
