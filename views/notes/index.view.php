<?php view('partials/header.php'); ?>
<?php view('partials/nav.php'); ?>

<!-- Inside the <body> tag -->

<?php require base_path('views/partials/banner.php'); ?>

<main class="pt-6 space-y-6">
    <!-- Search Notes -->
    <div class="w-full flex justify-between space-x-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- Search Input -->
        <form action="/notes" method="GET" class="flex-grow">
            <input id="search" type="text" name="search" placeholder="Search notes..." value="<?= $_GET['search'] ?? '' ?>" class="w-full bg-white border border-gray-200 rounded-md outline outline-black/5 py-1.5 px-3 text-md text-gray-600 placeholder:text-gray-400" />
        </form>

        <!-- Clear Search Button -->
        <form action="/notes" method="GET">
            <input id="search" name="search" value="" hidden>
            <button class="bg-red-600 hover:bg-red-400 cursor-pointer rounded-lg text-white text-sm font-semibold shadow-xs px-3 py-2">Clear Search</button>
        </form>
    </div>

    <!-- List of Notes -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <?php if (!empty($notes)): ?>
            <?php foreach ($notes as $note) : ?>
                <div class="relative">
                    <div class="relative bg-white flex border border-gray-200 divide-y-1 divide-gray-200 h-full flex-col overflow-hidden rounded-md outline outline-black/5">
                        <div class="flex justify-end align-center gap-x-2 border-none m-2">

                            <!-- Edit Note -->
                            <a href="/note/edit?id=<?= $note['id'] ?>">
                                <i class="text-gray-800 hover:text-gray-600 cursor-pointer text-[22px] fa-regular fa-pen-to-square"></i>
                            </a>

                            <!-- Delete Note -->

                            <form method="POST" action="/notes">
                                <!-- Hidden Form Method -->
                                <input type="hidden" name="_method" value="DELETE">

                                <!-- Submit Post ID -->
                                <input type="hidden" name="noteId" value="<?= $note['id'] ?>">

                                <!-- Delete Button -->
                                <button class="bg-red-600 hover:bg-red-400 text-white px-[7px] text-center items-center rounded-sm cursor-pointer">X</button>
                            </form>
                        </div>
                        <div class="px-8 pb-8 sm:px-10 sm:pb-10 space-y-2 h-full">

                            <!-- Note Title -->

                            <p class="text-lg font-medium tracking-tight text-gray-950 max-lg:text-center"><?= htmlspecialchars($note['title']) ?></p>

                            <!-- Note Body -->

                            <p class="max-w-lg text-md text-gray-600 max-lg:text-center"><?= htmlspecialchars($note['content']) ?></p>
                        </div>
                        <div class="flex justify-between px-8 sm:px-10 py-4">

                            <!-- Note Created By -->

                            <p class="max-w-lg text-sm/6 text-gray-600 max-lg:text-center"><?= htmlspecialchars($note['username']) ?></p>

                            <!-- Note Created At -->

                            <p class="max-w-lg text-sm/6 text-gray-600 max-lg:text-center"><?= date_format(date_create($note['created_at']), "H:i d/m/Y") ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="flex justify-center col-span-1 md:col-span-3 py-8">
                <div>
                    <h1 class="text-xl font-medium tracking-tight text-gray-600 max-lg:text-center">No notes found...</h1>
                </div>
            </div>
        <?php endif ?>
    </div>
</main>

<!-- Outside the <body> tag -->

<?php view('partials/footer.php'); ?>