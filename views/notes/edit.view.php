<?php view('partials/header.php'); ?>
<?php view('partials/nav.php'); ?>

<!-- Inside the <body> tag -->

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes">

            <!-- Hidden Form Method -->
            <input type="hidden" name="_method" value="PATCH">

            <!-- Hidden Note ID -->
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <div class="space-y-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 border-b border-gray-900/10 pb-8">

                    <!-- Note Title Input -->

                    <div class="sm:col-span-4 space-y-2">
                        <label for="title" class="block text-md font-medium text-gray-900">Title</label>
                        <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-600">
                            <input id="title" type="text" name="title" value="<?= $note['title'] ?>" required class="block min-w-0 grow bg-white py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                        </div>

                        <!-- Note Title Errors -->

                        <?php if (isset($errors['title'])) : ?>
                            <p class="text-sm text-red-500 -bottom-2"><?= $errors['title'] ?></p>
                        <?php endif ?>
                    </div>

                    <!-- Note Content Input -->

                    <div class="col-span-full space-y-2">
                        <label for="content" class="block text-md font-medium text-gray-900">Content</label>
                        <textarea id="content" name="content" rows="3" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6"><?= $note['content'] ?></textarea>

                        <!-- Note Content Errors -->

                        <?php if (isset($errors['content'])) : ?>
                            <p class="text-sm text-red-500 -bottom-2"><?= $errors['content'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <!-- Cancel, submit -->

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white shadow-xs cursor-pointer hover:bg-gray-600">Update</button>
            </div>
        </form>
    </div>
</main>

<!-- Outside the <body> tag -->

<?php view('partials/footer.php'); ?>