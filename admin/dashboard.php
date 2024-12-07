<?php include_once ("./includes/connection.php"); ?>
<?php
if (isset($_SESSION['username'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="flex flex-col sm:flex-row h-screen">
        <?php include_once ("./includes/header.php"); ?>
        <div class="p-4 flex-1 overflow-y-auto">
            <!-- Content goes here -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
                <?php
                if ($global_permissions == "1") {
                    ?>
                    <div class="w-full bg-gray-200 border-[1px] rounded-xl p-8">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="font-semibold text-3xl"><?php
                                $sql = "SELECT * FROM `users` WHERE `permissions`='0'";
                                $query = mysqli_query($conn, $sql);
                                echo $num_rows = mysqli_num_rows($query);
                                ?></h1>
                                <span class="block mt-4 font-semibold">Total Users</span>
                            </div>
                            <div>
                                <i class="bi bi-people-fill text-4xl text-gray-950"></i>
                            </div>
                        </div>
                        </div>
                          <div class="w-full bg-gray-200 border-[1px] rounded-xl p-8">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="font-semibold text-3xl"><?php
                                $sql = "SELECT * FROM `users` WHERE `permissions`='0'";
                                $query = mysqli_query($conn, $sql);
                                echo $num_rows = mysqli_num_rows($query);
                                ?></h1>
                                <span class="block mt-4 font-semibold">manage_rooms</span>
                            </div>
                            <div>
                                <i class="bi bi-people-fill text-4xl text-gray-950"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 border-[1px] rounded-xl p-8">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="font-semibold text-3xl"><?php
                                $sql = "SELECT * FROM `users` WHERE `permissions`='2'";
                                $query = mysqli_query($conn, $sql);
                                echo $num_rows = mysqli_num_rows($query);
                                ?></h1>
                                <span class="block mt-4 font-semibold">Total Admin</span>
                            </div>
                            <div>
                                <i class="bi bi-award-fill text-4xl text-gray-950"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                    ?>
            </div>
        </div>
    </div>
    </div>
    <?php include_once ("./includes/footer.php"); ?>
</body>

</html>