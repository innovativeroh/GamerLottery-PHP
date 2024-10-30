<?php include_once 'resource/components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub &copy; - Login</title>
</head>

<body class="bg-zinc-950">
    <div class="w-full min-h-screen flex justify-center items-center">
        <div class="w-[350px] p-10 bg-black rounded-lg">
            <img src="./public/images/logo.png" alt="logo" class="w-32 md:w-40 m-auto mb-10">
            <form class="gap-4 flex flex-col">
                <input type="text" name="email" placeholder="someone@gmail.com"
                    class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white" />
                <input type="password" name="password" placeholder="Enter Your Password"
                    class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white" />
                <button type="submit"
                    class="w-full bg-green-600 rounded-lg p-2 text-white font-semibold hover:bg-green-800">Sign
                    Up</button>
                <span class="text-center text-white">Don't have account? <a href="#"
                        class="font-semibold text-green-600">Login</a></span>
            </form>
        </div>
    </div>
    <?php include_once 'resource/components/footer.php'; ?>
</body>

</html>