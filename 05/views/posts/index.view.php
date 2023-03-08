<?php
require 'views/partials/head.view.php';
require 'views/partials/navigation.view.php';
require 'views/partials/header.view.php';

?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <a class="block w-48 text-center border border-1 border-gray-500 bg-gray-500 rounded text-white p-2 mb-4" href="/posts/create">Bejegyzés létrehozása</a>
            
            <ul>
                <?php foreach ($posts as $post) { ?>
                    <li>
                        <a class="text-blue-500" href="/posts/show/<?php echo $post['id']; ?>">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </main>

<?php
require 'views/partials/foot.view.php';
