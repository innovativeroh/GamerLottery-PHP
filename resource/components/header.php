<?php
@session_start();
include_once('resource/components/connection.php');

// Fetch user data including mobile_verify status
$user_data = null;
if (isLoggedIn()) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/612ce50f4d.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" href="./public/images/icon.png" type="image/png">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        .hover-underline {
            position: relative;
        }

        .hover-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #10B981;
            transition: width 0.3s ease;
        }

        .hover-underline:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>
    <header x-data="{ isOpen: false }"
        x-init="$watch('isOpen', value => value && setTimeout(() => $refs.mobileMenu.classList.add('animate-fadeIn'), 50))"
        class="bg-black bg-opacity-40 text-white p-4 md:p-8 fixed top-0 w-full z-50">
        <div class="m-auto max-w-[1200px] flex justify-between items-center">
            <a href="index.php" class="text-xl font-bold transition-transform duration-300 hover:scale-105">
                <img src="./public/images/logo.gif" alt="logo" class="w-32 md:w-40">
            </a>
            <button @click="isOpen = !isOpen" class="md:hidden transition-transform duration-300 hover:scale-110">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
            <div class="hidden md:flex gap-8">
                <a href="index.php"
                    class="hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Home</a>
                <a href="index.php#about"
                    class="hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">About</a>
                <a href="contact.php"
                    class="hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Contact</a>
            </div>
            <div class="hidden md:block flex flex-row">
                <a href="login.php" class="inline-block mr-4">
                    <button
                        class="bg-green-500 font-bold text-white px-4 py-2 rounded-full hover:bg-green-600 transition-all duration-300 flex gap-2 items-center hover:shadow-lg transform hover:-translate-y-1">
                        Account <i class="fa-solid fa-user"></i>
                    </button>
                </a>
                <?php
                if (isLoggedIn()) {
                    ?>
                    <a href="login.php" class="inline-block">
                        <button
                            class="bg-black border-[2px] font-bold text-white px-4 py-2 rounded-full hover:bg-green-600 transition-all duration-300 flex gap-2 items-center hover:shadow-lg transform hover:-translate-y-1">
                            <i class="fa-solid fa-wallet"></i> 0.00
                        </button>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div x-show="isOpen" x-ref="mobileMenu" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2" class="md:hidden mt-4">
            <a href="index.php"
                class="block py-2 hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Home</a>
            <a href="index.php#about"
                class="block py-2 hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">About</a>
            <a href="contact.php"
                class="block py-2 hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Contact</a>
            <a href="login.php"
                class="mt-4 w-full bg-green-500 font-bold text-white px-4 py-2 rounded-full hover:bg-green-600 transition-all duration-300 flex gap-2 items-center justify-center hover:shadow-lg transform hover:-translate-y-1">
                Account <i class="fa-solid fa-user"></i>
            </a>
        </div>
    </header>

    <?php if (isLoggedIn() && $user_data['mobile_verify'] == 0) { ?>
        <div
            class="flex flex-wrap justify-center items-center h-screen fixed z-[1] top-0 left-0 w-full bg-black bg-opacity-50">
            <div class="bg-zinc-900 p-4 rounded-lg shadow-lg w-[500px]">
                <h2 class="text-2xl text-white font-bold mb-4">Mobile Verification</h2>
                <p class="mb-4 text-white">We will send a verification code to your <span class="font-semibold">+91
                        <?php echo $user_data['mobile']; ?></span>. Please enter it below to verify your account.</p>
                <form id="otpForm">
                    <div class="mb-4">
                        <label for="verification_code" class="block text-white text-sm font-bold mb-2">Verification
                            Code</label>
                        <input type="text" id="verification_code" name="verification_code"
                            class="w-full p-2 border bg-black border-black rounded text-white" required>
                    </div>
                    <div class="flex justify-center gap-4">
                        <button type="button" id="sendOtpBtn"
                            class="bg-green-600 text-white p-2 rounded hover:bg-green-700 flex-[1]">Send OTP</button>
                        <button type="submit" id="verifyOtpBtn"
                            class="bg-green-600 text-white p-2 rounded hover:bg-green-700 flex-[1]">Verify</button>
                    </div>
                </form>
                <div id="responseMessage" class="mt-4 p-2 rounded hidden"></div>
            </div>
        </div>
    <?php } ?>

    <script>
        $(document).ready(function () {
            $('#sendOtpBtn').on('click', function () {
                $.ajax({
                    url: 'send_otp.php',
                    method: 'GET',
                    data: { mobile: '<?php echo $user_data['mobile'] ?? ''; ?>' },
                    dataType: 'json',
                    success: function (response) {
                        showMessage(response.success ? 'success' : 'error', response.message);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        showMessage('error', 'Error sending OTP: ' + textStatus);
                    }
                });
            });

            $('#otpForm').on('submit', function (e) {
                e.preventDefault();
                var enteredOtp = $('#verification_code').val();
                $.ajax({
                    url: 'verify_otp.php',
                    method: 'POST',
                    data: { otp: enteredOtp },
                    dataType: 'json',
                    success: function (response) {
                        showMessage(response.success ? 'success' : 'error', response.message);
                        if (response.success) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        showMessage('error', 'Error verifying OTP. Server response: ' + jqXHR.responseText);
                    }
                });
            });

            function showMessage(type, message) {
                var messageDiv = $('#responseMessage');
                messageDiv.removeClass('bg-green-100 text-green-700 bg-red-100 text-red-700 hidden');
                if (type === 'success') {
                    messageDiv.addClass('bg-green-100 text-green-700');
                } else {
                    messageDiv.addClass('bg-red-100 text-red-700');
                }
                messageDiv.text(message).show();
            }
        });
    </script>
</body>

</html>