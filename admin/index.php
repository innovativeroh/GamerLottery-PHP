<?php include_once ("./includes/connection.php"); ?>
<?php
if (isset($_SESSION['username'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
    exit();
} else {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub - Admin Area</title>
</head>

<body
    style="background: url('https://images.unsplash.com/photo-1517085908802-f56a43681c18?q=80&w=2015&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
    <div class="w-full h-screen flex justify-center items-center">
        <div class="w-[500px] p-8 bg-black rounded-xl">
            <?php
            $uid = @$_POST['email'];
            $pwd = @$_POST['password'];
            if (isset($_POST['create'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($uid) || empty($pwd)) {
                    echo '<div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">Error!</span> Email and Password is Invalid!
                    </div>
                  </div>';
                } else {
                    $sql = "SELECT * FROM users WHERE email='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        echo '<div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Error!</span> Email Is Incorrect!
                        </div>
                      </div>';
                    } else {

                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['email'];
                            $password_login = $row['password'];
                            //dehashing the password        
                            $hashedPwdCheck = password_verify($pwd, $row['password']);
                            if ($hashedPwdCheck == false) {
                                echo '<div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-medium">Error!</span> Password is Incorrect!
                                </div>
                              </div>';
                            } elseif ($hashedPwdCheck == true) {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['username'] = $username_login;
                                $_SESSION['password'] = $password_login;
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
                                exit();
                            }
                        }
                    }
                }
            }
            ?>
            <img src="./core/img/logoMain.gif" class="m-auto w-[180px]">
            <form action="index.php" method="POST">
                <input name="email" type="email" placeholder="Enter Your Email"
                    class="w-full py-2 px-4 border-[1px] mt-6 bg-black border-zinc-800 text-white">
                <input name="password" type="password" placeholder="Enter Your Password"
                    class="w-full py-2 px-4 border-[1px] mt-6 bg-black border-zinc-800 text-white">
                <input type="checkbox" class="mt-4"><span class="text-sm ml-2 text-gray-500">Remember Me?</span>
                <input name="create" type="submit"
                    class="w-full text-white bg-green-500 py-2 px-4 font-semibold rounded-sm mt-4" value="Login">
            </form>
        </div>
    </div>
</body>

</html>