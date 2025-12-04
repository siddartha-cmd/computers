<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body class="contact-body">

<?php include 'navbar.php'; ?>

<div class="contact-wrapper">
    <div class="contact-box">

        <h2>Contact Us</h2>
        <p class="contact-sub">We’d love to hear from you! Fill out the form below.</p>

        <form action="send_message.php" method="POST">

            <div class="contact-row">
                <input type="text" name="first_name" class="contact-input" placeholder="First Name*" required>
                <input type="text" name="last_name" class="contact-input" placeholder="Last Name*" required>
            </div>

            <input type="email" name="email" class="contact-input" placeholder="Email Address*" required>

            <input type="text" name="subject" class="contact-input" placeholder="Subject*" required>

            <textarea name="message" class="contact-input contact-textarea" placeholder="Your Message*" required></textarea>

            <button type="submit" class="contact-btn">Send Message</button>

        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>