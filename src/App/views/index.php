<?php include $this->resolve("partials/_header.php"); ?>

<h1 class="sr-only">Job Listings</h1>

<?php include $this->resolve("partials/_breadcrumbs.php"); ?>

<!-- SEARCH BAR SECTION -->
<section
        aria-labelledby="search-heading"
        class="py-8"
>
    <h3
            id="search-heading"
            class="sr-only"
    >
        Search Jobs
    </h3>

    <form
            action=""
            method="GET"
            role="search"
            aria-label="Job search form"
            class="bg-white py-2 rounded-md"
    >
        <!-- Input:Keywords -->
        <div class="min-h-20 px-6 py-4">
            <label
                    for="formInput#keywords"
                    class="sr-only"
            >Filter by title, companies, expertise</label>
            <input
                    type="text"
                    name="keywords"
                    id="formInput#keywords"
                    placeholder="Filter by title, companies, expertise..."
                    class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
            />
        </div>

        <!-- Input:Location -->
        <div class="min-h-20 px-6 py-4">
            <label
                    for="formInput#location"
                    class="sr-only"
            >Filter by location</label>
            <input
                    type="text"
                    name="location"
                    id="formInput#location"
                    placeholder="Filter by location..."
                    class="w-full px-4 py-3 text-base text-very-dark-blue caret-violet border-2 border-very-dark-blue/10 rounded-sm active:outline-none active:bg-violet/10 focus:outline-none focus:bg-violet/10 placeholder:text-very-dark-blue/50"
            />
        </div>

        <!-- Input:Contract -->
        <div class="min-h-20 px-6 py-4 flex items-center gap-x-4">
            <input
                    type="checkbox"
                    name="contract"
                    id="formInput#contract"
                    value="full-time"
                    class="grid place-content-center appearance-none size-6 bg-very-dark-blue/10 rounded-xs cursor-pointer transition-colors duration-200 ease-in-out before:mask-[url(/assets/images/icon-check.svg)] before:w-[15px] before:h-3 before:bg-white before:mask-no-repeat before:mask-contain before:-rotate-45 before:scale-0 focus:outline-none not-checked:focus:bg-violet/25 not-checked:hover:bg-violet/25 checked:bg-violet checked:before:rotate-0 checked:before:scale-100 before:transition-transform before:duration-500 before:ease-[cubic-bezier(0.45, 1.8, 0.5, 0.75)]"
            />
            <label
                    for="formInput#contract"
                    class="text-base font-bold text-very-dark-blue cursor-pointer"
            >Full Time Only</label>
        </div>

        <!-- Button:Search -->
        <div class="min-h-20 px-6 py-4">
            <button
                    type="submit"
                    class="w-full px-9 py-3.5 text-base font-bold text-white bg-violet hover:bg-light-violet rounded-md cursor-pointer transition-colors duration-200 ease-in-out"
            >
                Search
            </button>
        </div>
    </form>
</section>

<!-- JOB LISTING SECTION -->
<section
        aria-labelledby="job-listing-heading"
        class="py-8"
>
    <h3
            id="job-listing-heading"
            class="sr-only"
    >
        Job Listing
    </h3>

    <!-- Job Listing -->
    <div class="space-y-6">
        <!-- Job Card  -->
        <article class="py-8 px-6 bg-white rounded-md space-y-6">
            <div class="size-14 rounded-xl overflow-hidden">
                <img
                        src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                        alt="Scoot Company Logo"
                        class="w-full h-full object-cover"
                />
            </div>

            <div class="space-y-1 overflow-hidden">
                <p class="text-base text-dark-grey">5h ago &bull; Full Time</p>
                <h3 class="text-xl font-bold text-very-dark-blue truncate">
                    <a href="">Senior Software Engineer</a>
                </h3>
                <p class="text-base text-dark-grey truncate">Scoot</p>
                <h4 class="text-sm font-bold text-violet truncate">United Kingdom</h4>
            </div>
        </article>
    </div>
</section>

<?php include $this->resolve("partials/_pagination.php"); ?>

<?php include $this->resolve("partials/_footer.php"); ?>
