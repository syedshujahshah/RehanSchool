<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Rehan School</title>
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
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
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

        .about-section {
            margin: 4rem 0;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin: 3rem 0;
        }

        .about-content h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .about-content p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .about-image {
            background: linear-gradient(45deg, #667eea, #764ba2);
            height: 400px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
        }

        .mission-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin: 4rem 0;
        }

        .mission-card, .vision-card {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .mission-card {
            border-top: 5px solid #4caf50;
        }

        .vision-card {
            border-top: 5px solid #2196f3;
        }

        .mission-card h3, .vision-card h3 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .values-section {
            background: #f8f9fa;
            padding: 4rem 0;
            border-radius: 15px;
            margin: 4rem 0;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .value-item {
            text-align: center;
            padding: 2rem;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
        }

        .value-item h4 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .value-item p {
            color: #666;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-grid, .mission-vision {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .about-content h2 {
                font-size: 2rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
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
                    <li><a href="about.php" style="background: rgba(255,255,255,0.2);">About Us</a></li>
                    <li><a href="#" onclick="navigateTo('contact.php')">Contact Us</a></li>
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
                <h1>About Rehan School</h1>
                <p>Discover our journey, mission, and commitment to excellence in education</p>
            </div>

            <!-- About Section -->
            <section class="about-section">
                <div class="about-grid">
                    <div class="about-content">
                        <h2>Our Story</h2>
                        <p>Rehan School was founded with a vision to create leaders of tomorrow. We believe that every child has the potential to achieve greatness, and our role is to nurture that potential through innovative teaching methods and comprehensive education.</p>
                        <p>Since our establishment, we have been committed to providing quality education that combines traditional values with modern teaching techniques. Our approach focuses on developing not just academic excellence, but also character, creativity, and critical thinking skills.</p>
                    </div>
                    <div class="about-image">
                        🏫
                    </div>
                </div>
            </section>

            <!-- Mission & Vision -->
            <section class="mission-vision">
                <div class="mission-card">
                    <h3>Our Mission</h3>
                    <p>To provide quality education that empowers students to become confident, creative, and responsible global citizens. We strive to create an environment where every student can discover their potential and achieve their dreams.</p>
                </div>
                <div class="vision-card">
                    <h3>Our Vision</h3>
                    <p>To be recognized as a leading educational institution that shapes future leaders through innovative teaching, character development, and academic excellence. We envision a world where our graduates make positive contributions to society.</p>
                </div>
            </section>

            <!-- Values Section -->
            <section class="values-section">
                <div class="container">
                    <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 2rem; color: #333;">Our Core Values</h2>
                    <div class="values-grid">
                        <div class="value-item">
                            <div class="value-icon">🎯</div>
                            <h4>Excellence</h4>
                            <p>We strive for excellence in everything we do, from teaching to student support services.</p>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">🤝</div>
                            <h4>Integrity</h4>
                            <p>We maintain the highest standards of honesty, ethics, and moral principles in all our actions.</p>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">💡</div>
                            <h4>Innovation</h4>
                            <p>We embrace new ideas, technologies, and teaching methods to enhance the learning experience.</p>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">🌟</div>
                            <h4>Respect</h4>
                            <p>We value diversity and treat every individual with dignity, respect, and understanding.</p>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">🚀</div>
                            <h4>Growth</h4>
                            <p>We are committed to continuous improvement and lifelong learning for all stakeholders.</p>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">❤️</div>
                            <h4>Care</h4>
                            <p>We provide a nurturing environment where every student feels valued and supported.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
