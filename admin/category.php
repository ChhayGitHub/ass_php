<?php
session_start();
require_once("./check_session.php");

$result_session = checkSession();

if ($result_session == false) {
    header("Location: login.php");
}

if (isset($_POST['btnLogout'])) {
    session_destroy();
    header("Location: login.php");
}
?>



<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <?php include("../component/header.php"); ?>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Category</h1>
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <!-- <div class="py-4">
                <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div>
            </div> -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border m-5">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Drink
                            </th>
                            <td class="px-6 py-4">
                                Category Drink
                            </td>

                            <td class="px-6 py-4 flex gap-5 item-center ">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /End replace -->
        </div>
    </div>
    <?php include("../component/footer.php"); ?>
</body>

</html>