<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/assets/favicon/favicon.png">
    <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/pixel-rocket-shop/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/vendor/pixel-rocket-shop/css/theme.bundle.css" />

    <!-- Google Fonts--><!-- ToDo: Move local -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
            * Reinstate scrolling for non-JS clients
            */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
<x-nav-bar />

<!-- Main Section-->
<section class="mt-0 ">
@yield("content")
</section>

<x-footer />
<x-offcanvas />
<x-search-overlay />


<script src="/assets/vendor/pixel-rocket-shop/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="/assets/vendor/pixel-rocket-shop/js/theme.bundle.js"></script>
</body>
</html>