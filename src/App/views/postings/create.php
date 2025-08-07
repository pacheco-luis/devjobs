<?php include $this->resolve("partials/_header.php"); ?>

<h1 class="sr-only">Create A Job Posting</h1>

<?php include $this->resolve("partials/_breadcrumbs.php"); ?>

<!-- CREATE A JOB SECTION -->
<section
    aria-labelledby="create-job-heading"
    class="py-8">
    <h3
        id="create-job-heading"
        class="sr-only">
        Create Job
    </h3>

    <form
        action="/postings"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white py-2 rounded-md">
        <?php include $this->resolve("partials/_csrf.php"); ?>

        <!-- Input:Logo -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#logo"
                class="inline-block text-base font-bold py-2">Upload Logo</label>
            <input
                id="formInput#logo"
                type="file"
                name="logo"
                class="w-full text-base text-very-dark-blue border-2 border-very-dark-blue/10 rounded-md file:text-white file:bg-violet file:py-3 file:px-4 file:me-4" />
            <?php if (array_key_exists('logo', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['logo'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Company -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#company"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Company</label>
            <input
                type="text"
                name="company"
                id="formInput#company"
                placeholder="Enter company name..."
                class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
                value="<?php echo escape($oldFormData['company'] ?? ''); ?>" />
            <?php if (array_key_exists('company', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['company'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Position -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#position"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Position</label>
            <input
                type="text"
                name="position"
                id="formInput#position"
                placeholder="Enter job position..."
                class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
                value="<?php echo escape($oldFormData['position'] ?? ''); ?>" />
            <?php if (array_key_exists('position', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['position'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Contract -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <p class="text-base font-bold">Contract</p>
            <div class="space-y-3">
                <div class="flex items-center gap-x-4">
                    <input
                        id="formInput#contract-01"
                        type="radio"
                        value="Full Time"
                        name="contract"
                        class="grid place-content-center appearance-none size-6 bg-very-dark-blue/10 rounded-full border-2 border-very-dark-blue cursor-pointer before:size-3 before:bg-violet before:rounded-full before:scale-0 checked:before:scale-100 before:transition-transform before:duration-500 before:ease-[cubic-bezier(0.45, 1.8, 0.5, 0.75)]"
                        <?php echo ($oldFormData['contract'] ?? '') === 'Full Time' ? 'checked' : ''; ?> />
                    <label
                        for="formInput#contract-01"
                        class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Full Time</label>
                </div>
                <div class="flex items-center gap-x-4">
                    <input
                        id="formInput#contract-02"
                        type="radio"
                        value="Part Time"
                        name="contract"
                        class="appearance-none size-6 bg-very-dark-blue/10 grid place-content-center cursor-pointer before:transition-transform before:duration-500 before:ease-[cubic-bezier(0.45, 1.8, 0.5, 0.75)] border-2 border-very-dark-blue rounded-full before:size-3 before:bg-violet before:rounded-full before:scale-0 checked:before:scale-100"
                        <?php echo ($oldFormData['contract'] ?? '') === 'Part Time' ? 'checked' : ''; ?> />
                    <label
                        for="formInput#contract-02"
                        class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Part Time</label>
                </div>
                <div class="flex items-center gap-x-4">
                    <input
                        id="formInput#contract-03"
                        type="radio"
                        value="Internship"
                        name="contract"
                        class="appearance-none size-6 bg-very-dark-blue/10 grid place-content-center cursor-pointer before:transition-transform before:duration-500 before:ease-[cubic-bezier(0.45, 1.8, 0.5, 0.75)] border-2 border-very-dark-blue rounded-full before:size-3 before:bg-violet before:rounded-full before:scale-0 checked:before:scale-100"
                        <?php echo ($oldFormData['contract'] ?? '') === 'Internship' ? 'checked' : ''; ?> />
                    <label
                        for="formInput#contract-03"
                        class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Internship</label>
                </div>
            </div>
            <?php if (array_key_exists('contract', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['contract'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Location -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#location"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Location</label>
            <input
                type="text"
                name="location"
                id="formInput#location"
                placeholder="Enter job location..."
                class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
                value="<?php echo escape($oldFormData['location'] ?? ''); ?>" />
            <?php if (array_key_exists('location', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['location'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Input:Website -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#website"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Website</label>
            <input
                type="text"
                name="website"
                id="formInput#website"
                placeholder="Enter job website..."
                class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
                value="<?php echo escape($oldFormData['website'] ?? ''); ?>" />
            <?php if (array_key_exists('website', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['website'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Textarea:Description -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#description"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Description</label>
            <textarea
                name="description"
                id="formInput#description"
                placeholder="Enter job description..."
                class="w-full min-h-36 px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm resize-none active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"><?php echo escape($oldFormData['description'] ?? ''); ?></textarea>
            <?php if (array_key_exists('description', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['description'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Textarea:Requirements -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#requirements"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Requirements</label>
            <textarea
                name="requirements"
                id="formInput#requirements"
                placeholder="Enter job requirements..."
                class="w-full min-h-36 px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm resize-none active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"><?php echo escape($oldFormData['requirements'] ?? ''); ?></textarea>
            <?php if (array_key_exists('requirements', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['requirements'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Textarea:Role -->
        <div class="min-h-20 px-6 py-4 space-y-2">
            <label
                for="formInput#role"
                class="inline-block text-base font-bold text-very-dark-blue cursor-pointer">Role</label>
            <textarea
                name="role"
                id="formInput#role"
                placeholder="Enter job role..."
                class="w-full min-h-36 px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm resize-none active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"><?php echo escape($oldFormData['role'] ?? ''); ?></textarea>
            <?php if (array_key_exists('role', $errors)) : ?>
                <div class="bg-light-red px-3 py-1 rounded-sm">
                    <p class="text-base text-red">
                        <?php echo escape($errors['role'][0]); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Button:Create Jobs -->
        <div class="min-h-20 px-6 py-4">
            <button
                type="submit"
                class="inline-block w-full px-9 py-3.5 text-base font-bold text-white bg-violet hover:bg-light-violet rounded-md cursor-pointer transition-colors duration-200 ease-in-out">
                Create Job
            </button>
        </div>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>
