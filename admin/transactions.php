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
        <div class="p-10 flex-1 overflow-y-auto">
            <!-- Content goes here -->
            <div class="overflow-x-auto">
                <h1 class="text-3xl font-semibold block mb-4">Transactions</h1>
                <table class="table-auto w-full bg-white shadow-xl">
                    <thead>
                        <tr class="bg-gray-950">
                            <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">ID</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">User ID</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Type</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT t.*, u.full_name 
                                FROM `transactions` t 
                                LEFT JOIN `users` u ON t.userId = u.id"; // Updated SQL query to join with users
                        $query = mysqli_query($conn, $sql);
                        $counter = 1; // Initialize counter
                        while ($rows = mysqli_fetch_assoc($query)) {
                            $transactionID = $rows['id']; // Use transaction ID
                            $full_name = $rows['full_name']; // Get full name from users table
                            $type = $rows['type'];

                            // Determine transaction type and amount class
                            $transaction_type = '';
                            $amount_class = ''; // Initialize amount class
                            switch ($type) {
                                case 1:
                                    $transaction_type = 'Deposit';
                                    $amount_class = 'text-green-500'; // Class for deposit amount
                                    break;
                                case 2:
                                    $transaction_type = 'Withdrawal';
                                    $amount_class = 'text-red-500'; // Class for withdrawal amount
                                    break;
                                case 3:
                                    $transaction_type = 'Game Won';
                                    $amount_class = 'text-purple-500'; // Class for game won amount
                                    break;
                                default:
                                    $transaction_type = 'Unknown'; // Default case for unknown types
                                    $amount_class = 'text-gray-500'; // Class for unknown amount
                                    break;
                            }
                            $amount = $rows['amount'];
                            $date = $rows['date'];
                            ?>
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-4 whitespace-nowrap"><?= $transactionID ?></td>
                                <td class="px-4 py-4 whitespace-nowrap"><?= $full_name ?></td>
                                <td class="px-4 py-4 whitespace-nowrap"><?= $transaction_type ?></td>
                                <td class="px-4 py-4 whitespace-nowrap <?= $amount_class ?>"><?= $amount ?></td>
                                <td class="px-4 py-4 whitespace-nowrap"><?= $date ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <!-- More rows can be added here -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
    <div id="bankModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full" style="z-index: 1000;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Bank Account Details</h3>
                <div id="bankDetailsContent" class="mb-4"></div>
                <div class="mt-4 flex justify-between">
                    <div id="actionButtons" class="space-x-2">
                        <!-- Approve/Reject buttons will be inserted here by JavaScript -->
                    </div>
                    <button type="button" 
                            onclick="closeModal()" 
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php include_once ("./includes/footer.php"); ?>
    <script>
    let currentUserId = null;

    function openModal(userId) {
        console.log('Opening modal for user:', userId);
        currentUserId = userId; // Store the current user ID
        document.getElementById('bankModal').style.display = 'block';
        document.getElementById('bankDetailsContent').innerHTML = 'Loading...';
        
        fetch('get_bank_details.php?user_id=' + userId)
            .then(response => response.json())
            .then(data => {
                console.log('Received data:', data);
                document.getElementById('bankDetailsContent').innerHTML = `
                    <div class="space-y-2">
                        <p><strong>Account Holder:</strong> ${data.account_holder || 'N/A'}</p>
                        <p><strong>Account Number:</strong> ${data.account_no || 'N/A'}</p>
                        <p><strong>IFSC Code:</strong> ${data.ifsc_code || 'N/A'}</p>
                        <p><strong>Bank Name:</strong> ${data.bank_name || 'N/A'}</p>
                        <p><strong>UPI ID:</strong> ${data.upi_id || 'N/A'}</p>
                    </div>
                `;

                // Update action buttons based on verification status
                const actionButtonsHtml = data.isVerify == 0 || data.isVerify == null ? `
                    <button type="button" 
                            onclick="updateStatus(${userId}, 1)" 
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Approve
                    </button>
                    <button type="button" 
                            onclick="updateStatus(${userId}, 2)" 
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Reject
                    </button>
                ` : '';
                
                document.getElementById('actionButtons').innerHTML = actionButtonsHtml;
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('bankDetailsContent').innerHTML = 'Error loading bank details';
            });
    }

    function closeModal() {
        document.getElementById('bankModal').style.display = 'none';
        currentUserId = null;
    }

    function updateStatus(userId, status) {
        const action = status === 1 ? 'approve' : 'reject';
        if (confirm(`Are you sure you want to ${action} these bank details?`)) {
            fetch('update_bank_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `user_id=${userId}&status=${status}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`Bank details ${action}d successfully!`);
                    closeModal();
                    location.reload(); // Refresh the page to update the status
                } else {
                    alert('Error updating status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating status');
            });
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('bankModal');
        if (event.target == modal) {
            closeModal();
        }
    }
    </script>
</body>

</html>