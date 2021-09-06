<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banned Website</title>

    <!-- Link CSS file -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/contact.css">

</head>
<body>

    <div class="showcase">
    <h1>Contact Us</h1>
        <form>
            <div class="row">
                <div class="input-group">
                <input type="text" id="name" required>
                <label for="name"><i class='bx bx-user'></i>Your Name</label>
                </div>
                <div class="input-group">
                <input type="text" id="number" required>
                <label for="number"><i class='bx bx-phone' ></i>Your Phone Number</label>
                </div>
            </div>
            <div class="input-group">
            <input type="email" id="email" required>
            <label for="email"><i class='bx bx-envelope'></i>Your Email</label>
            </div>
            <div class="input-group">
            <textarea id="message" rows="8" required></textarea>
            <label for="message"><i class='bx bx-conversation' ></i>Your Message</label>
            </div>
            <button type="submit"><i class='bx bxl-telegram' ></i>Submit</button>

        </form>

    </header>
</body>