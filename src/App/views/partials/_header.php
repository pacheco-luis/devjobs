<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <title><?php echo escape($title); ?> &mdash; DevJobs</title>
    <link
        rel="stylesheet"
        href="/assets/css/main.css"
    />
</head>
<body class="max-w-3xl mx-auto px-6 bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%">
<!-- HEADER -->
<header class="flex items-center justify-between py-8">
    <!-- LOGO -->
    <a
        href="/"
        aria-label="DevJobs Home"
    >
        <img
            src="/assets/images/logo.svg"
            alt="DevJobs Logo"
            width="115"
            height="32"
        />
    </a>

    <!-- NAVIGATION -->
    <nav aria-label="Main navigation">
        <ul class="flex items-center gap-x-3">
            <li>
                <a
                    href=""
                    class="text-base font-bold text-very-dark-blue hover:text-dark-grey transition-colors duration-200 ease-in-out"
                >Applications</a
                >
            </li>
            <li>
                <a
                    href=""
                    class="text-base font-bold text-very-dark-blue hover:text-dark-grey transition-colors duration-200 ease-in-out"
                >Postings</a
                >
            </li>
            <li>
                <a
                    href=""
                    class="text-base font-bold text-very-dark-blue hover:text-dark-grey transition-colors duration-200 ease-in-out"
                >Logout</a
                >
            </li>
        </ul>
    </nav>
</header>

<!-- MAIN CONTENT -->
<main id="main-content">
