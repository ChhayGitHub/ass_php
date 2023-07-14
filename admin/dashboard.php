<?php
session_start();
require_once("./check_session.php");

$result_session = checkSession();

if ($result_session == false) {
    header("Location: login.php");
}

?>

<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <?php include("../component/header.php"); ?>

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
        </div>
    </div>

    <?php include("../component/footer.php"); ?>
</body>

</html>