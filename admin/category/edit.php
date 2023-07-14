<?php

if (isset($_POST['btnEdit'])) {
    include("../../component/connection.php");
    extract($_POST);

    $sql = "select * from category where id = $id";

    $result = $con->query($sql);
}



if (isset($_POST['btnSubmit'])) {
    include("../../component/connection.php");
    extract($_POST);

    $sql = "update category set name = '$name', description = '$description' where id = $id";

    $result = $con->query($sql);

    if ($result) {
        header("Location: ../category.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full">
    <?php include("../../component/header.php"); ?>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Create Category</h1>
        </div>
        <div class="my-5 mx-5">
            <div class="w-full text-left my-5">
                <a href="/ass_php/admin/category.php" class="border py-2 px-3 rounded-md mr-5 bg-green-500 hover:bg-green-600 text-white">Go Back</a>
            </div>
            <?php

            while ($data = $result->fetch_assoc()) {


            ?>
                <form method="post" action="./edit.php">

                    <div style="display: none;">
                        <input type="text" name="id" value="<?= $data['id'] ?>">
                    </div>

                    <div class="relative z-0 w-96 mb-6 group">
                        <input value="<?= $data['name'] ?>" type="text" name="name" id="category_name" class="block py-2.5 px-0 w-96 text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="category_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product name</label>
                    </div>



                    <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                    <textarea name="description" id="description" rows="4" class="my-2 block p-2.5 w-96 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "><?= $data['description'] ?></textarea>



                    <button name="btnSubmit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            <?php } ?>
        </div>
    </div>
    <?php include("../../component/footer.php"); ?>
</body>

</html>