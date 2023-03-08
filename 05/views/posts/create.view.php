<?php
require 'views/partials/head.view.php';
require 'views/partials/navigation.view.php';
require 'views/partials/header.view.php';

?>

    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <?php
                if (isset($message)):
                ?>
                    <div class="bg-green-500 text-white p-2 mb-4 rounded">
                        <?php
                        echo $message;
                        ?>
                    </div>
                <?php
                endif;
                ?>
                <?php
                if (isset($errors)):
                ?>
                    <div class="bg-cyan-500 text-white p-2 mb-4 rounded">
                        <?php
                        echo $errors;
                        ?>
                    </div>
                <?php
                endif;
                ?>
                <form action="" method="POST">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Bejegyzés</label>
                            <div class="mt-2">
                                <textarea id="title" name="title" rows="3" class="mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6" placeholder="Bejegyzés címre"></textarea>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Mentés</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php
require 'views/partials/foot.view.php';
