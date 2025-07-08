<?php include $this->resolve("partials/_head.php"); ?>

<h1>Job Listings</h1>

<!-- BREADCRUMBS -->
<nav aria-label="Breadcrumb">
    <ol>
        <li>
            <a href="#">Home</a>
        </li>
        <li aria-current="page">Jobs</li>
    </ol>
</nav>

<!-- SEARCH BAR SECTION -->
<section aria-labelledby="search-heading">
    <h3 id="search-heading">Search Jobs</h3>

    <form
            action="#"
            method="GET"
            role="search"
            aria-label="Job search form"
    >
        <!-- Input:Keywords -->
        <div>
            <label for="formInput#keywords"
            >Filter by title, companies, expertise</label
            >
            <input
                    type="text"
                    name="keywords"
                    id="formInput#keywords"
                    placeholder="Filter by title, companies, expertise..."
                    autocomplete="off"
            />
        </div>

        <!-- Input:Location -->
        <div>
            <label for="formInput#location">Filter by location</label>
            <input
                    type="text"
                    name="location"
                    id="formInput#location"
                    placeholder="Filter by location..."
                    autocomplete="off"
            />
        </div>

        <!-- Input:Contract -->
        <div>
            <input
                    type="checkbox"
                    name="contract"
                    id="formInput#contract"
                    value="fullTime"
            />
            <label for="formInput#contract">Full Time Only </label>
        </div>

        <!-- Button:Search -->
        <div>
            <button type="submit">Search</button>
        </div>
    </form>
</section>

<!-- JOB LISTING SECTION -->
<section aria-labelledby="job-listings-heading">
    <h3 id="job-listings-heading">Job Listings</h3>

    <!-- Job Listing -->
    <div>
        <!-- Job Card  -->
        <article aria-labelledby="job-1-title">
            <div>
                <img
                        src="/assets/images/default.jpg"
                        alt="Scoot Company Logo"
                        width="50"
                        height="50"
                />
            </div>

            <div>
                <p>5h ago &bull; Full Time</p>
                <h3 id="job-1-title">
                    <a href="#">Senior Software Engineer</a>
                </h3>
                <p>Scoot</p>
                <h4>United Kingdom</h4>
            </div>
        </article>

        <!-- Repeat <article>...</article> for more jobs -->
    </div>
</section>

<!-- Pagination -->
<nav aria-label="Pagination">
    <ul>
        <li>
            <a
                    href="#"
                    rel="prev"
            >&larr; Prev</a
            >
        </li>
        <li>
            <a
                    href="#"
                    aria-current="page"
            >1</a
            >
        </li>
        <li>
            <a
                    href="#"
                    rel="next"
            >Next &rarr;</a
            >
        </li>
    </ul>
</nav>

<?php include $this->resolve("partials/_footer.php"); ?>
