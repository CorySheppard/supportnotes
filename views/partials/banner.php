<header class="relative bg-white shadow-sm">
    <div class="flex justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $pageTitle ?></h1>
        <?php if ($_SESSION['user'] ?? false) : ?>
            <?php if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === '/notes') : ?>
                <a href="/notes/create">
                    <button class="bg-gray-800 hover:bg-gray-600 cursor-pointer rounded-lg text-white text-sm font-semibold shadow-xs px-3 py-2">+ Add Note</button>
                </a>
            <?php endif ?>
        <?php endif ?>
    </div>
</header>