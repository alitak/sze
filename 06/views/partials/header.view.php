<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            <?php
            echo $title;
            ?>
        </h1>
        <h2 class="text-2xl font-bold tracking-tight text-gray-700">
            <?php
            if (isset($_SESSION['email'])) {
                echo $_SESSION['email'];
            } else {
                echo 'guest';
            }
            ?>
        </h2>
    </div>
</header>
