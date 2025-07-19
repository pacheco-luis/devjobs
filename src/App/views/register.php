<?php include $this->resolve("partials/_header.php"); ?>

<!-- REGISTER SECTION -->
<section
        aria-labelledby="register-heading"
        class="py-8"
>
    <h1
            id="register-heading"
            class="text-3xl font-bold text-very-dark-blue py-12 text-center"
    >
        Sign up for an account
    </h1>

    <form
            action="/register"
            method="POST"
            class="bg-white py-2 rounded-md"
    >
        <!-- Input:Name -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                    for="formInput#name"
                    class="inline-block text-base font-bold"
            >Name</label>
            <input
                    id="formInput#name"
                    type="text"
                    name="name"
                    placeholder="e.g. John Doe"
                    class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
                    value="<?php echo escape($oldFormData['name']) ?? ''; ?>"
            />
            <?php if (array_key_exists('name', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['name'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Email -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                    for="formInput#email"
                    class="inline-block text-base font-bold"
            >Email</label>
            <input
                    id="formInput#email"
                    type="email"
                    name="email"
                    placeholder="e.g. user@domain.com"
                    class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
                    value="<?php echo escape($oldFormData['email']) ?? ''; ?>"
            />
            <?php if (array_key_exists('email', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['email'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Password -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                    for="formInput#password"
                    class="inline-block text-base font-bold"
            >Password</label>
            <input
                    id="formInput#password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
            />
            <?php if (array_key_exists('password', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['password'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:ConfirmPassword -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                    for="formInput#confirmPassword"
                    class="inline-block text-base font-bold"
            >Confirm Password</label>
            <input
                    id="formInput#confirmPassword"
                    type="password"
                    name="confirmPassword"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
            />
            <?php if (array_key_exists('confirmPassword', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['confirmPassword'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Link:Register -->
        <div class="min-h-20 px-6 py-4">
            <p class="text-base text-very-dark-blue">
                Already have an account?
                <a
                        href=""
                        class="font-bold"
                >Sign In</a>
            </p>
        </div>

        <!-- Button:Search -->
        <div class="min-h-20 px-6 py-4">
            <button
                    type="submit"
                    class="w-full px-9 py-3.5 text-base font-bold text-white bg-violet hover:bg-light-violet rounded-md cursor-pointer transition-colors duration-200 ease-in-out"
            >
                Create Account
            </button>
        </div>
    </form>
</section>


<?php include $this->resolve("partials/_footer.php"); ?>
