<!doctype html>
<html>
<head>
	<title>SimpleRedirection.php</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="<?= $url ?>src/css/tailwind.css" rel="stylesheet">
    <link href="<?= $url ?>src/css/styles.css" rel="stylesheet">
</head>
<body>

<section class="relative w-full py-2 bg-blue-500">
    <div class="block lg:flex items-center justify-between lg:h-16 px-8 mx-auto max-w-7xl">
        <a href="/" class="mb-5 lg:mb-0 relative p-3 z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none focus:outline-none focus:ring-offset-2 focus:ring-1 rounded-full focus:ring-white">SimpleRedirection.php</a>
        <a href="https://gregoiregaonach.fr/" class="mb-5 lg:mb-0 inline-flex items-center justify-center px-6 py-3 text-lg font-medium leading-tight text-blue-500 whitespace-no-wrap border border-blue-300 rounded-full shadow-sm bg-blue-50 focus:ring-offset-blue-600 hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-100"> 
            Read more about it !
        </a>
    </div>
</section>

<?php
// Notification message
include('../includes/notifications.php');
