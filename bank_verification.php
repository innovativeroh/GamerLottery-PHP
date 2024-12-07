<?php
include_once('resource/components/header.php');
if (!isLoggedIn()) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}

// Check if form is submitted
if(isset($_POST['verify'])) {
    // Initialize error array
    $errors = [];
    
    // Sanitize and validate inputs
    $account_holder = mysqli_real_escape_string($conn, trim($_POST['account_holder']));
    $bank_name = mysqli_real_escape_string($conn, trim($_POST['bank_name']));
    $account_number = mysqli_real_escape_string($conn, trim($_POST['account_number']));
    $ifsc_code = mysqli_real_escape_string($conn, trim($_POST['ifsc_code']));
    $upi_id = mysqli_real_escape_string($conn, trim($_POST['upi_id']));

    // Validation rules
    if(empty($account_holder)) {
        $errors[] = "Account holder name is required";
    } elseif(strlen($account_holder) < 3 || strlen($account_holder) > 50) {
        $errors[] = "Account holder name must be between 3 and 50 characters";
    }

    if(empty($bank_name)) {
        $errors[] = "Bank name is required";
    }

    if(empty($account_number)) {
        $errors[] = "Account number is required";
    } elseif(!preg_match('/^[0-9]{9,18}$/', $account_number)) {
        $errors[] = "Invalid account number format";
    }

    if(empty($ifsc_code)) {
        $errors[] = "IFSC code is required";
    } elseif(!preg_match('/^[A-Z]{4}0[A-Z0-9]{6}$/', $ifsc_code)) {
        $errors[] = "Invalid IFSC code format";
    }

    if(!empty($upi_id) && !preg_match('/^[\w\.\-]+@[\w\-]+$/', $upi_id)) {
        $errors[] = "Invalid UPI ID format";
    }

    // Check if user already has a pending verification
    $check_sql = "SELECT * FROM bank_verification WHERE userId = '$user_id' AND isVerify = '0'";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) > 0) {
        $errors[] = "You already have a pending bank verification request";
    }

    // If no errors, proceed with insertion
    if(empty($errors)) {
        $insert_sql = "INSERT INTO bank_verification 
                      (userId, account_holder, bank_name, account_no, ifsc_code, upi_id, isVerify) 
                      VALUES 
                      ('$user_id', '$account_holder', '$bank_name', '$account_number', '$ifsc_code', '$upi_id', '0')";
        
        if(mysqli_query($conn, $insert_sql)) {
            // Success message
            echo "<script>
                alert('Bank verification details submitted successfully! Please wait for approval.');
                window.location.href = 'dashboard.php';
            </script>";
            exit();
        } else {
            $errors[] = "Database error: " . mysqli_error($conn);
        }
    }
}
?>

<?php
$sql = "SELECT * FROM `bank_verification` WHERE `userID`='$user_id' and `isVerify`='0'";
$query = mysqli_query($conn, $sql);
$mysql_num_rows = mysqli_num_rows($query);
if ($mysql_num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $userId = $rows['userId'];
        $account_holder = $rows['account_holder'];
        $bank_name = $rows['bank_name'];
        $account_no = $rows['account_no'];
        $ifsc_code = $rows['ifsc_code'];
        $upi_id = $rows['upi_id'];
        $isVerify = $rows['isVerify'];
    }
} else {
}
?>

<?php
// Fetch user's bank verification details
$sql = "SELECT * FROM bank_verification WHERE userId = '$user_id' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$bank_details = mysqli_fetch_assoc($result);
$is_verified = ($bank_details && $bank_details['isVerify'] == 1);
$is_rejected = ($bank_details && $bank_details['isVerify'] == 2);

// Update the header section to show verification status
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub - Bank Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-zinc-900 to-zinc-950 text-white font-sans min-h-screen">
    <div class="max-w-[1200px] mt-20 lg:mt-32 m-auto p-5">
        <!-- Header Section -->
        <header class="mb-12">
            <div class="flex items-center justify-between">
                <div class="flex-[1] flex items-center gap-4 mb-2">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-lime-400 to-lime-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-university text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">Bank Account Verification</h1>
                        <p class="text-zinc-400">Add your bank details for withdrawals</p>
                        <?php if($is_rejected): ?>
                            <p class="text-xs text-red-400">Your verification was rejected. Please contact website admin for assistance.</p>
                        <?php elseif(!$is_verified): ?>
                            <p class="text-xs text-yellow-300">Once You Submit Your Bank Verification You Won't Be Able To Change Or Edit Until Rejected!</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($is_verified): ?>
                    <div class="flex">
                        <span class="p-2 py-2 px-6 bg-lime-500 font-semibold rounded-lg">Verified</span>
                    </div>
                <?php elseif($is_rejected): ?>
                    <div class="flex">
                        <span class="p-2 py-2 px-6 bg-red-500 font-semibold rounded-lg">Rejected</span>
                    </div>
                <?php endif; ?>
            </div>
        </header>
        <?php if(isset($errors) && !empty($errors)): ?>
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500 rounded-xl">
                <ul class="list-disc list-inside">
                    <?php foreach($errors as $error): ?>
                        <li class="text-red-500"><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="bank_verification.php" method="POST" class="bg-zinc-800/50 p-8 rounded-2xl shadow-xl">
            <div class="space-y-6">
                <!-- Account Holder Name -->
                <div>
                    <label for="account_holder" class="block text-sm font-medium mb-2">Account Holder Name</label>
                    <input type="text" id="account_holder" name="account_holder" 
                        value="<?php echo $bank_details ? htmlspecialchars($bank_details['account_holder']) : ''; ?>"
                        <?php echo $is_verified ? 'disabled' : 'required'; ?>
                        class="w-full px-4 py-3 bg-zinc-700/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-500 border border-zinc-600 <?php echo $is_verified ? 'opacity-75 cursor-not-allowed' : ''; ?>">
                </div>

                <!-- Bank Selection Dropdown -->
                <div>
                    <label for="bank_name" class="block text-sm font-medium mb-2">Bank Name</label>
                    <select id="bank_name" name="bank_name" 
                        <?php echo $is_verified ? 'disabled' : 'required'; ?>
                        class="w-full px-4 py-3 bg-zinc-700/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-500 border border-zinc-600 <?php echo $is_verified ? 'opacity-75 cursor-not-allowed' : ''; ?>">
                        <option value="">Select your bank</option>
                        <?php
                        $banks = ["SBI" => "State Bank of India", "HDFC" => "HDFC Bank", "ICICI" => "ICICI Bank", 
                                 "Axis" => "Axis Bank", "PNB" => "Punjab National Bank", "Kotak" => "Kotak Mahindra Bank"];
                        foreach($banks as $value => $name) {
                            $selected = ($bank_details && $bank_details['bank_name'] == $value) ? 'selected' : '';
                            echo "<option value='$value' $selected>$name</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Account Number -->
                <div>
                    <label for="account_number" class="block text-sm font-medium mb-2">Account Number</label>
                    <input type="text" id="account_number" name="account_number" 
                        value="<?php echo $bank_details ? htmlspecialchars($bank_details['account_no']) : ''; ?>"
                        <?php echo $is_verified ? 'disabled' : 'required'; ?>
                        class="w-full px-4 py-3 bg-zinc-700/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-500 border border-zinc-600 <?php echo $is_verified ? 'opacity-75 cursor-not-allowed' : ''; ?>">
                </div>

                <!-- IFSC Code -->
                <div>
                    <label for="ifsc_code" class="block text-sm font-medium mb-2">IFSC Code</label>
                    <input type="text" id="ifsc_code" name="ifsc_code" 
                        value="<?php echo $bank_details ? htmlspecialchars($bank_details['ifsc_code']) : ''; ?>"
                        <?php echo $is_verified ? 'disabled' : 'required'; ?>
                        class="w-full px-4 py-3 bg-zinc-700/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-500 border border-zinc-600 <?php echo $is_verified ? 'opacity-75 cursor-not-allowed' : ''; ?>">
                </div>

                <!-- UPI ID -->
                <div>
                    <label for="upi_id" class="block text-sm font-medium mb-2">UPI ID</label>
                    <input type="text" id="upi_id" name="upi_id" 
                        value="<?php echo $bank_details ? htmlspecialchars($bank_details['upi_id']) : ''; ?>"
                        placeholder="example@upi"
                        <?php echo $is_verified ? 'disabled' : 'required'; ?>
                        class="w-full px-4 py-3 bg-zinc-700/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-500 border border-zinc-600 <?php echo $is_verified ? 'opacity-75 cursor-not-allowed' : ''; ?>">
                </div>

                <!-- Submit Button - Only show if not verified and not rejected -->
                <?php if(!$is_verified && !$is_rejected): ?>
                    <button type="submit" name="verify"
                        class="w-full bg-gradient-to-r from-lime-500 to-green-600 text-white font-bold py-4 px-6 rounded-xl hover:opacity-90 transition-all">
                        Verify Bank Account
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>

</html>