<?php include_once 'resource/components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub &copy; - Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-gray-100">

    <!-- Container -->
    <div class="min-h-screen flex items-center justify-center px-6 py-10 bg-zinc-950">

        <!-- Contact Form -->
        <div class="max-w-2xl w-full bg-black rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center mb-6">Contact Us</h2>
            <p class="text-center mb-8 text-gray-400">We'd love to hear from you! Please fill out the form below to get
                in touch.</p>

            <form class="space-y-6" id="contactForm">
                <!-- Name -->
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="name">Full Name</label>
                    <input type="text" id="name" placeholder="John Doe"
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="email">Email Address</label>
                    <input type="email" id="email" placeholder="example@example.com"
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="subject">Subject</label>
                    <input type="text" id="subject" placeholder="Subject of your message"
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="message">Message</label>
                    <textarea id="message" rows="4" placeholder="Type your message here..."
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="w-full py-2 px-4 bg-green-800 hover:bg-green-700 transition duration-300 rounded-md text-white font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">Send
                        Message</button>
                </div>
            </form>
            <div id="successMessage" class="hidden text-green-500 text-center mt-4">Your message has been sent successfully!</div>
        </div>
    </div>
    <?php include_once 'resource/components/footer.php'; ?>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Here you would typically handle form submission (e.g., via AJAX)
            document.getElementById('successMessage').classList.remove('hidden');
            this.reset(); // Reset the form fields
        });
    </script>
</body>

</html>