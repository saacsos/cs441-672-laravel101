<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CS441</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cyan-50 dark:bg-slate-700">

<x-layouts.nav-bar></x-layouts.nav-bar>

<main class="max-sm:px-4 px-8">
    {{ $slot }}
</main>


</body>
</html>
