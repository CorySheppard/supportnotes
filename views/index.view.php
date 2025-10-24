<?php view('partials/header.php'); ?>
<?php view('partials/nav.php'); ?>

<!-- Inside the <body> tag -->

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <h1 class="text-2xl text-gray-900 font-sans font-semibold">Welcome to Support Notes!</h1>
            <p class="mt-6 text-gray-900 font-sans">
                This is a simple website that is designed to replace my Notepad++ notes for work. It's certainly a work in progress, and I intend on adding more features, but it does the trick for now. The reason I started creating this was to teach myself PHP, but I clearly need to work on my HTML and CSS some more too.
            </p>
        </div>
    </div>
</main>

<!-- Outside the <body> tag -->

<?php view('partials/footer.php'); ?>