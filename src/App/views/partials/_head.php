<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <title><?php echo escape($title); ?> &mdash; DevJobs</title>
</head>
<body>
<!-- HEADER -->
<header>
    <!-- LOGO -->
    <a
        href="/"
        aria-label="DevJobs Home"
    >
        <img
            src="/assets/images/logo.svg"
            alt="Devjobs Logo"
            width="115"
            height="32"
        />
    </a>

    <!-- NAVIGATION -->
    <nav aria-label="Main navigation">
        <ul>
            <li>
                <a href="#">Applications</a>
            </li>
            <li>
                <a href="#">Postings</a>
            </li>
            <li>
                <a href="#">Logout</a>
            </li>
        </ul>
    </nav>
</header>

<!-- MAIN CONTENT -->
<main id="main-content">
