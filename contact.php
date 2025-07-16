<?php 
include 'db.php';

$message = '';
$messageType = '';

if ($_POST) {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $subject = sanitizeInput($_POST['subject'] ?? '');
    $messageText = sanitizeInput($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($messageText)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'error';
    } elseif (!validateEmail($email)) {
        $message = 'Please enter a valid email address.';
        $messageType = 'error';
    } else {
        $sql = "INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
        $result = executeQuery($sql, [$name, $email, $phone, $subject, $messageText]);
        
        if ($result) {
            $message = 'Thank you for your message! We will get back to you soon.';
            $messageType = 'success';
        } else {
            $message = 'Sorry, there was an error sending your message. Please try again.';
            $messageType = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rehan School</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: #ffd700;
            border-radius: 10px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #333;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-menu li a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            padding: 4rem 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 3rem 0;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .page-header h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin: 3rem 0;
        }

        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-form h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group textarea {
            height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .contact-info {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-info h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.2rem;
            color: white;
        }

        .info-content h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .info-content p {
            color: #666;
            margin: 0;
        }

        .map-section {
            margin: 4rem 0;
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .map-placeholder {
            height: 400px;
            background: linear-gradient(45deg, #e9ecef, #dee2e6);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #666;
        }

        .message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 600;
        }

        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-section {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .contact-form,
            .contact-info {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <div class="logo-icon">🎓</div>
                Rehan School
            </a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#" onclick="navigateTo('index.php')">Home</a></li>
                    <li><a href="#" onclick="navigateTo('how-to-copy.php')">How To Copy Rehan School</a></li>
                    <li><a href="#" onclick="navigateTo('video-tours.php')">Video Tours</a></li>
                    <li><a href="#" onclick="navigateTo('facilitators.php')">Facilitators</a></li>
                    <li><a href="#" onclick="navigateTo('curriculum.php')">Curriculum</a></li>
                    <li><a href="#" onclick="navigateTo('videos.php')">Videos</a></li>
                    <li><a href="#" onclick="navigateTo('about.php')">About Us</a></li>
                    <li><a href="contact.php" style="background: rgba(255,255,255,0.2);">Contact Us</a></li>
                    <li><a href="#" onclick="navigateTo('faqs.php')">FAQs</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1>Contact Us</h1>
                <p>Get in touch with us for admissions, inquiries, or any questions you may have</p>
            </div>

            <!-- Contact Section -->
            <section class="contact-section">
                <!-- Contact Form -->
                <div class="contact-form">
                    <h2>Send us a Message</h2>
                    
                    <?php if ($message): ?>
                        <div class="message <?php echo $messageType; ?>">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" required placeholder="Please describe your inquiry..."></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-content">
                            <h3>Address</h3>
                            <p>123 Education Street<br>Lahore, Punjab, Pakistan</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-content">
                            <h3>Phone</h3>
                            <p>+92-42-1234567<br>+92-300-1234567</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">📧</div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>info@rehanschool.net<br>admissions@rehanschool.net</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">🕒</div>
                        <div class="info-content">
                            <h3>Office Hours</h3>
                            <p>Monday - Friday: 8:00 AM - 4:00 PM<br>Saturday: 9:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section class="map-section">
                <h2 style="text-align: center; margin-bottom: 2rem; color: #333;">Find Us</h2>
                <div class="map-placeholder">
                    🗺️ Interactive Map Coming Soon
                </div>
            </section>
        </div>
    </main>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            
            if (!name || !email || !message) {
                e.preventDefault();
                alert('Please fill in all required fields.');
                return false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Please enter a valid email address.');
                return false;
            }
        });
    </script>
</body>
</html>
