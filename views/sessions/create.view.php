<?php view('partials/header.php'); ?>
<?php view('partials/nav.php'); ?>

<!-- Inside the <body> tag -->

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

            <!-- Title and Logo -->

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img src="images/dark-notebook-square.svg" alt="Open Notebook Logo" class="mx-auto w-auto h-10" />
                <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-gray-800">Log In</h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">

                <!-- Sign In Form -->

                <form action="/login" method="POST" class="space-y-4">

                    <!-- Email -->

                    <div>
                        <label for="email" class="absolute -left-[1000px] top-auto w-[1px] h-[1px] overflow-hidden">Email address</label>
                        <input id="email" type="email" name="email" placeholder="Email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6" />
                        
                        <!-- Email Errors -->
                        
                        <?php if (isset($errors['email'])) : ?>
                            <p class="text-sm text-red-500 pt-2"><?= $errors['email'] ?></p>
                        <?php endif ?>
                    </div>

                    <!-- Password -->

                    <div>
                        <label for="password" class="absolute -left-[1000px] top-auto w-[1px] h-[1px] overflow-hidden">Password</label>
                        <input id="password" type="password" name="password" placeholder="Password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6" />
                        
                        <!-- Password Errors -->

                        <?php if (isset($errors['password'])) : ?>
                            <p class="text-sm text-red-500 pt-2"><?= $errors['password'] ?></p>
                        <?php endif ?>
                    </div>

                    <!-- Submit -->

                    <div>
                        <button type="submit" class="w-full rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white shadow-xs cursor-pointer hover:bg-gray-600">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Outside the <body> tag -->

<?php view('partials/footer.php'); ?>