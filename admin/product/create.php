<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full">
    <?php include("../../component/header.php"); ?>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Create Product</h1>
        </div>
        <div class="my-5 mx-5">
            <div class="w-full text-left my-5">
                <a href="/ass_php/admin/product.php" class="border py-2 px-3 rounded-md mr-5 bg-green-500 hover:bg-green-600 text-white">Go Back</a>
            </div>
            <form action="">
                <table>
                    <tr>
                        <td>Product Name</td>
                        <td> <input type="text" class="border rounded-md"> </td>
                    </tr>
                    <tr>
                        <td class="py-2">Product Type</td>
                        <td> <input type="text" class="border rounded-md"> </td>
                    </tr>
                    <tr>
                        <td>Product Price</td>
                        <td> <input type="text" class="border rounded-md"> </td>
                    </tr>
                    <tr>
                        <td class="py-2">Product Image</td>
                        <td> <input type="file" class="border rounded-md"> </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="py-2">Product Description</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border"> <textarea name="" id="" rows="10" class="w-full"></textarea> </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php include("../../component/footer.php"); ?>
</body>

</html>