<?php include $this->resolve("partials/_header.php"); ?>

<h1 class="sr-only">Single Job Posting</h1>

<?php include $this->resolve("partials/_breadcrumbs.php"); ?>

<!-- COMPANY BANNER SECTION -->
<section
        aria-labelledby="company-banner-heading"
        class="py-8"
>
    <div
            class="flex flex-col items-center bg-white py-8 px-8 rounded-md gap-y-7 sm:flex-row sm:py-0 sm:px-0 sm:gap-y-0 sm:overflow-hidden"
    >
        <div
                class="size-14 rounded-xl overflow-hidden sm:size-36 sm:rounded-none"
        >
            <img
                    src="/uploads/<?php echo escape($posting['logo_upload_id']); ?>/download"
                    alt="<?php echo escape($posting['company']); ?> Company Logo"
                    class="w-full h-full object-cover"
            />
        </div>

        <div
                class="grow flex flex-col gap-y-6 items-center sm:flex-row sm:gap-x-6 sm:gap-y-0 sm:px-10"
        >
            <div
                    class="grow space-y-3 text-center sm:text-left overflow-hidden"
            >
                <h2
                        id="company-banner-heading"
                        class="text-2xl font-bold text-very-dark-blue truncate"
                >
                    <?php echo escape($posting['company']); ?>
                </h2>
                <span class="block text-base text-dark-grey truncate">
                    <?php echo escape($posting['website']); ?>
                </span>
            </div>

            <a
                    href=""
                    class="inline-block min-w-fit text-base font-bold rounded-md transition-colors duration-200 ease-in-out cursor-pointer py-3.5 px-9 text-violet bg-violet/10 hover:bg-violet/35"
            >Company Site
            </a>
        </div>
    </div>
</section>

<!-- JOB DETAILS SECTION -->
<section
        aria-labelledby="job-details-heading"
        class="py-8"
>
    <div class="space-y-10 py-10 px-6 bg-white rounded-md sm:p-12">
        <div class="space-y-12">
            <div class="space-y-2 overflow-hidden">
                <p class="text-base text-dark-grey">
                    <?php echo escape($posting['formatted_date']); ?>
                    <span class="text-xl mx-2">&bull;</span>
                    <?php echo escape($posting['contract']); ?>
                </p>

                <h1
                        id="job-details-heading"
                        class="text-3xl font-bold text-very-dark-blue truncate"
                >
                    <?php echo escape($posting['position']); ?>
                </h1>

                <h4 class="text-sm font-bold text-violet truncate">
                    <?php echo escape($posting['location']); ?>
                </h4>
            </div>

            <div class="space-y-4">
                <a
                        href="/postings/<?php echo escape($posting['id']); ?>/<?php echo $posting['user_id'] === $_SESSION['user'] ? 'edit' : 'apply'; ?>"
                        aria-label="Apply for <?php echo escape($posting['position']); ?> at <?php echo escape($posting['company']); ?>"
                        class="inline-block text-base font-bold rounded-md transition-colors duration-200 ease-in-out cursor-pointer py-3.5 px-9 text-white bg-violet hover:bg-light-violet w-full text-center"
                >
                    <?php echo $posting['user_id'] === $_SESSION['user'] ? 'Edit' : 'Apply'; ?>
                </a>

                <?php if ($posting['user_id'] === $_SESSION['user']) : ?>
                    <form
                            action="/postings/<?php echo escape($posting['id']); ?>"
                            method="POST"
                    >
                        <?php include $this->resolve("partials/_csrf.php"); ?>

                        <input
                                type="hidden"
                                name="_METHOD"
                                value="DELETE"
                        />

                        <button
                                type="submit"
                                aria-label=""
                                class="inline-block text-base font-bold rounded-md transition-colors duration-200 ease-in-out cursor-pointer py-3.5 px-9 text-white bg-red hover:bg-red/50 w-full text-center"
                        >
                            Delete
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <p class="text-base leading-relaxed text-dark-grey text-balance">
            <?php echo escape($posting['description']); ?>
        </p>

        <!-- Requirements Section -->
        <div
                aria-labelledby="job-requirements-heading"
                class="space-y-7"
        >
            <h3
                    id="job-requirements-heading"
                    class="text-xl font-bold text-very-dark-blue"
            >
                Requirements
            </h3>

            <p class="text-base leading-relaxed text-dark-grey text-balance">
                <?php echo escape($posting['requirements']); ?>
            </p>

            <ul class="list-disc pl-4 marker:text-violet space-y-2">
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-8"
                >
                    5+ years of industry experience in a software engineering role,
                    preferably building a SaaS product. You can demonstrate
                    significant impact that your work has had on the product and/or
                    the team.
                </li>
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-8"
                >
                    Experience with scalable distributed systems, both built from
                    scratch as well as on AWS primitives.
                </li>
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-8"
                >
                    Extremely data-driven.
                </li>
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-8"
                >
                    Ability to debug complex systems.
                </li>
            </ul>
        </div>

        <!-- Role Section -->
        <div
                aria-labelledby="job-role-heading"
                class="space-y-7"
        >
            <h3
                    id="job-role-heading"
                    class="text-xl font-bold text-very-dark-blue"
            >
                What Will You Do
            </h3>

            <p class="text-base leading-relaxed text-dark-grey text-balance">
                <?php echo escape($posting['role']); ?>
            </p>

            <ol class="list-decimal pl-4 marker:text-violet space-y-2">
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-7"
                >
                    This role is for someone who is excited about the early stage -
                    you'll be responsible for turning the platform vision into
                    reality through smart, efficient building and testing.
                </li>
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-7"
                >
                    Translate the product roadmap into engineering requirements and
                    own the engineering roadmap
                </li>
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-7"
                >
                    Work with limited resources to test and learn as efficiently as
                    possible, while laying the framework to build a more scalable
                    product over time.
                </li>
                <li
                        class="text-base leading-relaxed text-dark-grey text-balance ps-7"
                >
                    Collaborate with product, design, and external engineering
                    teammates as needed.
                </li>
            </ol>
        </div>
    </div>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>
