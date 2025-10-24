<?php view('partials/header.php'); ?>
<?php view('partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<!-- Inside the <body> tag -->

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        
        <h1 class="text-xl text-gray-900 font-sans">404 - Page not found</h1>
        <p class="mt-6 text-sm text-gray-900 font-sans underline cursor-pointer">
            <a href="/">Go home</a>
        </p>

    </div>
</main>

<!-- Outside the <body> tag -->

<?php view('partials/footer.php'); ?>