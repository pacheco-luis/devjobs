<?php include $this->resolve("partials/_header.php"); ?>

<h1 class="sr-only">Job Postings</h1>

<?php include $this->resolve("partials/_breadcrumbs.php"); ?>

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

    <!-- Link:Create Post -->
    <div class="text-right mb-14 sm:mb-6">
        <a
                href="/postings/create"
                class="inline-block px-9 py-3.5 text-base font-bold text-white bg-violet hover:bg-light-violet rounded-md cursor-pointer transition-colors duration-200 ease-in-out"
        >
            Create Post
        </a>
    </div>

    <!-- Job Listing -->
    <div class="space-y-14 sm:space-y-6">
        <?php if (count($postings) === 0) : ?>
            <div class="py-8 space-y-2 text-center">
                <h3 class="text-xl font-bold text-very-dark-blue">No job postings yet</h3>
                <p class="text-base text-dark-grey">Be the first to create a job posting!</p>

                <a
                        href="/postings/create"
                        class="inline-block px-6 py-3 text-base font-bold text-white bg-violet hover:bg-light-violet rounded-md cursor-pointer transition-colors duration-200 ease-in-out"
                >Create a Job Posting</a>
            </div>
        <?php else : ?>
            <?php foreach ($postings as $posting) : ?>
                <!-- Job Card  -->
                <article class="pb-8 px-6 bg-white rounded-md sm:flex sm:gap-x-6 sm:pt-8">
                    <div class="size-14 rounded-xl overflow-hidden -translate-y-1/2 sm:size-32 sm:translate-0">
                        <img
                                src="/uploads/<?php echo escape($posting['logo_upload_id']); ?>/download"
                                alt="<?php echo escape($posting['company']); ?> Company Logo"
                                class="w-full h-full object-cover"
                        />
                    </div>

                    <div class="space-y-2">
                        <p class="text-base text-dark-grey truncate">
                            <?php echo escape($posting['formatted_date']); ?>
                            <span class="text-xl mx-2">&bull;</span>
                            <?php echo escape($posting['contract']); ?>
                        </p>
                        <h3 class="text-xl font-bold text-very-dark-blue hover:text-violet truncate">
                            <a href="/postings/<?php echo escape($posting['id']); ?>">
                                <?php echo escape($posting['position']); ?>
                            </a>
                        </h3>
                        <p class="text-base text-dark-grey truncate">
                            <?php echo escape($posting['company']); ?>
                        </p>
                        <h4 class="text-sm font-bold text-violet truncate">
                            <?php echo escape($posting['location']); ?>
                        </h4>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Pagination -->
<?php if (count($pageLinks) > 1) : ?>
    <nav
            aria-label="Pagination"
            class="py-6"
    >
        <ul class="flex items-center justify-center gap-x-2">
            <li>
                <a
                        href="/postings/?<?php echo escape($previousPageQuery); ?>"
                        rel="prev"
                        class="<?php echo $currentPage > 1 ? 'bg-violet/10 hover:bg-violet/35 cursor-pointer transition-colors duration-200 ease-in-out' : 'bg-violet/50 pointer-events-none cursor-not-allowed'; ?> inline-block px-5 py-2.5 text-base font-bold text-violet rounded-md"
                >&larr; Prev</a>
            </li>
            <?php foreach ($pageLinks as $pageNum => $query) : ?>
                <li>
                    <a
                            href="/postings/?<?php echo escape($query); ?>"
                            class="<?php echo $pageNum + 1 === $currentPage ? 'text-white bg-violet hover:bg-light-violet' : 'text-violet bg-violet/10 hover:bg-violet/35'; ?> px-5 py-2.5 text-base font-bold rounded-md cursor-pointer transition-colors duration-200 ease-in-out"
                    ><?php echo escape($pageNum + 1); ?></a>
                </li>
            <?php endforeach; ?>
            <li>
                <a
                        href="/postings/?<?php echo escape($nextPageQuery); ?>"
                        rel="next"
                        class="<?php echo $currentPage < $lastPage ? 'bg-violet/10 hover:bg-violet/35 cursor-pointer transition-colors duration-200 ease-in-out' : 'bg-violet/50 pointer-events-none cursor-not-allowed'; ?> inline-block px-5 py-2.5 text-base font-bold text-violet rounded-md"
                >Next &rarr;</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<?php include $this->resolve("partials/_footer.php"); ?>
